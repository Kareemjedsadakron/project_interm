@extends('layouts.theme')

@section('content')
<?php
session_start();
?>
<center>
    <h1>แก้ไขใบสั่งงาน </h1><br>
</center>


<form action="{{ url('/') }}/order/{{ $order->id }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @include("order/form")


    <div class="p-3 mb-2 bg-dark text-white"><center>ส่วนของรายการสินค้า</center></div><br>
    <!-- Button trigger modal -->
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
    &nbsp;&nbsp;&nbsp; 
   <button type="button" class="btn btn-success" data-toggle="modal"
        data-target="#exampleModalCenter">
        <i class="fas fa-plus"></i>&nbsp;เพิ่มใบสั่งงาน
    </button><br><br>


</form>

<table class="table">
    <thead >
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">รายการสินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">หมายเหตุ</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderdetail as $orderdetail)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{!! nl2br(e($orderdetail->product_name)) !!}</td>
            <td>{{$orderdetail->Qty}}</td>
            <td> {!! nl2br(e($orderdetail->remark)) !!}</td>
            <td><button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#exampleModalCenter1{{ $orderdetail->id }}">
                    <i class="far fa-edit"></i>&nbsp; แก้ไข
                </button>
                <a href="javascript:void(0)" onclick="onDelete( {{$orderdetail->id}} )"
                    class="btn btn-danger btn-icon-split btn-">
                    <span class="icon text-white-50">
                        <i class="far fa-trash-alt"></i>
                    </span>
                    <span class="text">นำข้อมูลออก</span>
                </a>

                <form action="{{ url('/') }}/orderdetail/{{ $orderdetail->id }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter1{{ $orderdetail->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขรายการสินค้า</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-sm-12 col-md-3 col-lg-4">
                                        <strong>รายการสินค้า : </strong><br><br>
                                        <input type="text" name="product_name"
                                            value="{{ isset($orderdetail->product_name) ?  $orderdetail->product_name : '' }}"
                                            class="form-control" placeholder="รายการสินค้า">

                                    </div><br>
                                    <div class="col-sm-12 col-md-3 col-lg-4">
                                        <strong>จำนวน : </strong><br><br>
                                        <input type="number" name="Qty"
                                            value="{{ isset($orderdetail->Qty) ?  $orderdetail->Qty : '' }}"
                                            class="form-control" placeholder="จำนวน" />
                                    </div><br>
                                    <div class="col-sm-12 col-md-3 col-lg-4">
                                        <strong>หมายเหตุ : </strong><br><br>
                                        <input type="text" name="remark"
                                            value="{{ isset($orderdetail->remark) ?  $orderdetail->remark : '' }}"
                                            class="form-control" placeholder="หมายเหตุ">

                                    </div>
                                    <div class="col d-none">
                                        <strong>order_id : </strong><br><br>

                                        <input type="text" name="order_id"
                                            value="{{ isset($order->id) ?  $order->id : '' }}" class="form-control"
                                            placeholder="">

                                        <input type="text" name="order_number"
                                            value="{{ isset($order->order_number) ?  $order->order_number : '' }}"
                                            class="form-control" placeholder="เลขใบสั่งงาน" />

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"
                                        formaction="{{ url('/') }}/orderdetail/{{ $orderdetail->id }}"><i
                                            class="far fa-save"></i>&nbsp;บันทึก</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">ยกเลิก</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
    


<form action="{{ url('/') }}/orderdetail" method="POST">

    {{ csrf_field() }}
    {{ method_field('POST') }}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายการสินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <strong>รายการสินค้า : </strong><br><br>
                        <textarea input type="text" name="product_name"
                            value="{{ isset($order->list_product) ?  $order->list_product : '' }}" class="form-control"
                            placeholder="รายการสินค้า" required></textarea>

                    </div><br>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <strong>จำนวน : </strong><br><br>
                        <input type="number" name="Qty" value="{{ isset($order->number) ?  $order->number : '0' }}"
                            class="form-control" placeholder="จำนวน" required>
                    </div><br>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <strong>หมายเหตุ : </strong><br><br>
                        <textarea input type="text" name="remark"
                            value="{{ isset($order->annotation) ?  $order->annotation : '' }}" class="form-control"
                            placeholder="หมายเหตุ" required></textarea>

                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-4 d-none">
                        <strong>order_id : </strong><br><br>

                        <input type="text" name="order_id" value="{{ isset($order->id) ?  $order->id : '' }}"
                            class="form-control" placeholder="">

                        <input type="text" name="order_number"
                            value="{{ isset($order->order_number) ?  $order->order_number : '' }}" class="form-control"
                            placeholder="เลขใบสั่งงาน" required>

                    </div>
                </div><br>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
</form>
</div>

<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('order/index') }}" class="text-white">
        <button type="button" class="btn btn-warning">
            <i class="fas fa-arrow-left"></i>&nbsp; กลับ
        </button>
    </a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ url('/') }}/order/{{ $order->id }}" class="text-white">
    <button type="button" class="btn btn-primary">
        <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
    </button>
</a>
</div>
<br>
</form>




<div style="display:none;">
    <form action="#" method="POST" id="form_delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">Delete</button>
    </form>
    <script>
        function onDelete(id) {
            //--THIS FUNCTION IS USED FOR SUBMIT FORM BY script--//
            //GET FORM BY ID
            var form = document.getElementById("form_delete");
            //CHANGE ACTION TO SPECIFY ID
            form.action = "{{ url('/') }}/orderdetail/" + id;
            //SUBMIT
            var want_to_delete = confirm('ต้องการลบข้อมูลหรือไม่');
            if (want_to_delete) {
                form.submit();
            }
        }
    </script>
</div>


@endsection

