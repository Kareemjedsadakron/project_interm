<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\orderdetail;
use App\users;
use Auth;
use App\User;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landding(Request $request, $id)
    {
        $User = User::firstOrCreate(['name' => $id]);
        Auth::loginUsingId($User->id);
        return  redirect("/order/index");
    }
    public function logout(Request $request)
    {
        
        Auth::logout();
       
        return redirect()->away('/php_login/');
      
      
    }







    public function index(Request $request)
    {
        if (Auth::check()) {
            $keyword = $request->get('q');
            $perPage = 10;
            $users = users::where('id_user', Auth::user()->name)->get();
            if (!empty($keyword)) {
                $order = Order::where('new_order', 'LIKE', "%$keyword%")
                    ->Where('list_product', 'LIKE', "%$keyword%")
                    ->orWhere('company', 'LIKE', "%$keyword%")
                    ->orWhere('cell', 'LIKE', "%$keyword%")
                    ->orWhere('id', 'LIKE', "%$keyword%")
                    ->orWhere('order_number', 'LIKE', "%$keyword%")
                    ->orderBy('id', 'DESC')->paginate($perPage);
            } else {
                $order = Order::where('delete', null)->orderBy('id', 'DESC')->paginate($perPage);
            }
            
            return view('order/index',compact('order','users'));
        }else{
            return redirect()->away('/php_login/');
        }
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $orderNew = Order::orderBy('id', 'DESC')->first();
        $orderdetail = orderdetail::where('order_id', $orderNew->id+1)->get();
      
        return view("order/create",compact('orderNew','orderdetail'));

    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $item = $request->all();        
        //$item = $request->except(['_method','_token']);
        $order = Order::create($item);
        ///input 1
        $orderdetail = orderdetail::create($item);
        ///input 2
        
        $product_name2= $request->input('product_name2');
        $Qty2= $request->input('Qty2');
        $remark2= $request->input('remark2');
        $order_id2= $request->input('order_id2');
        $order_number2= $request->input('order_number2');
        if ($product_name2!='') {
            $orderdetail2 = orderdetail::insert2($product_name2, $Qty2, $remark2, $order_id2, $order_number2);
         
        }

        ///input 3
        $product_name3= $request->input('product_name3');
        $Qty3= $request->input('Qty3');
        $remark3= $request->input('remark3');
        $order_id3= $request->input('order_id3');
        $order_number3= $request->input('order_number3');
         if ($product_name3!='') {
        $orderdetail3 = orderdetail::insert3($product_name3, $Qty3, $remark3, $order_id3, $order_number3);
         }

          ///input 4
        $product_name4= $request->input('product_name4');
        $Qty4= $request->input('Qty4');
        $remark4= $request->input('remark4');
        $order_id4= $request->input('order_id4');
        $order_number4= $request->input('order_number4');
         if ($product_name4!='') {
        $orderdetail4 = orderdetail::insert4($product_name4, $Qty4, $remark4, $order_id4, $order_number4);
         }
         ///input 5
        $product_name5= $request->input('product_name5');
        $Qty5= $request->input('Qty5');
        $remark5= $request->input('remark5');
        $order_id5= $request->input('order_id5');
        $order_number5= $request->input('order_number5');
         if ($product_name5!='') {
        $orderdetail5 = orderdetail::insert5($product_name5, $Qty5, $remark5, $order_id5, $order_number5);
         }
          ///input 6
        $product_name6= $request->input('product_name6');
        $Qty6= $request->input('Qty6');
        $remark6= $request->input('remark6');
        $order_id6= $request->input('order_id6');
        $order_number6= $request->input('order_number6');
         if ($product_name6!='') {
        $orderdetail6 = orderdetail::insert6($product_name6, $Qty6, $remark6, $order_id6, $order_number6);
         }




       $id = $order->id;
       return redirect("/order/{$id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            "order" => Order::getItem($id),
           
            ];
            return view('order/show',$data);
            
    }
    public function worker($id)
    {
        $data = [
            "order" => Order::getItem($id),
           
            ];
            return view('order/worker',$data);
            
    }
    public function status($id)
    {
       $data = [
           "order" => Order::getItem($id),
           
            ];
           return view('order/status',$data);
            
    }
    public function check_job($id)
    {
        $data = [
            "order" => Order::getItem($id),
           
            ];
            return view('order/check_job',$data);
           
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "order" => Order::getItem($id),
            ];
            return view("order/edit",$data);
            
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
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $ses = $request->input('up');    
        $item = $request->all();  
        $item = $request->all();     
        $item = $request->except(['_method','_token']);
        $order = Order::updateItem($id,$item);
        return back();


    }
    public function update_worker(Request $request, $id)
    {
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $ses = $request->input('up');    
        $item = $request->all();      
        $item = $request->except(['_method','_token']);
        $order = Order::updateItem($id,$item);
        return back();

    }
    public function update_status(Request $request, $id)
    {
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $ses = $request->input('up');    
        $item = $request->all();      
        $item = $request->except(['_method','_token']);
        $order = Order::updateItem($id,$item);
        return back();

    }
    public function update_check_job(Request $request, $id)
    {
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $ses = $request->input('up');    
        $item = $request->all();      
        $item = $request->except(['_method','_token']);
        $order = Order::updateItem($id,$item);
        return back();

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::Historycopy($id);
        Order::destroyItem($id);
        return back();
    }

    public function delete(Request $request, $id)
    {
        $item = $request->all();     
        $order = Order::updateItem($id,$item);
        return back();


    }
}
