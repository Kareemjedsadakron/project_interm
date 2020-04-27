@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<div><a href="{{ url('pdf/ ').$historyjob->id }}" class="text-white">
    <button type="button" class="btn btn-primary">
        <i class="fas fa-print"></i>&nbsp; พิมพ์
    </button>
</a></div><br> 
<h4>เลขที่ใบสั่งงาน : {{ $historyjob->order_number }} </h4>
<center>
    <h1>ใบสั่งงาน</h1><br>
</center>


<div class="form-group row">
    <strong class=" col-form-label">&nbsp;วันที่สั่งงาน :</strong>
    <div class="col-md-5">
        <span class="form-control">{{ $historyjob->new_order }} </span>
    </div>
    <strong class=" col-form-label">วันที่ส่งของ : </strong>
    <div class="col-md-5">
        <span class="form-control">{{ $historyjob->delivery }} </span>
    </div>
</div><br>

<div class="form-group row">
    <strong class=" col-form-label">บริษัทลูกค้า :</strong>
    <div class="col-md-5">
        <span class="form-control">{{ $historyjob->company }} </span>
    </div>
    <strong class=" col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อเซลล์ :</strong>
    <div class="col-md-5">
        <span class="form-control">{{ $historyjob->cell }} </span>
    </div>
</div><br>

<div>
    <strong>ติดสติกเกอร์บริษัท :&nbsp;</strong>

    <span>{{ $historyjob->company_sticker }} </span>
</div><br>

<div>
    <strong>ติดสติกเกอร์รับประกัน :&nbsp; </strong>

    <span>{{ $historyjob->warranty_sticker }} </span>
</div><br><br>




<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">รายการสินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">หมายเหตุ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order_detail as $order_details )
        <tr>

            <th scope="row">{{ $loop->iteration }}</th>
            <td>{!! nl2br(e($order_details->product_name )) !!}</td>
            <td>{{ $order_details->Qty }} </td>
            <td>{!! nl2br(e($order_details->remark )) !!}</td>
        </tr>
        @endforeach

    </tbody>
</table><br><br><br>

<div class="form-row">

    <strong class=" col-form-label">ผู้สั่งงาน : </strong>
    <div class="col">
        <span class="form-control">{{ $historyjob->assign }} </span>
    </div>

    <strong class=" col-form-label">ผู้รับบงาน : </strong>
    <div class="col">
        <span class="form-control">{{ $historyjob->worker }} </span>
    </div>

    <strong class=" col-form-label">ตรวจงาน : </strong>
    <div class="col">
        <span class="form-control">{{ $historyjob->check_job }} </span>
    </div>
</div><br><br><br>



<div>
    <a href="{{ url('/') }}/historyjob" class="text-white">
        <button type="button" class="btn btn-warning">
            <i class="fas fa-arrow-left"></i>&nbsp; กลับ
        </button>
    </a>
</div><br><br>

@endsection