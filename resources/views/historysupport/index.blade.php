@extends('layouts.theme')

@section('content')
<h1>ประวัติการลบการซัพพอตลูกค้า</h1><br>
<?php
session_start();
?>

<div class="col-md-6">
    <form action="{{ url('/') }}/historysupport" method="GET">
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
            <th scope="col">วันที่รับคำร้อง</th>
            <th scope="col">เลขการซัพพอตลูกค้า</th>
            <th scope="col">บริษัท</th>
            <th scope="col">ลบโดย</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($support as $itemsupport)
        @if ($itemsupport->delete =="delete")
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$itemsupport->request }}</td>
            <td>{{$itemsupport->support_number}}</td>
            <td>
                {{$itemsupport->company}}
            </td>

            <td>
                <button type="button" class="btn btn-">
                    <a class="text-drek">{{ $itemsupport->user_delete }} </button>
            </td>

            <td>

                <a href="{{ url('/') }}/support/{{ $itemsupport->id }}" class="text-white">
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
{{ $support->links() }}

@endsection