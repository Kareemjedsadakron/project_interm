<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class HistoryjobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $perPage = 10;
      
        if (!empty($keyword)) {
            $Order = Order::Where('order_number', 'LIKE', "%$keyword%")
                ->orwhere('new_order', 'LIKE', "%$keyword%")
                ->orWhere('list_product', 'LIKE', "%$keyword%")
                ->orWhere('company', 'LIKE', "%$keyword%")
                ->orWhere('cell', 'LIKE', "%$keyword%")
                
                ->orderBy('id', 'DESC')->paginate($perPage);
        } else {
            $Order = Order::where('delete','delete')->
            orderBy('id', 'DESC')->paginate($perPage);
        }
        return view('historyjob.index',compact('Order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
         /**
        *$data = [
            *"historyjob" => Historyjob::getItem($id),
           * "order_detail" =>   DB::table('historyjob')->where('historyjob.id', $id) ->join('order_detail', 'historyjob.order_number', '=', 'order_detail.order_number')->get(),
           * ];
           * return view('historyjob/show',$data);
           * */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
