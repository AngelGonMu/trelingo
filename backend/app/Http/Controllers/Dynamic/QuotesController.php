<?php

namespace App\Http\Controllers\Dynamic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dynamic\Quote;
use App\Dynamic\Preference;
use PDF;

/**
 * @group Quotes
 *
 * @authenticated
 */
class QuotesController extends Controller
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
            $list = Quote::where('code', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%')
                    ->orWhere('date', 'like', '%'.$search.'%')
                    ->orWhere('due_date', 'like', '%'.$search.'%')
                    ->orWhere('status', 'like', '%'.$search.'%')
                    ->orderBy($field,$order)
                    ->get();
        } else {
            $list = Quote::orderBy($field,$order)->get();
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
        $item = Quote::create($request->all());
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
        $item = Quote::find($id);
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
        $item = Quote::find($id);
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
        $item = Quote::find($id);
        $item->delete();
        return response()->json(["result"=>"Success?"]);
    }

    public function savePDF($id){
        $quote = Quote::find($id);
        $preferences = Preference::find(1);
        $data = array('quote' => $quote, 'preferences' => $preferences);
        $pdf = PDF::loadView('pdf.quote', $data);
        return $pdf->download('quote.pdf');
    }
}
