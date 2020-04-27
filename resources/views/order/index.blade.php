@extends('layouts.theme')

@section('content')
<h1>ใบสั่งงาน</h1>

<?php
session_start();
?>
@forelse ($users as $users)
<?php
$_SESSION["users"] = $users->id_user;
$_SESSION["status"] = $users->position;
$_SESSION["usename"] = $users->user;
$_SESSION["name"] = $users->name_user;
?>
@empty
No data
@endforelse


<div class="col-md-6">
    <form action="{{ url('/order/index') }}" method="GET">
        <input name="q" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-success">
            <i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;ค้นหา
        </button>
    </form>
</div><br>
<div>
	<a href="{{ url('/') }}/order/create"> 
	<button type="button" class="btn btn-success "> 
		<i class="fas fa-plus"></i>&nbsp;เพิ่มใบสั่งงานใหม่
	</button> 
	</a>
</div>
<br>



<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ลำดับ </th>
            <th scope="col">วันที่ </th>
            <th scope="col">เลขใบสั่งงาน</th>
            <th scope="col">ผู้รับงาน</th>
            <th scope="col">สถานะ</th>
            <th scope="col">ผู้ตรวจงาน</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        @forelse ($order as $orders)

   @if ($orders->delete=="delete")
       
   @else
   <tr>
    <th scope="row">{{ $loop->iteration }}</th>
    <td>
        <?php 
        //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
       $new_order_split =explode("-",$orders->new_order); 
        ?>
    
        {{$new_order_split[2]}}-{{$new_order_split[1]}}-{{$new_order_split[0]}} 
     
    </td>
    <td>{{ $orders->order_number }}</td>
    <td>
        <!--ifรับงาน กด เปลี่ยน สถานะและตรวจงานไม่ได้-->@if ($orders->worker=='ไม่พบข้อมูล')

        <!--<a href="{{ url('/') }}/order/worker/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-info">
                รับงาน
            </button> -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#worker{{ $orders->id  }}">
            รับงาน
        </button>

        <!-- Modal รับบงาน-->
        <form action="{{ url('/') }}/order/worker/{{ $orders->id  }}" method="POST">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal fade" id="worker{{ $orders->id  }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-tit.le" id="exampleModalLabel">การรับงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            คุณต้องการ รับงานชิ้นนี้หรือไม่?
                            <input type="text" name="worker" class="form-control d-none" id="exampleInputEmail1"
                                value="{{$_SESSION["name"]}}" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ยืนยัน </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#status{{ $orders->id }}">
            ยังไม่พร้อม
        </button>

    </td>
    <td>
        <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#check_job{{ $orders->id }}">
            ตรวจงาน
        </button>
    </td>
    <td>
        <a href="{{ url('/') }}/order/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-primary">
                <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
            </button>
        </a>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal"
            data-target="#exampleModal{{ $orders->id }}">
            <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $orders->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $orders->id }}">การลบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        คุณต้องการลบ ใบสั่งงาน:&nbsp;{{ $orders->order_number }}
                        ของบริษัท:&nbsp;{{ $orders->company }} &nbsp;ใช่ไหม?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('/') }}/order/delete/{{ $orders->id  }}" method="POST">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <input type="text" name="delete" class="form-control d-none "
                                id="exampleInputEmail1" value="delete"
                                aria-describedby="emailHelp">

                            <input type="text" name="user_delete" class="form-control d-none "
                                id="exampleInputEmail1" value="{{$_SESSION["name"]}}"
                                aria-describedby="emailHelp">

                            <button type="submit" class="btn btn-primary">&nbsp; ยืนยัน</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </div>
            </div>
        </div>


        <a href="{{ url('/') }}/order/{{ $orders->id }}/edit" class="text-white">
            <button type="button" class="btn btn-warning">
                <i class="far fa-edit"></i>&nbsp; แก้ไข
            </button>
        </a>
    </td>


    <!--elseรับงาน กดสถานะได้ แต่ยังกดตรวจงานไม่ได้-->@else
    {{$orders->worker}}


    <td>
        <!--ifสถานะ -->@if ($orders->status=='')
        <!-- <a href="{{ url('/') }}/order/status/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-danger">
                ยังไม่พร้อม
            </button> 
        </a> -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#status{{ $orders->id }}">
            ยังไม่พร้อม
        </button>

        <form action="{{ url('/') }}/order/status/{{ $orders->id }}" method="POST">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal fade" id="status{{ $orders->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">สถานะของงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            คุณแน่ใจว่า ชิ้นงานเสร็จแล้ว ?
                            <input type="text" name="status" class="form-control d-none" id="exampleInputEmail1"
                                value="เสร็จแล้ว,{{$_SESSION["name"]}}" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ยืนยัน </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    <td>
        <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#check_job{{ $orders->id }}">
            ตรวจงาน
        </button>
    </td>
    <td>
        <a href="{{ url('/') }}/order/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-primary">
                <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
            </button>
        </a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal"
        data-target="#exampleModal{{ $orders->id }}">
        <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $orders->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $orders->id }}">การลบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    คุณต้องการลบ ใบสั่งงาน:&nbsp;{{ $orders->order_number }}
                    ของบริษัท:&nbsp;{{ $orders->company }} &nbsp;ใช่ไหม?
                </div>
                <div class="modal-footer">
                    <form action="{{ url('/') }}/order/delete/{{ $orders->id  }}" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="text" name="delete" class="form-control d-none "
                            id="exampleInputEmail1" value="delete"
                            aria-describedby="emailHelp">

                        <input type="text" name="user_delete" class="form-control d-none "
                            id="exampleInputEmail1" value="{{$_SESSION["name"]}}"
                            aria-describedby="emailHelp">

                        <button type="submit" class="btn btn-primary">&nbsp; ยืนยัน</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>

        <a href="{{ url('/') }}/order/{{ $orders->id }}/edit" class="text-white">
            <button type="button" class="btn btn-warning">
                <i class="far fa-edit"></i>&nbsp; แก้ไข
            </button>
        </a>
        
    </td>
    <!--else สถานะ กดตรวจงานได้-->@else
    {{$orders->status}}

    <td>
        @if ($orders->check_job=='ไม่พบข้อมูล')
        <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#check_job{{ $orders->id }}">
            ตรวจงาน
        </button>
        <!--
          <a href="{{ url('/') }}/order/check_job/{{ $orders->id }}" class="text-white">
              <button type="button" class="btn btn-info">
                  ตรวจงาน
              </button> 
          </a> -->

        <!-- Modal -->
        <form action="{{ url('/') }}/order/check_job/{{ $orders->id }}" method="POST">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal fade" id="check_job{{ $orders->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="check_job{{ $orders->id }}">การตรวจงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            คุณตรวจงานเสร็จแล้วใช่ไหม?
                            <input type="text" name="check_job" class="form-control d-none "
                                id="exampleInputEmail1" value="{{$_SESSION["name"]}}"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ยืนยัน </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    <td>
        <a href="{{ url('/') }}/order/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-primary">
                <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
            </button>
        </a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal"
        data-target="#exampleModal{{ $orders->id }}">
        <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $orders->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $orders->id }}">การลบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    คุณต้องการลบ ใบสั่งงาน:&nbsp;{{ $orders->order_number }}
                    ของบริษัท:&nbsp;{{ $orders->company }} &nbsp;ใช่ไหม?
                </div>
                <div class="modal-footer">
                    <form action="{{ url('/') }}/order/delete/{{ $orders->id  }}" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="text" name="delete" class="form-control d-none "
                            id="exampleInputEmail1" value="delete"
                            aria-describedby="emailHelp">

                        <input type="text" name="user_delete" class="form-control d-none "
                            id="exampleInputEmail1" value="{{$_SESSION["name"]}}"
                            aria-describedby="emailHelp">

                        <button type="submit" class="btn btn-primary">&nbsp; ยืนยัน</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/') }}/order/{{ $orders->id }}/edit" class="text-white">
        <button type="button" class="btn btn-warning">
            <i class="far fa-edit"></i>&nbsp; แก้ไข
        </button>
    </a>
    </td>
    <!-- ปุ่มแก้ไขจะหายไป -->@else
    {{$orders->check_job}}



    <td>
        <a href="{{ url('/') }}/order/{{ $orders->id }}" class="text-white">
            <button type="button" class="btn btn-primary">
                <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
            </button>
        </a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal"
        data-target="#exampleModal{{ $orders->id }}">
        <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $orders->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $orders->id }}">การลบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    คุณต้องการลบ ใบสั่งงาน:&nbsp;{{ $orders->order_number }}
                    ของบริษัท:&nbsp;{{ $orders->company }} &nbsp;ใช่ไหม?
                </div>
                <div class="modal-footer">
                    <form action="{{ url('/') }}/order/delete/{{ $orders->id  }}" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="text" name="delete" class="form-control d-none "
                            id="exampleInputEmail1" value="delete"
                            aria-describedby="emailHelp">

                        <input type="text" name="user_delete" class="form-control d-none "
                            id="exampleInputEmail1" value="{{$_SESSION["name"]}}"
                            aria-describedby="emailHelp">

                        <button type="submit" class="btn btn-primary">&nbsp; ยืนยัน</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
    </td>
    @endif
    </td>
    <!--ปิดสถานะ -->@endif
    </td>
    @endif
    </td>
</tr>
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
{{ $order->links() }}
<div class="d-none">
<?php 
    
  echo "SESSION User  " . $_SESSION["users"] . ".<br>";
  echo "SESSION status  " . $_SESSION["status"] . ".<br>";
  echo "SESSION name  " . $_SESSION["name"] . ".<br>";
 
  ?>
</div>
@endsection