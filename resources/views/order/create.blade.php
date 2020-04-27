@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<center>
    <h1>เพิ่มใบสั่งงานใหม่</h1>
</center><br>
<?php $today = date("d/m/y"); //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
            $today_split = explode('/',$today); //split ข้อมูลที่เป็นข้อมูล แยกออกมาเป็น อาเร โดยใช้ "/"
            
     ?>
<form action="{{ url('/') }}/order" method="POST" id="form1">

    {{ csrf_field() }}
    {{ method_field('POST') }}

    <div class="form-row d-none">
        <strong class=" col-form-label">เลขใบสั่งงาน : &nbsp;&nbsp;</strong>
        <div class="col-sm-12 col-md-3 col-lg-4 ">
            <input type="text" name="order_number" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
            $str = $orderNew->id+1;    
            echo str_pad($str,4,"0",STR_PAD_LEFT);
            ?> " class="form-control" placeholder="เลขใบสั่งงาน" />
        </div>
    </div><br>
    
    <div class="form-row">
        <strong class=" col-form-label">&nbsp;วันที่สั่งงาน :</strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="date" name="new_order" value="{{ isset($order->new_order) ?  $order->new_order : '' }}"
                class="form-control" placeholder="new_order here..." required />
        </div>



        <strong class=" col-form-label">วันที่ส่งของ : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="date" name="delivery" value="{{ isset($order->delivery) ?  $order->delivery : '' }}"
                class="form-control" placeholder="delivery here..." required />
        </div>
    </div><br>

    <div class="form-row">

        <strong class=" col-form-label">บริษัทลูกค้า : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="company" id="company" value="{{ isset($order->company) ?  $order->company : '' }}"
                class="form-control" placeholder="บริษัทลูกค้า" required />
        </div>

        <strong class=" col-form-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อเซลล์ : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="cell" value="{{ isset($order->cell) ?  $order->cell : '' }}" class="form-control"
                placeholder="ชื่อเซลล์" required />
        </div>
    </div><br>

    <div class="row">
        <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ติดสติกเกอร์บริษัท : </strong>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="company_sticker" value="ติดสติกเกอร์" checked>&nbsp;&nbsp;
        <label class="form-check-label" for="inlineRadio3">
            ติดสติกเกอร์
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        <input type="radio" name="company_sticker" value="ไม่ติดสติกเกอร์">&nbsp;&nbsp;
        <label class="form-check-label" for="inlineRadio4">
            ไม่ติดสติกเกอร์
        </label>


    </div><br>

    <div class="row">
        <strong>ติดสติกเกอร์รับประกัน :&nbsp;&nbsp; &nbsp; </strong>

        <input type="radio" name="warranty_sticker" value="ติดสติกเกอร์" checked>&nbsp;&nbsp;
        <label class="form-check-label" for="inlineRadio3">
            ติดสติกเกอร์
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="warranty_sticker" value="ไม่ติดสติกเกอร์">&nbsp;&nbsp;
        <label class="form-check-label" for="inlineRadio4">
            ไม่ติดสติกเกอร์
        </label>

    </div><br>

    <div class="form-row d-none">
        <strong class=" col-form-label">ผู้สั่งงาน : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="assign" value="{{$_SESSION["name"]}}"> {{$_SESSION["name"]}}" />
        </div>

        <strong class=" col-form-label">ผู้รับบงาน : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="worker" value="{{ isset($order->worker) ?  $order->worker : 'ไม่พบข้อมูล' }}"
                class="form-control" />
        </div>

        <strong class=" col-form-label">ตรวจงาน : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="check_job"
                value="{{ isset($order->check_job) ?  $order->check_job : 'ไม่พบข้อมูล' }}" class="form-control" />
        </div>

        <strong class=" col-form-label">สถานะ : </strong>
        <div class="col-sm-12 col-md-3 col-lg-4">
            <input type="text" name="status" value="{{ isset($order->status) ?  $order->status : '' }}"
                class="form-control" />
        </div>
    </div><br><br>

    <table>
        <tr>

        </tr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">รายการสินค้า</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">หมายเหตุ</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                
                <tr id="input1">
                    <td><textarea input type="text" name="product_name"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า" required></textarea></td>

                    <td><input type="number" name="Qty" value="{{ isset($order->number) ?  $order->number : '' }}"
                            class="form-control" placeholder="จำนวน" required /></td>
                    <td>
                        <textarea input type="text" name="remark"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ" required></textarea>
                    </td>

                    <div class="d-none">
                        <input type="text" name="order_id" value="{{$orderNew->id+1}}"
                            class="form-control" placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>
                    <td>
                        <button type="button" class="btn btn-success" id="btn2">เพิ่มรายการสินค้า</button>
                    </td>


                </tr>

                <tr id="input2">
                    <td><textarea input type="text" name="product_name2" id="product_name2"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า"></textarea></td>
                    <td><input type="number" name="Qty2" id="Qty2"
                            value="{{ isset($order->number) ?  $order->number : '' }}" class="form-control"
                            placeholder="จำนวน" /></td>
                    <td><textarea input type="text" id="remark2" name="remark2"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ"></textarea></td>

                    <div class="d-none">
                        <input type="text" name="order_id2" id="order_id2" value="{{$orderNew->id+1}}"
                            class="form-control" placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number2" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>
                    <td>
                        <button type="button" class="btn btn-success" id="btn3">เพิ่มรายการสินค้า</button>
                        <button type="button" class="btn btn-danger" id="close2">ลบรายการ</button>
                    </td>


                </tr>
                <tr id="input3">
                    <td><textarea input type="text" name="product_name3" id="product_name3"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า"></textarea></td>

                    <td><input type="number" name="Qty3" id="Qty3"
                            value="{{ isset($order->number) ?  $order->number : '' }}" class="form-control"
                            placeholder="จำนวน" /></td>
                    <td><textarea input type="text" name="remark3" id="remark3"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ"></textarea></td>

                     <div class="d-none">
                        <input type="text" name="order_id3" id="order_id3" value="{{$orderNew->id+1}}"
                            class="form-control" placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number3" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>
                    <td>
                        <button type="button" class="btn btn-success" id="btn4">เพิ่มรายการสินค้า</button>
                        <button type="button" class="btn btn-danger" id="close3">ลบรายการ</button>
                    </td>
                </tr>
                <tr id="input4">
                    <td><textarea input type="text" name="product_name4" id="product_name4"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า"></textarea></td>
                    <td><input type="number" name="Qty4" id="Qty4"
                            value="{{ isset($order->number) ?  $order->number : '' }}" class="form-control"
                            placeholder="จำนวน" /></td>
                    <td><textarea input type="text" name="remark4" id="remark4"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ"></textarea></td>

                    <div class="d-none">
                        <input type="text" name="order_id4" id="order_id4" value="{{$orderNew->id+1}}"
                            class="form-control" placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number4" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>

                    <td>
                        <button type="button" class="btn btn-success" id="btn5">เพิ่มรายการสินค้า</button>
                        <button type="button" class="btn btn-danger" id="close4">ลบรายการ</button>
                    </td>
                </tr>
                <tr id="input5">
                    <td><textarea input type="text" name="product_name5" id="product_name5"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า"></textarea></td>

                    <td><input type="number" name="Qty5" id="Qty5"
                            value="{{ isset($order->number) ?  $order->number : '' }}" class="form-control"
                            placeholder="จำนวน" /></td>

                    <td><textarea input type="text" name="remark5" id="remark5"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ"></textarea></td>

                    <div class="d-none">
                        <input type="text" name="order_id5" id="order_id5" value="{{$orderNew->id+1}}"
                            class="form-control" placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number5" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>

                    <td>
                        <button type="button" class="btn btn-success" id="btn6">เพิ่มรายการสินค้า</button>
                        <button type="button" class="btn btn-danger" id="close5">ลบรายการ</button>
                    </td>
                </tr>
                <tr id="input6">
                    <td><textarea input type="text" name="product_name6" id="product_name6"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า"></textarea></td>
                    <td><input type="number" name="Qty6" id="Qty6"
                            value="{{ isset($order->number) ?  $order->number : '' }}" class="form-control"
                            placeholder="จำนวน" /></td>
                    <td><textarea input type="text" name="remark6" id="remark6"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ"></textarea></td>

                    <div class="d-none">
                        <input type="text" name="order_id6" value="{{$orderNew->id+1}}" class="form-control"
                            placeholder="เลขใบสั่งงาน">
                        <input type="text" name="order_number6" id="order_id6" value="WOR{{$today_split [0]}}{{$today_split [1]}}{{$today_split [2]}}-<?php 
                            $str = $orderNew->id+1;    
                            echo str_pad($str,4,"0",STR_PAD_LEFT);
                            ?> " class="form-control " placeholder="เลขใบสั่งงาน" /> </div>

                    <td>
                       
                        <button type="button" class="btn btn-danger" id="close6">ลบรายการ</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </table>

    <div><h5>***ในกรณีไม่ใส่จำนวน จะต้องเป็น 0</h5></div><br>
    <button type="submit" form="form1" class="btn btn-primary" id="sava">
        <i class="far fa-save"></i>&nbsp; บันทึก
    </button>

    <a href="{{ url('order/index') }}" class="text-white">
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


@endsection