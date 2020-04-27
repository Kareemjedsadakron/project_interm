@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<div>
    <!--
    <a class="text-white">
        <button type="button" class="btn btn-primary" onclick="myFunction()">
            <i class="fas fa-print"></i>&nbsp; พิมพ์
        </button>
    </a>
    -->
    <a href="{{ url('pdf/ ').$order->id }}" class="text-white">
        <button type="button" class="btn btn-primary">
            <i class="far fa-file-pdf"></i>&nbsp; PDF
        </button>
    </a>
</div><br>

<h4>เลขที่ใบสั่งงาน : {{ $order->order_number }} </h4>
<center>
    <h1>ใบสั่งงาน</h1><br>
</center>


<div class="form-group row">
    <strong class=" col-form-label">&nbsp;วันที่สั่งงาน :</strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <span class="form-control"><?php 
            //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
           $new_order_split =explode("-",$order->new_order); 
            ?>
        
            {{$new_order_split[2]}}-{{$new_order_split[1]}}-{{$new_order_split[0]}} 
          </span>
    </div>
    <strong class=" col-form-label">วันที่ส่งของ :</strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <span class="form-control"><?php 
            //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
           $delivery_split =explode("-",$order->delivery); 
            ?>
        
            {{$delivery_split[2]}}-{{$delivery_split[1]}}-{{$delivery_split[0]}} 
             </span>
    </div>
</div><br>

<div class="form-group row">
    <strong class=" col-form-label">บริษัทลูกค้า :</strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <span class="form-control">{{ $order->company }} </span>
    </div>
    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;ชื่อเซลล์ :</strong>
    <div class="col-sm-12 col-md-3 col-lg-4">
        <span class="form-control">{{ $order->cell }} </span>
    </div>
</div><br>

<div>
    <strong>ติดสติกเกอร์บริษัท :&nbsp;</strong>

    <span>{{ $order->company_sticker }} </span>
</div><br>

<div>
    <strong>ติดสติกเกอร์รับประกัน :&nbsp; </strong>

    <span>{{ $order->warranty_sticker }} </span>
</div><br><br><br>



<div class="p-3 mb-2 bg-dark text-white">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="border: 2px solid black;" ><h5>#</h5></th>
            <th scope="col" style="border: 2px solid black;"><h5>รายการสินค้า</h5></th>
            <th scope="col" style="border: 2px solid black;"><h5>จำนวน</h5></th>
            <th scope="col" style="border: 2px solid black;"><h5>หมายเหตุ</h5></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderdetail as $orderdetail)
        <tr>
            <th scope="row"><div class="text-white">{{ $loop->iteration }}</div></th>
            <td><div class="text-white">{!! nl2br(e($orderdetail->product_name )) !!}</div></td>
            <td><div class="text-white">{{$orderdetail->Qty}}</div></td>
            <td><div class="text-white">{!! nl2br(e($orderdetail->remark )) !!}</div></td>

        </tr>
        @endforeach

    </tbody>
</table><br><br><br><br><br><br><br>
</div><br><br>
            
<div class="form-row">

    <strong class=" col-form-label">ผู้สั่งงาน : </strong>
    <div class="col-sm-8 col-md-2 col-lg-2">
        <span class="form-control">{{ $order->assign }} </span>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong class=" col-form-label">ผู้รับบงาน : </strong>
    <div class="col-sm-8 col-md-2 col-lg-2">
        <span class="form-control">{{ $order->worker }} </span>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong class=" col-form-label">ตรวจงาน : </strong>
    <div class="col-sm-8 col-md-2 col-lg-2">
        <span class="form-control">{{ $order->check_job }} </span>
    </div>
</div><br><br><br>



<div>
    <a href="{{ url('order/index') }}" class="text-white">
        <button type="button" class="btn btn-warning">
            <i class="fas fa-arrow-left"></i>&nbsp; กลับ
        </button>
    </a>
</div><br><br>

@endsection