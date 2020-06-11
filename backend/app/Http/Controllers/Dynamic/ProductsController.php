<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Product;

/**
 * @group Products
 *
 * @authenticated
 */
class ProductsController extends Controller
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
            if(strrpos($field,".")){
                $field="contact_info";
            }
        } else {
            $field="created_at";
            $order="asc";
        }
        if(strlen($search)!=0){
            if($request->type) {
                $list = Product::where('code', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->orWhere('price_unit', 'like', '%'.$search.'%')
                    ->orWhere('category', 'like', '%'.$search.'%')
                    ->orWhere('subcategory', 'like', '%'.$search.'%')
                    ->where('type', $request->type)
                    ->orderBy($field,$order)
                    ->get();
            } else {
                $list = Product::where('code', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->orWhere('price_unit', 'like', '%'.$search.'%')
                    ->orWhere('category', 'like', '%'.$search.'%')
                    ->orWhere('subcategory', 'like', '%'.$search.'%')
                    ->orderBy($field,$order)
                    ->get();
            }
        } else {
            if($request->type) {
                $list = Product::where('type', $request->type)->orderBy($field,$order)->get();
            } else {
                $list = Product::all();
            }
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
        $item = Product::create($request->all());
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
        $item = Product::find($id);
        $item["characteristics"]=$item->characteristics()->get();
        $item["stock"]=$item->stock()->get();
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
        $item = Product::find($id);
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
        $item = Product::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
