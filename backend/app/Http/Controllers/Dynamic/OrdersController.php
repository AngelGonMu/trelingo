<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Order;

/**
 * @group Orders
 *
 * @authenticated
 */
class OrdersController extends Controller
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
            $list = Order::where('code', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->orWhere('date', 'like', '%'.$search.'%')
                    ->orWhere('due_date', 'like', '%'.$search.'%')
                    ->orWhere('status', 'like', '%'.$search.'%')
                    ->orderBy($field,$order)
                    ->get();
        } else {
            $list = Order::orderBy($field,$order)->get();
        }
        return response()->json(["results"=>$list]);
    }

    /**
     * Create new
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Order::create($request->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Get
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Order::find($id);
        $item["lines"]=$item->lines()->get();
        return response()->json(["result"=>$item]);
    }

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Order::find($id);
        $item->update($request->all());
        return show($id);
    }

    /**
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Order::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
