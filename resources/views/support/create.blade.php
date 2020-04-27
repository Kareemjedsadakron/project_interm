@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<h1>เพิ่มการซัพพอร์ต </h1>

<form 
action="{{ url('/') }}/support" 
method="POST" enctype="multipart/form-data" >

	{{ csrf_field() }}
	{{ method_field('POST') }}

	

	<div class="form-row">
		<strong class=" col-form-label">วันที่รับคำร้อง: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="date" name="request" value="{{ isset($support->request) ?  $support->request : '' }}"
				class="form-control" placeholder="" required>
		</div>

		
		<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เสร็จ: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="date" name="completion" value="{{ isset($support->completion) ? $support->completion : 'ไม่พบข้อมูล' }}"
				class="form-control" placeholder="ยังไม่ระบุ" readonly />
		</div>
	</div><br>

	<div class="form-row">
		<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;บริษัทลูกค้า: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="text" name="company" value="{{ isset($support->company) ? $support->company : '' }}"
				class="form-control" placeholder="บริษัทลูกค้า" required />
		</div>
	
		<strong class=" col-form-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อลูกค้า: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="text" name="name_customer"
				value="{{  isset($support->name_customer) ?  $support->name_customer : '' }}" class="form-control"
				placeholder="ชื่อลูกค้า" required />
		</div>
	</div><br>

	<div class="form-row">
		<strong class=" col-form-label">เบอร์โทรศัพท์: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="text" name="telephone" id="telephone" value="{{ isset($support->telephone) ?  $support->telephone : '' }}"
				class="form-control" onkeypress="isInputNumber(event)" placeholder="เบอร์โทรศัพท์" maxlength="10" required />
		</div>
	
		<strong class=" col-form-label">ผู้รับผิดชอบ: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<select class="form-control" id="exampleFormControlSelect1" input type="text" name="responsible" value="{{ isset($support->responsible) ?  $support->responsible : '' }}"
				class="form-control" placeholder="ผู้รับผิดชอบ" required>
			<option selected>Choose...</option>
			<option><h3>Vision</h3></option>
			<option><h3>Machanic</h3></option>
			<option><h3>Electrical</h3></option>
			</select>
			<!--<input type="text" name="responsible" value="{{ isset($support->responsible) ?  $support->responsible : '' }}"
				class="form-control" placeholder="ผู้รับผิดชอบ" required /> -->
		</div>
	</div><br>
	
	<div class="form-row">
		<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อีเมลล์: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="e-mail" name="email" value="{{ isset($support->email) ? $support->email : '' }}"
				class="form-control" placeholder="อีเมลล์"  />
		</div>
	
		<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			อื่นๆ: </strong>
		<div class="col-sm-12 col-md-3 col-lg-4 ">
			<input type="text" name="other" value="{{ isset($support->other) ? $support->other : '' }}" class="form-control"
				placeholder="อื่นๆ" />
		</div>
	</div><br>
	<div class="p-3 mb-2 bg-dark text-white">
		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<strong>คำร้องเรียน </strong><br><br>
	
				<textarea input type="text" name="complaint"
					value="{{  isset($support->complaint) ?  $support->complaint : '' }}" class="form-control"
					placeholder="คำร้องเรียน" required></textarea>
			</div>
		</div>
	</div><br>
	<div>
		
		{{-- <div class="col">
			<input type="text" name="support_image"
				value="{{ isset($support->support_image) ?  $support->support_image : '' }}" class="form-control"
				placeholder="เพิ่มรูป" />
				 <div class="form-group">
				    <label for="exampleFormControlFile1">Example file input</label>
				    <input type="file" class="form-control-file" id="exampleFormControlFile1">
				 </div>
		</div> --}}

		<div class="form-row d-none" >
			<strong class=" col-form-label">เลขซัพพอร์ต: </strong>
			<div class="col-md-4    ">
				<?php $today = date("d/m/y"); //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
            $today_split = explode('/',$today); //split ข้อมูลที่เป็นข้อมูล แยกออกมาเป็น อาเร โดยใช้ "/"
            
     ?>
				@forelse ($supportNew as $supportNew)
					<input type="text" name="support_number"
					value="CS{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php
					$str=$supportNew->id+1;
					echo str_pad($str,4,"0",STR_PAD_LEFT);
            		?> " class="form-con	trol"
					placeholder="เลขซัพพอต" />
				@empty
					<input type="text" name="support_number"
					value="1" class="form-control"
					placeholder="เลขซัพพอต" />
				@endforelse
				
			</div>

			<strong class=" col-form-label">ผู้รับบงาน : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="worker_support" value="{{ isset($support->worker_support) ?  $support->worker_support : 'ไม่พบข้อมูล' }}"
                class="form-control" />
		</div>
		
		
		</div>


<div class="d-none"
		<button type="button" class="btn btn-secondary btn-lg btn-block">ผู้รับผิดชอบ :  </button><br><br>
        
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="form-row">
            <div class="col-sm-12 col-md-3 col-lg-4">
    
                <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;
                    รับคำร้องเรียน </strong><br><br>
                <div class="col-xs">
                    <input  type="text" name="receive_complaints" value="{{ isset($support->receive_complaints) ? $support->receive_complaints : '' }}" 
                        class="form-control"placeholder="รับคำร้องเรียน" >
                   
                </div>
    
                
            </div>
        </div>
    </div>
    
   
      
	

                
                

            
         
</div>
<h3 ><i class="glyphicon glyphicon-upload"></i> เพิ่มไฟล์รูป</h3>
<div id="input1">	
	<div class="row">
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img1" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn2">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>

<div id="input2">	
	<div class="row">
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img2" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn3">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>
<div id="input3">	
	<div class="row">
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img3" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn4">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>

<div id="input4">	
	<div class="row">
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img4" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn5">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>
<div id="input5">	
	<div class="row">
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img5" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn6">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>
<div id="input6">	
	<div class="row" >
		<div class="col-8">
			<div class="custom-file">
				<input type="file" name="img6" >	
			</div>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-success" id="btn2">เพิ่มรูปภาพ</button>
		</div>
	</div>
</div>
<br>


   
		
	 

 </div>

<br>


<button type="submit" class="btn btn-primary">
	<i class="far fa-save"></i>&nbsp; บันทึก
</button>
<a href="{{ url('/') }}/support"class="text-white">
		<button type="button" class="btn btn-warning">
		<i class="fas fa-arrow-left"></i>&nbsp; กลับ
		</button>
</a>
</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#input2  ").hide();
        $("#input3  ").hide();
        $("#input4  ").hide();
        $("#input5  ").hide();
        $("#input6  ").hide();
       

        $("#btn2").click(function () {
            $("#input2  ").show();
            $("#btn2 ").hide();
        });

        $("#btn3").click(function () {
            $("#input3  ").show();
            $("#btn3 ").hide();
        });
        $("#btn4").click(function () {
            $("#input4  ").show();
            $("#btn4 ").hide();
        });
        $("#btn5").click(function () {
            $("#input5 ").show();
            $("#btn5 ").hide();
        });
        $("#btn6").click(function () {
            $("#input6").show();
            $("#btn6 ").hide();
        });
       


        $("#close2").click(function () {
            $("#btn2  ").show();
            $("#input2 ").hide();
            document.getElementById('product_name2').value = '';
            document.getElementById('Qty2').value = '';
            document.getElementById('remark2').value = '';
            document.getElementById('order_id2').value = '';
            document.getElementById('order_number2').value = '';

        });

        $("#close3").click(function () {
            $("#btn3  ").show();
            $("#input3 ").hide();
            document.getElementById('product_name3').value = '';
            document.getElementById('Qty3').value = '';
            document.getElementById('remark3').value = '';
            document.getElementById('order_id3').value = '';
            document.getElementById('order_number3').value = '';

        });

        $("#close4").click(function () {
            $("#btn4  ").show();
            $("#input4 ").hide();
            document.getElementById('product_name4').value = '';
            document.getElementById('Qty4').value = '';
            document.getElementById('remark4').value = '';
            document.getElementById('order_id4').value = '';
            document.getElementById('order_number4').value = '';

        });

        $("#close5").click(function () {
            $("#btn5  ").show();
            $("#input5 ").hide();
            document.getElementById('product_name5').value = '';
            document.getElementById('Qty5').value = '';
            document.getElementById('remark5').value = '';
            document.getElementById('order_id5').value = '';
            document.getElementById('order_number5').value = '';

        });

        $("#close6").click(function () {
            $("#btn6  ").show();
            $("#input6 ").hide();
            document.getElementById('product_name6').value = '';
            document.getElementById('Qty6').value = '';
            document.getElementById('remark6').value = '';
            document.getElementById('order_id6').value = '';
            document.getElementById('order_number6').value = '';

        });
        
    });
</script>
{{-- การดัก text  --}}
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.alphanumeric.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
	$('#telephone').numeric();
 
});
</script>
<script>
            
	function isInputNumber(evt){
		
		var ch = String.fromCharCode(evt.which);
		
		if(!(/[0-9]/.test(ch))){
			evt.preventDefault();
		}
		
	}
	
</script>
@endsection

