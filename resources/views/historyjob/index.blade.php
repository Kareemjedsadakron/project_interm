@extends('layouts.theme')

@section('content')
<h1>ประวัติการลบใบสั่งงาน</h1><br>
<?php
session_start();
?>

<div class="col-md-6">
    <form action="{{ url('/') }}/historyjob" method="GET">
        <input name="q" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-success">
            <i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;ค้นหา
        </button>
    </form>
</div><br>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">วันที่สั่งงาน</th>
            <th scope="col">ใบสั่งงาน</th>
            <th scope="col">สถานะ</th>
            <th scope="col">ลบโดย</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($Order as $itemOrder)
        @if ($itemOrder->delete =="delete")
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$itemOrder->new_order }}</td>
            <td>{{$itemOrder->order_number}}</td>
            <td>
               
                    <a >{{ isset($itemOrder->status) ?  $itemOrder->status : 'ยังไม่เสร็จ'}}
               
            </td>
            <td><button type="button" class="btn btn-">
                    <a class="text-drek">{{ $itemOrder->user_delete }} </button></td>
            <td>

                <a href="{{ url('/') }}/order/{{ $itemOrder->id }}" class="text-white">
                    <button type="button" class="btn btn-primary">
                        <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
                    </button>
                </a>


            </td>
        </tr>    
        @else
            
        @endif
       
       
        
        @empty
        <td colspan="10">
            <center>
                <h4><i class="fas fa-search"></i>&nbsp;&nbsp;ไม่พบข้อมูล</h4>
            </center>
        </td>
        @endforelse
    </tbody>
</table>
{{ $Order->links() }}

@endsection