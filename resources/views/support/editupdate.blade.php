@extends('layouts.theme')

@section('content')
<?php
session_start();
?>

<style>
	body {
	  font-family: Verdana, sans-serif;
	  margin: 0;
	}
	
	* {
	  box-sizing: border-box;
	}
	
	.row > .column {
	  padding: 0 8px;
	}
	
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}
	
	.column {
	  float: left;
	  width: 25%;
	}
	
	/* The Modal (background) */
	.modal {
	  display: none;
	  position: fixed;
	  z-index: 1;
	  padding-top: 100px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: black;
	}
	
	/* Modal Content */
	.modal-content {
	  position: relative;
	  background-color: #fefefe;
	  margin: auto;
	  padding: 0;
	  width: 90%;
	  max-width: 1200px;
	}
	
	/* The Close Button */
	.close {
	  color: white;
	  position: absolute;
	  top: 10px;
	  right: 25px;
	  font-size: 35px;
	  font-weight: bold;
	}
	
	.close:hover,
	.close:focus {
	  color: #999;
	  text-decoration: none;
	  cursor: pointer;
	}
	
	.mySlides {
	  display: none;
	}
	
	.cursor {
	  cursor: pointer;
	}
	
	/* Next & previous buttons */
	.prev,
	.next {
	  cursor: pointer;
	  position: absolute;
	  top: 50%;
	  width: auto;
	  padding: 16px;
	  margin-top: -50px;
	  color: white;
	  font-weight: bold;
	  font-size: 20px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	  user-select: none;
	  -webkit-user-select: none;
	}
	
	/* Position the "next button" to the right */
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}
	
	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
	  background-color: rgba(0, 0, 0, 0.8);
	}
	
	/* Number text (1/3 etc) */
	.numbertext {
	  color: #f2f2f2;
	  font-size: 12px;
	  padding: 8px 12px;
	  position: absolute;
	  top: 0;
	}
	
	img {
	  margin-bottom: -4px;
	}
	
	.caption-container {
	  text-align: center;
	  background-color: black;
	  padding: 2px 16px;
	  color: white;
	}
	
	.demo {
	  opacity: 0.6;
	}
	
	.active,
	.demo:hover {
	  opacity: 1;
	}
	
	img.hover-shadow {
	  transition: 0.3s;
	}
	
	.hover-shadow:hover {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	</style>

  <center>
    <h1>การซัพพอร์ตลูกค้า</h1>
  </center><br>

<button type="button" class="btn btn-secondary btn-lg btn-block">แอดมิน</button><br>
<h4>เลขซัพพอร์ตลูกค้า : {{ $support->support_number }} </h4><br>
<div class="form-group row">
	<strong class=" col-form-label">วันที่รับคำร้อง : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ $support->request }} </span>
</div>


	<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เสร็จ : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ isset($support->completion) ? $support->completion : 'ไม่พบข้อมูล' }}</span>
</div>
</div><br>
<div class="form-group row">
	<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อบริษัท : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ $support->company }}</span>
</div>

	<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อลูกค้า : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ $support->name_customer }}</span>
</div>
</div><br>
<div class="form-group row">
	<strong class=" col-form-label">&nbsp;&nbsp;เบอร์โทรศัพท์ : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ $support->telephone }}</span>
</div>

	<strong class=" col-form-label">ผู้รับผิดชอบ : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ $support->responsible }}</span>
</div>
</div><br>
<div class="form-group row">
	<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อีเมลล์ : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ isset($support->email) ? $support->email : 'ไม่มีข้อมูล' }}</span>
</div>

	<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อื่นๆ : </strong>
	<div class="col-sm-12 col-md-3 col-lg-4">
	<span class="form-control">{{ isset($support->other) ? $support->other : '-' }}</span>
</div>
</div><br>
<div class="p-3 mb-2 bg-dark text-white">
    <div class="form-row">
        <div class="col-12">
	<strong>คำร้องเรียน : </strong><br><br>
	<div class="p-3 mb-2 bg-light text-dark">
		<td>{!! nl2br(e($support->complaint )) !!}</td>
	</div>
	
</div>
	</div>
</div><br>

<div>

	
<div>
	<strong>รูป : </strong><br>
	
		@if ($support->img1=="")
			
		@else
			<img src="{{url('images/'.$support->img1)}}"
			style="width:15%; height:15%;" onclick="openModal(1);currentSlide(1)" class="hover-shadow cursor">
		@endif
		@if ($support->img2=="")
			
		@else
			<img src="{{url('images/'.$support->img2)}}"
			style="width:15%; height:15%;" onclick="openModal(2);currentSlide(2)" class="hover-shadow cursor">
		@endif
		@if ($support->img3=="")
			
		@else
			
		<img src="{{url('images/'.$support->img3)}}" 
		style="width:15%; height:15%;" onclick="openModal(3);currentSlide(3)" class="hover-shadow cursor">
	  
		@endif
		@if ($support->img4=="")
			
		@else
			
		 
		<img src="{{url('images/'.$support->img4)}}" 
		style="width:15%; height:15%;" onclick="openModal(4);currentSlide(4)" class="hover-shadow cursor">
		@endif
		@if ($support->img5=="")
			
		@else
		<img src="{{url('images/'.$support->img5)}}" 
		style="width:15%; height:15%;" onclick="openModal(5);currentSlide(5)" class="hover-shadow cursor">
		@endif
	
		
		
		
		 @if ($support->img6=="")
			 
		 @else
		 <img src="{{url('images/'.$support->img6)}}" 
		 style="width:15%; height:15%;" onclick="openModal(6);currentSlide(6)" class="hover-shadow cursor">
		 @endif
			
		 
	</div>

	<div id="myModal1" class="modal">
		<span class="close cursor" onclick="closeModal(1)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img1)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	<div id="myModal2" class="modal">
		<span class="close cursor" onclick="closeModal(2)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img2)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	<div id="myModal3" class="modal">
		<span class="close cursor" onclick="closeModal(3)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img3)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	<div id="myModal4" class="modal">
		<span class="close cursor" onclick="closeModal(4)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img4)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	<div id="myModal5" class="modal">
		<span class="close cursor" onclick="closeModal(5)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img5)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	<div id="myModal6" class="modal">
		<span class="close cursor" onclick="closeModal(6)">&times;</span>
		<div class="modal-content">
	  
		  <div class="mySlides1">
			<div class="numbertext"></div>
			<img src="{{url('images/'.$support->img6)}}"  style="width:100%; height:50%;">
		  </div>
		</div>
	</div>
	
</div>
</div><br><br>
<form 
action="{{ url('/') }}/support/image_update/{{ $support->id }}" 
method="POST" enctype="multipart/form-data">

	{{ csrf_field() }}
	{{ method_field('PUT') }}
{{-- ส่วนของอัปเดรตวันที่ปัจจุบัน --}}
<div class="d-none">
	
	<?php
date_default_timezone_set("Asia/Bangkok");
echo date_default_timezone_get();
?>
<strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เสร็จ: </strong>
    <div class="col-sm-12 col-md-3 col-lg-4 ">
        <input type="datetime" name="completion" value="<?php echo date("Y-m-d H:i:s"); ?>"
		class="form-control" placeholder=""  />
		<input type="text" class="" name="worker_support" value="{{$_SESSION["name"]}}"
        class="form-control" placeholder=""  />
	</div>
	
	
</div>

<!-- ส่วนของรับคำร้อง -->
<button type="button" class="btn btn-secondary btn-lg btn-block">ผู้รับผิดชอบ : {{ $support->responsible }} </button><br>

<div class="p-3 mb-2 bg-dark text-white">
    <div class="form-row">
        <div class="col">
            <strong class=" col-form-label">
                รับคำร้องเรียน </strong><br><br>
            <div class="col-sm-12 col-md-12 col-lg-12">
				<textarea type="text"  name="receive_complaints"
        class="form-control" placeholder="" required >{{ $support->receive_complaints }}</textarea>
                
            </div>

            
        </div>
    </div>
</div><br><br>

<div>
   
	<div>
		
			@if ($support->image_update1=="")
				
			@else
			<img src="{{url('images/'.$support->image_update1)}}"
			style="width:15%; height:15%;" onclick="openModalupdate(1);currentSlide(1)" class="hover-shadow cursor">
		  
			@endif
			@if ($support->image_update2=="")
				
			@else
			<img src="{{url('images/'.$support->image_update2)}}"
			style="width:15%; height:15%;" onclick="openModalupdate(2);currentSlide(2)" class="hover-shadow cursor">
			@endif
			@if ($support->image_update3=="")
				
			@else
			<img src="{{url('images/'.$support->image_update3)}}" 
			style="width:15%; height:15%;" onclick="openModalupdate(3);currentSlide(3)" class="hover-shadow cursor">	
			@endif
			@if ($support->image_update4=="")
				
			@else
			<img src="{{url('images/'.$support->image_update4)}}" 
			style="width:15%; height:15%;" onclick="openModalupdate(4);currentSlide(4)" class="hover-shadow cursor">
			@endif
			@if ($support->image_update5=="")
				
			@else
			<img src="{{url('images/'.$support->image_update5)}}" 
			style="width:15%; height:15%;" onclick="openModalupdate(5);currentSlide(5)" class="hover-shadow cursor">
			@endif
			@if ($support->image_update6=="")
				
			@else
				 
			<img src="{{url('images/'.$support->image_update6)}}" 
			style="width:15%; height:15%;" onclick="openModalupdate(6);currentSlide(6)" class="hover-shadow cursor">
			@endif
			 

		</div>
	
		<div id="myModalupdate1" class="modal">
			<span class="close cursor" onclick="closeModalupdate(1)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update1)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		<div id="myModalupdate2" class="modal">
			<span class="close cursor" onclick="closeModalupdate(2)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update2)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		<div id="myModalupdate3" class="modal">
			<span class="close cursor" onclick="closeModalupdate(3)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update3)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		<div id="myModalupdate4" class="modal">
			<span class="close cursor" onclick="closeModalupdate(4)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update4)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		<div id="myModalupdate5" class="modal">
			<span class="close cursor" onclick="closeModalupdate(5)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update5)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		<div id="myModalupdate6" class="modal">
			<span class="close cursor" onclick="closeModalupdate(6)">&times;</span>
			<div class="modal-content">
		  
			  <div class="mySlides2">
				<div class="numbertext"></div>
				<img src="{{url('images/'.$support->image_update6)}}"  style="width:100%; height:50%;">
			  </div>
			</div>
		</div>
		
	</div>


<div class="col d-none">
    <input type="text" name="up" value="{{$_SESSION["users"]}}" class="form-control" placeholder="รับค่าอัปดรต" />
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
			  <button type="button" class="btn btn-success" id="btn2">เพิ่มรายการสินค้า</button>
		  </div>
	  </div>
  </div>
  
  <div id="input2">	
	  <div class="row">
		  <div class="col-8">
			  <div class="custom-file">
				  <input type="file" name="img2">	
			  </div>
		  </div>
		  <div class="col-2">
			  <button type="button" class="btn btn-success" id="btn3">เพิ่มรายการสินค้า</button>
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
			  <button type="button" class="btn btn-success" id="btn4">เพิ่มรายการสินค้า</button>
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
			  <button type="button" class="btn btn-success" id="btn5">เพิ่มรายการสินค้า</button>
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
			  <button type="button" class="btn btn-success" id="btn6">เพิ่มรายการสินค้า</button>
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
			  <button type="button" class="btn btn-success" id="btn2">เพิ่มรายการสินค้า</button>
		  </div>
	  </div>
  </div>
	
</div><br><br>

<!-- จบส่วนรับคำร้อง -->

	<br>
	<div>
		<a href="{{ url('/') }}/support" class="text-white">
			<button type="button" class="btn btn-warning">
				<i class="fas fa-arrow-left"></i>&nbsp; กลับ
			</button>
		</a>
		&nbsp;&nbsp;&nbsp;
		<button type="submit"  class="btn btn-primary" class="pull-right">
			<i class="far fa-save"></i>&nbsp;อัปเดต
		</button><br><br>
	</div>
</form>
<br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
		function openModal(id) {
	  document.getElementById("myModal"+id).style.display = "block";
	}
	
	function closeModal(id) {
	  document.getElementById("myModal"+id).style.display = "none";
	}
	function openModalupdate(id) {
	  document.getElementById("myModalupdate"+id).style.display = "block";
	}
	
	function closeModalupdate(id) {
	  document.getElementById("myModalupdate"+id).style.display = "none";
	}
	
	var slideIndex = 1;
	showSlides(slideIndex);
	
	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}
	
	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}
	
	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  var captionText = document.getElementById("caption");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	  captionText.innerHTML = dots[slideIndex-1].alt;
	}
	</script>
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
@endsection


