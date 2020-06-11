<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Payment;

/**
 * @group Payments
 *
 * @authenticated
 */
class PaymentsController extends Controller
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
     * Create new
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Payment::create($request->all());
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
        $item = Payment::find($id);
        $item->update($request->all());
        return response()->json(["result"=>$item]);
    }

    /**
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Payment::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }
}
