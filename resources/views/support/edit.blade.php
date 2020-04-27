@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<center>
<h1>แก้ไขการซัพพอร์ตลูกค้า </h1><br>
</center>
<form 
action="{{ url('/') }}/support/{{ $support->id }}" 
method="POST" enctype="multipart/form-data">

	{{ csrf_field() }}
	{{ method_field('PUT') }}

	@include("support/form")

	<br>
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
		<br>
		{{-- โค้ดอัพรูป --}}
	<h4>เพิ่มรูปเพิ่มเติม</h4>
	<div class="container">
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
	<br>
	<?php 
	$z=6;
	 if($support->img1){
		
		$z=5;
	 }
	if($support->img2){
		
		$z=4;
	 }
	 if($support->img3){
		
		$z=3;
	 } 
	 if($support->img4){
		
		$z=2;
	 }
	 if($support->img5){
	
		$z=1;
	 }
	 $c =6-$z;
	 
	 for ($x = 1; $x <= $z; $x++) {
		$c++;
		 ?>
		 <div id="input{{$c}}">	
			<div class="row">
				<div class="col-8">
					<div class="custom-file">
						<input type="file" name="img{{$c}}" >	
					</div>
				</div>
				<div class="col-2">
					
				</div>
			</div>
		</div>
    <?php
	}
	?>
	</div>

	

	
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function openModal() {
	  document.getElementById("myModal"+id).style.display = "block";
	}
	
	
	function closeModal(id) {
	  document.getElementById("myModal"+id).style.display = "none";
	}
	</script>
	<script>
		$(document).ready(function () {
	
       
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

