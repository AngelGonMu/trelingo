<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\ValueList;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = ValueList::where('list', $request->list)->get();
        return response()->json(["results"=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = json_decode($request->json);
        if(0){
            return response()->json(["error"=>"You can not add values on list '$json->list'"]);
        }
        $item = ValueList::create($json->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $json = json_decode($request->json);
        if(0){
            return response()->json(["error"=>"You can not edit values on list '$json->list'"]);
        }
        $item = ValueList::find($id);
        $item->update($json->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = json_decode($request->json);
        if(0){
            return response()->json(["error"=>"You can not delete values on list '$json->list'"]);
        }
        $item = ValueList::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
