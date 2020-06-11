<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\User\AuthController;

/**
 * @group Account & Users
 */
class RegisterController extends Controller
{

    private $migrations = "DROP TABLE IF EXISTS `migrations`;CREATE TABLE `migrations` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`migration` varchar(255) NOT NULL,`batch` int(11) NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    /**
     * Register user
     *
     * @bodyParam name string required User name. Example: John
     * @bodyParam surname string required User surname. Example: Doe
     * @bodyParam email string required User email address. Example: john.doe@gmail.com
     * @bodyParam password string required User password. Example: 1234567890
     * @bodyParam company_name string required User company's name. Example: John & Co
     * @bodyParam vat string required User company's organisation number. Example: 12345678X
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $time = time();
        $user = User::create([
    		"name"=>$request->name,
    		"surname"=>$request->surname,
    		"email"=>$request->email,
            "password"=>bcrypt($request->password),
            "role"=>"Admin",
            "account_id"=>$this->newAccount($time, $request),
        ]);

        for ($i=0; $i < 4; $i++) {
            $sub = User::create([
                "name"=>"",
                "surname"=>"",
                "email"=>"",
                "password"=>"",
                "role"=>"User",
                "account_id"=>$user->account_id,
            ]);
        }

        //$ac = new AuthController();
        // $res = $ac->login();
        //var_dump($res);

        $this->verificate($time."_".$user->account_id, $user->account_id);

        return response()->json(['response' => 'creado'], 200);
    }

    /**
     * Create account and send verification link
     *
     * @param string $name
     *
     * @return void
     */
    protected function newAccount($time, $request){
        //$plan=getfromrequest;
        $plan = array("plan"=>"trial","expires_in"=>"30d");

        $account = Account::create([
            "company_name"=>$request->company_name,
            "vat"=>$request->vat,
            "email"=>$request->email,
            "connection"=>json_encode(array("db_name"=>$time)),
            "payment_info"=>json_encode($plan),
        ]);

        return $account->id;
    }

    /**
     * Validate account and create databases
     *
     */
    public function verificate($name, $id)
    {
        $account = Account::find($id);
        if(DB::unprepared('create database zprod'.$name.' character set UTF8 collate utf8_general_ci; use zprod'.$name.';'.$this->migrations) == true){
            Artisan::call('migrate --path=database/migrations/dyndb');
            DB::unprepared("INSERT INTO preferences (company_name,vat,account_id) VALUES ('$account->company_name','$account->vat',$account->id)");
            Artisan::call('db:seed',['--class'=>'ValueListsSeeder']);
            if(DB::unprepared('create database ztest'.$name.' character set UTF8 collate utf8_general_ci; use ztest'.$name.';'.$this->migrations) == true){
                Artisan::call('migrate --path=database/migrations/dyndb');
                DB::unprepared("INSERT INTO preferences (company_name,vat,account_id) VALUES ('$account->company_name','$account->vat',$account->id)");
                Artisan::call('db:seed',['--class'=>'DatabaseSeeder']);
            }
        }
    }

}
