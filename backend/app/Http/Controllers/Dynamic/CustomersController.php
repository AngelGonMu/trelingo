<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Customer;

/**
 * @group Customers
 *
 * @authenticated
 */
class CustomersController extends Controller
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

    /**
     * List
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $sort = $request->get("sort");
        if(strlen($sort)!=0){
            $start=strrpos($sort,":");
            $field=substr($sort, 0, $start);
            $order=substr($sort, $start+1, strlen($sort));
        } else {
            $field="created_at";
            $order="asc";
        }
        if(strlen($search)!=0){
            $list = Customer::where('name', 'like', '%'.$search.'%')
                    ->orWhere('type', 'like', '%'.$search.'%')
                    ->orWhere('status', 'like', '%'.$search.'%')
                    ->orWhere('contact_info', 'like', '%'.$search.'%')
                    ->orderBy($field,$order)
                    ->get();
        } else {
            $list = Customer::orderBy($field,$order)->get();
        }
        return response()->json(["results"=>$list]);
    }

    /**
     * Create new
     *
     * @bodyParam name String Company's name. Example: Alan D Rosenburg Cpa Pc
     * @bodyParam vat String Company's organisation number. Example: X12345678
     * @bodyParam type String Type. Example: Customer
     * @bodyParam status String Status. Example: Active
     * @bodyParam address_info String Stringified JSON Address information. Example: {"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"}
     * @bodyParam contact_info String Stringified JSON Contact information. Example: {"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}
     *
     * @response {"id": 5, "name":"Alan D Rosenburg Cpa Pc","vat":"X12345678","type":"Customer","status":"Active","address_info":{"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"},"contact_info":{"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}}
     *
     * @response 401 {
     *  "error": "Non authorized"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Customer::create($request->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Get
     *
     * @urlParam customer required id of the Customer. Example: 5
     *
     * @response {"id": 5, "name":"Alan D Rosenburg Cpa Pc","vat":"X12345678","type":"Customer","status":"Active","address_info":{"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"},"contact_info":{"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}}
     *
     * @response 401 {
     *  "error": "Non authorized"
     * }
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Customer::find($id);
        $item["contacts"]=$item->contacts()->get();
        $item["todos"]=$item->todos()->get();
        $item["quotes"]=$item->quotes()->get();
        $item["orders"]=$item->orders()->get();
        $item["invoices"]=$item->invoices()->get();
        return response()->json(["result"=>$item]);
    }

    /**
     * Update
     *
     * @urlParam customer required id of the Customer. Example: 5
     *
     * @bodyParam name String Company's name. Example: Alan D Rosenburg Cpa Pc
     * @bodyParam vat String Company's organisation number. Example: X12345678
     * @bodyParam type String Type. Example: Customer
     * @bodyParam status String Status. Example: Active
     * @bodyParam address_info String Stringified JSON Address information. Example: {"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"}
     * @bodyParam contact_info String Stringified JSON Contact information. Example: {"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}
     *
     * @response {"id": 5, "name":"Alan D Rosenburg Cpa Pc","vat":"X12345678","type":"Customer","status":"Active","address_info":{"address": "85 Bridgewater St", "city": "Shard End Ward", "province": "West Midlands", "postal_code": "B34 7BP", "country": "United Kingdom"},"contact_info":{"phone1": "01689-253476", "phone2": "01376-851958", "email": "info@barajasbustamantearchl.co.uk", "web": "http://www.barajasbustamantearchl.co.uk"}}
     *
     * @response 401 {
     *  "error": "Non authorized"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Customer::find($id);
        $item->update($request->all());
        return show($id);
    }

    /**
     * Delete
     *
     * @urlParam customer required id of the Customer. Example: 5
     *
     * @response {"success": true}
     *
     * @response 401 {
     *  "error": "Non authorized"
     * }
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Customer::find($id);
        $item->delete();
        return response()->json(["success"=>true]);
    }
}
