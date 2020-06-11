<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\ValueList;

/**
 * @group Value Lists
 *
 * @authenticated
 */
class ValueListsController extends Controller
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
     * @bodyParam list String required List name. Example: Categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = ValueList::where('list', $request->list)->get();
        return response()->json(["results"=>$list]);
    }

    /**
     * Create value
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(0){
            return response()->json(["error"=>"You can not add values on list '$request->list'"]);
        }
        $item = ValueList::create($request->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Update value
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(0){
            return response()->json(["error"=>"You can not edit values on list '$request->list'"]);
        }
        $item = ValueList::find($id);
        $item->update($request->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Delete value
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(0){
            return response()->json(["error"=>"You can not delete values on list '$request->list'"]);
        }
        $item = ValueList::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
