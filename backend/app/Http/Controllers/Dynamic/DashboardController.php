<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Customer;
use App\Dynamic\Contact;
use App\Dynamic\Product;
use App\Dynamic\Quote;
use App\Dynamic\Order;
use App\Dynamic\Invoice;
use App\Dynamic\Todo;
use App\Dynamic\Line;

class DashboardController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('dynamic:api');
    }

    public function dashboard(){
        $dashboard["activecustomers"]=Customer::where('status','Active')->count();
        $dashboard["customers"]=Customer::all()->count();
        $dashboard["openquotes"]=Quote::where('status','Open')->count();
        $dashboard["quotes"]=Quote::all()->count();
        $dashboard["openinvoices"]=Invoice::where('status','Open')->count();
        $dashboard["closedinvoices"]=Invoice::where('status','Closed')->count();
        $dashboard["invoices"]=Invoice::all()->count();
        $dashboard["todosfortoday"]=Todo::where('date',date('Y-m-d'))->count();
        $dashboard["events"]=Todo::all();
        $top=Line::where('lineable_type', 'App\Dynamic\Invoice')->groupBy('product_id')->orderByRaw('SUM(units) DESC')->selectRaw('SUM(units) as units, product_id')->take(10)->get();
        for ($i=0; $i < sizeof($top); $i++) {
            $product = Product::find($top[$i]["product_id"]);
            $t["units"][$i]=$top[$i]["units"];
            $t["products"][$i]=$product["name"];
        }
        $dashboard["topproducts"]=$t;

        $top=Line::where('lineable_type', 'App\Dynamic\Quote')->groupBy('lineable_id')->orderByRaw('SUM(units*price_unit) DESC')->selectRaw('SUM(units*price_unit) as sum, lineable_id')->take(10)->get();
        for ($i=0; $i < sizeof($top); $i++) {
            $quote = Quote::find($top[$i]["lineable_id"]);
            $q["sums"][$i]=$top[$i]["sum"];
            $q["codes"][$i]=$quote["code"];
        }
        $dashboard["topdeals"]=$q;

        $top=Line::where('lineable_type', 'App\Dynamic\Invoice')->groupBy('lineable_id')->orderByRaw('SUM(units*price_unit) DESC')->selectRaw('SUM(units*price_unit) as sum, lineable_id')->take(10)->get();
        for ($i=0; $i < sizeof($top); $i++) {
            $invoice = Invoice::find($top[$i]["lineable_id"]);
            $f["sums"][$i]=$top[$i]["sum"];
            $f["codes"][$i]=$invoice["code"];
        }
        $dashboard["topsales"]=$f;

        return response()->json(["dashboard"=>$dashboard]);
    }
}
