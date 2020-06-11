<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Preference;
use App\Dynamic\ValueList;

/**
 * @group Preferences
 *
 * @authenticated
 */
class PreferencesController extends Controller
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
     * Get
     *
     * @urlParam preferences required Id of preference
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Preference::find($id);
        $item["users"]=$item->users()->get();
        $item["list"]=ValueList::distinct('list')->get(['list']);
        $item["vl"]=ValueList::all();
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
        $item = Preference::find($id);
        $item->update($request->all());
        return show($id);
    }
}
