<?php

namespace App\Http\Controllers;
use App\Support;
use App\users;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $perPage = 10;
        if(!empty($q)){ 
            $support = Support::where('request', 'LIKE', "%$q%")
                ->orWhere('support_number', 'LIKE', "%$q%")
                ->orWhere('company', 'LIKE', "%$q%")
                ->orWhere('name_customer', 'LIKE', "%$q%")
                ->orWhere('responsible', 'LIKE', "%$q%")
                ->orderBy('id', 'DESC')->paginate($perPage);
            }else{
                $support = Support::where('delete', null)->orderBy('id', 'DESC')->paginate($perPage);
            }
            
            return view('support/index',compact('support'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $supportNew = Support::orderBy('id', 'DESC')->limit(1)->get();
        
      
        return view("support/create",compact('supportNew'));

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
        $support = Support::storeItem($item);
        $id = $support->id;
      
      
        request([

            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'img4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'img5' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'img6' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            

        ]);

        if(request()->img1 =="" && request()->img2=="" && request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){

        }else if(request()->img2=="" && request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            
        $request->img1->move(public_path('images'), $imageName1);
            

        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
       

        }else if(request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2'.'.'.request()->img2->getClientOriginalExtension();
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
      
   

        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
       
        }else if(request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3'.'.'.request()->img3->getClientOriginalExtension(); 
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
       
        

        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['img3' => $imageName3]);
       
   

        }else if(request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4'.'.'.request()->img4->getClientOriginalExtension();   
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
      
        

        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['img3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['img4' => $imageName4]);
     

        }else if(request()->img6==""){
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4'.'.'.request()->img4->getClientOriginalExtension(); 
            $imageName5 = time().$id.'5'.'.'.request()->img5->getClientOriginalExtension();  
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
        $request->img5->move(public_path('images'), $imageName5);
        


        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['img3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['img4' => $imageName4]);
        $image_data5 = Support::where('id', $id)->update(['img5' => $imageName5]);
     

        }else{
            $imageName1 = time().$id.'1'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4'.'.'.request()->img4->getClientOriginalExtension(); 
            $imageName5 = time().$id.'5'.'.'.request()->img5->getClientOriginalExtension();  
            $imageName6 = time().$id.'6'.'.'.request()->img6->getClientOriginalExtension();     
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
        $request->img5->move(public_path('images'), $imageName5);
        $request->img6->move(public_path('images'), $imageName6);
   
            

        $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['img3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['img4' => $imageName4]);
        $image_data5 = Support::where('id', $id)->update(['img5' => $imageName5]);
        $image_data6 = Support::where('id', $id)->update(['img6' => $imageName6]);
        }
       
      
       
    
       
        
   




        
       
        if($support->responsible=='Vision'){
            $users = users::where('position','programmer')->get();
          
                $details = [
                    'title' => 'แจ้งเตือนการซัพพอตลูกค้า',
                    'body' => "http://localhost/projectjob/public/support/$id",
                    'support_number' => $support->support_number,
                    'company' => $support->company
                    
                ];
          foreach($users as $users){
            
                \Mail::to($users->email)->send(new SendMail($details));
        
            }
           
           
        }
        if($support->responsible=='Machanic'){
            $users = users::where('position','co-programmer')->get();
            $details = [
                'title' => 'แจ้งเตือนการซัพพอตลูกค้า',
                'body' => "http://localhost/projectjob/public/support/$id",
                'support_number' => $support->support_number,
                'company' => $support->company
               
            ];
    
            foreach($users as $users){
                \Mail::to($users->email)->send(new SendMail($details));
        
            }
    
           
        }       
        if($support->responsible=='technician'){
            
            $users = users::where('position','technician')->get();
            $details = [
                'title' => 'แจ้งเตือนการซัพพอตลูกค้า',
                'body' => "http://localhost/projectjob/public/support/$id",
                'support_number' => $support->support_number,
                'company' => $support->company
                
            ];
    
            foreach($users as $users){
                \Mail::to($users->email)->send(new SendMail($details));
        
            }
           
        }

        return redirect("/support/{$id}");

    }

    public function mailsend()
    {
        $details = [
            'title' => 'แจ้งเตือนการซัพพอตลูกค้า /mailcontroller',
            'body' => 'ลิงค์',
            'support_number' => 'CS240220-0001',
            'company' => 'BMW',
            'responsible' => 'Vision',
            'email' =>'admin@gmail.com'
        ];

        \Mail::to('kareem15268@gmail.com')->send(new SendMail($details));
        return back();
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
            "support" => Support::getItem($id),
            ];
            return view('support/show',$data);
            
    }
    public function receive_complaints($id)
    {
        $data = [
            "support" => Support::getItem($id),
           
            ];
            return view('support/receive_complaints',$data);
            
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
            "support" => Support::getItem($id),
            ];
            return view("support/edit",$data);
    }

    public function editupdate($id)
    {
        $data = [
            "support" => Support::getItem($id),
            ];
            return view("support/editupdate",$data);
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
      
        $item = $request->all(); 
        $item = $request->except(['_method','_token']);
        $support = Support::updateItem($id,$item);
        $support_if = Support::where('id',$id);
        request([

            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img5' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img6' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            

        ]);

        if(request()->img1){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $request->img1->move(public_path('images'), $imageName1);
            $image_data1 = Support::where('id', $id)->update(['img1' => $imageName1]);
        }else{
            
        }
        if(request()->img2){
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension(); 
            $request->img2->move(public_path('images'), $imageName2);
            $image_data2 = Support::where('id', $id)->update(['img2' => $imageName2]);
        }else{
           
        }
        if(request()->img3){
            $imageName3 = time().$id.'3edit'.'.'.request()->img3->getClientOriginalExtension(); 
            $request->img3->move(public_path('images'), $imageName3);
            $image_data3 = Support::where('id', $id)->update(['img3' => $imageName3]);
        }else{
           
        }
        if(request()->img4){
            $imageName4 = time().$id.'4edit'.'.'.request()->img4->getClientOriginalExtension(); 
            $request->img4->move(public_path('images'), $imageName4);
            $image_data4 = Support::where('id', $id)->update(['img4' => $imageName4]);
        }else{
           
        }
        if(request()->img5){
            $imageName5 = time().$id.'5edit'.'.'.request()->img5->getClientOriginalExtension(); 
            $request->img5->move(public_path('images'), $imageName5);
            $image_data5 = Support::where('id', $id)->update(['img5' => $imageName5]);
        }else{
            
        }
        if(request()->img6){
            $imageName6 = time().$id.'6edit'.'.'.request()->img6->getClientOriginalExtension(); 
            $request->img6->move(public_path('images'), $imageName6);
            $image_data6 = Support::where('id', $id)->update(['img6' => $imageName6]);
        }else{
           
        }
           
       
       
       
        return redirect("/support/{$id}");
        
    }
    public function update_image(Request $request, $id)
    {
        request([

            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img5' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img6' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'completion' => 'required',
            'worker_support'  => 'required',
            'receive_complaints'  => 'required',

        ]); 
        if(request()->img1 =="" && request()->img2=="" && request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){

        }else if(request()->img2=="" && request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            
            $request->img1->move(public_path('images'), $imageName1);
                
            $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
       
        }else if(request()->img3=="" && request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension();
            
            $request->img1->move(public_path('images'), $imageName1);
            $request->img2->move(public_path('images'), $imageName2);
            
            $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
            $image_data2 = Support::where('id', $id)->update(['image_update2' => $imageName2]);
       
        }else if(request()->img4=="" && request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3edit'.'.'.request()->img3->getClientOriginalExtension(); 
            
            $request->img1->move(public_path('images'), $imageName1);
            $request->img2->move(public_path('images'), $imageName2);
            $request->img3->move(public_path('images'), $imageName3);
 
            $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
            $image_data2 = Support::where('id', $id)->update(['image_update2' => $imageName2]);
            $image_data3 = Support::where('id', $id)->update(['image_update3' => $imageName3]);
       
   

        }else if(request()->img5=="" && request()->img6==""){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3edit'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4edit'.'.'.request()->img4->getClientOriginalExtension();   
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
      
        

        $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['image_update2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['image_update3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['image_update4' => $imageName4]);
     

        }else if(request()->img6==""){
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3edit'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4edit'.'.'.request()->img4->getClientOriginalExtension(); 
            $imageName5 = time().$id.'5edit'.'.'.request()->img5->getClientOriginalExtension();  
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
        $request->img5->move(public_path('images'), $imageName5);
        


        $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['image_update2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['image_update3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['image_update4' => $imageName4]);
        $image_data5 = Support::where('id', $id)->update(['image_update5' => $imageName5]);
     

        }else{
            $imageName1 = time().$id.'1edit'.'.'.request()->img1->getClientOriginalExtension(); 
            $imageName2 = time().$id.'2edit'.'.'.request()->img2->getClientOriginalExtension();
            $imageName3 = time().$id.'3edit'.'.'.request()->img3->getClientOriginalExtension(); 
            $imageName4 = time().$id.'4edit'.'.'.request()->img4->getClientOriginalExtension(); 
            $imageName5 = time().$id.'5edit'.'.'.request()->img5->getClientOriginalExtension();  
            $imageName6 = time().$id.'6edit'.'.'.request()->img6->getClientOriginalExtension();     
            
        $request->img1->move(public_path('images'), $imageName1);
        $request->img2->move(public_path('images'), $imageName2);
        $request->img3->move(public_path('images'), $imageName3);
        $request->img4->move(public_path('images'), $imageName4);
        $request->img5->move(public_path('images'), $imageName5);
        $request->img6->move(public_path('images'), $imageName6);
   
            

        $image_data1 = Support::where('id', $id)->update(['image_update1' => $imageName1]);
        $image_data2 = Support::where('id', $id)->update(['image_update2' => $imageName2]);
        $image_data3 = Support::where('id', $id)->update(['image_update3' => $imageName3]);
        $image_data4 = Support::where('id', $id)->update(['image_update4' => $imageName4]);
        $image_data5 = Support::where('id', $id)->update(['image_update5' => $imageName5]);
        $image_data6 = Support::where('id', $id)->update(['image_update6' => $imageName6]);
        }
       
      
       
    
        echo request()->completion;
        $completion = Support::where('id', $id)->update(['completion' => request()->completion],['worker_support' => request()->worker_supports],['receive_complaints' => request()->receive_complaints]);
        $completion2 = Support::where('id', $id)->update(['receive_complaints' => request()->receive_complaints]);
        $completion3 = Support::where('id', $id)->update(['worker_support' => request()->worker_support]);
        return redirect("/support/{$id}");

    }
 
    public function update_receive_complaints(Request $request, $id)
    {
        //GET ARRAY OF ALL DATA FROM THE PREVIOUS FORM BY NAME ATTRIBUTE
        $ses = $request->input('up');    
        $item = $request->all();      
        $item = $request->except(['_method','_token']);
        $support = Support::updateItem($id,$item);
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
        Support::destroyItem($id);
        return back();

    }
    public function delete(Request $request, $id)
    {
        $item = $request->all();     
        $support = Support::updateItem($id,$item);
        return back();


    }
}
