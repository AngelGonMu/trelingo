<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Contact;

/**
 * @group Contacts
 *
 * @authenticated
 */
class ContactsController extends Controller
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
            $list = Contact::where('name', 'like', '%'.$search.'%')
                    ->orWhere('surname', 'like', '%'.$search.'%')
                    ->orWhere('workplace', 'like', '%'.$search.'%')
                    ->orWhere('contact_info', 'like', '%'.$search.'%')
                    ->orderBy($field,$order)
                    ->get();
        } else {
            $list = Contact::orderBy($field,$order)->get();
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
        $item = Contact::create($request->all());
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
        $item = Contact::find($id);
        $item["todos"]=$item->todos()->get();
        $item["quotes"]=$item->quotes()->get();
        $item["orders"]=$item->orders()->get();
        $item["invoices"]=$item->invoices()->get();
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
        $item = Contact::find($id);
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
        $item = Contact::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
