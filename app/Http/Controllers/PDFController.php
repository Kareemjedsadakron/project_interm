<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\orderdetail;
use PDF;

class PDFController extends Controller
{
    public function pdf($id)
    {
        
        $order_detail = orderdetail::where('order_id',$id)->get();
        $Order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf',compact('Order','order_detail'));
       
        return $pdf->stream('เลขที่บสั่งงาน'.'-'.$Order->order_number ); //แบบนี้จะ stream มา preview 
       
    }
    
}
