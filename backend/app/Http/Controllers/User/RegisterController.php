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

class RegisterController extends Controller
{

    private $migrations = "DROP TABLE IF EXISTS `migrations`;CREATE TABLE `migrations` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT,`migration` varchar(255) NOT NULL,`batch` int(11) NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    /**
     * Register user     
     * 
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

        // $ac = new AuthController();
        // $res = $ac->login();
        //var_dump($res);

        $this->verificate($time."_".$user->account_id, $user->account_id);

        //return response()->json(['response' => 'creado'], 200);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function verificate($name, $id)
    {
        $account = Account::find($id);
        if(DB::unprepared('create database zprod'.$name.' character set UTF8 collate utf8_general_ci; use zprod'.$name.';'.$this->migrations) == true){
            Artisan::call('migrate --path=database/migrations/dyndb');
            DB::unprepared("INSERT INTO preferences (company_name,vat,account_id) VALUES ('$account->company_name','$account->vat',$account->id)");
            if(DB::unprepared('create database ztest'.$name.' character set UTF8 collate utf8_general_ci; use ztest'.$name.';'.$this->migrations) == true){
                Artisan::call('migrate --path=database/migrations/dyndb');
                DB::unprepared("INSERT INTO preferences (company_name,vat,account_id) VALUES ('$account->company_name','$account->vat',$account->id)");
            }
        }
    }

}
