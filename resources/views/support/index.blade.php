@extends('layouts.theme')

@section('content')
<h1>การซัพพอร์ตลูกค้า </h1>
<?php
session_start();
?>


<div class="col-md-6">
    <form action="{{ url('/support/') }}" method="GET">
        <input name="q" placeholder="" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-success">
            <i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;ค้นหา
        </button>
    </form>
</div><br>

<div>
	<a href="{{ url('/') }}/support/create"> 
	<button type="button" class="btn btn-success "> 
		<i class="fas fa-plus"></i>&nbsp;เพิ่มซัพพอร์ตลูกค้า
	</button> 
	</a>
</div><br>

<div class="table-responsive">
	<table class="table">
	  <thead class="thead-light">
		<tr>
		  <th scope="col"><h6>ลำดับ</h6></th>
		  <th scope="col"><h6>วันที่</h6></th>
		  <th scope="col"><h6>เลขซัพพอร์ตลูกค้า</h6></th>
		  <th scope="col"><h6>บริษัทลูกค้า</h6></th>
		  <th scope="col"><h6>แผนก</h6></th>
		  <th scope="col"><h6>รับคำร้อง</h6></th>
		  <th scope="col"><h6>วันที่ที่เสร็จ</h6></th>
		  <th scope="col"></th>
		</tr>
	  </thead>
	  <tbody>
		@forelse ($support as $itemsupport)
		 @if ($itemsupport->delete=="delete")
			 
		 @else
		 <th scope="row"><h6>{{ $loop->iteration }}</h6></th>
		 <td>
		   <?php 
		   //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
		  $request_split =explode("-",$itemsupport->request); 
		   ?>
	   
	   <h6>{{$request_split[2]}}-{{$request_split[1]}}-{{$request_split[0]}}</h6> 
		
		 </td>
		 <td><h6>{{ $itemsupport->support_number }}</h6></td>
		 <td><h6>{{ $itemsupport->company }}</h6></td>
		 <td><h6>{{ $itemsupport->responsible }}</h6> </td>
		 <td>
			 @if ($itemsupport->worker_support=='')

			 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#receive_complaints{{ $itemsupport->id  }}">
			   <h6>รับคำร้อง</h6>
		   </button>

		   <!-- Modal รับบงาน-->
		   <form action="{{ url('/') }}/support/{{ $itemsupport->id }}/editupdate">

			   
			   <div class="modal fade" id="receive_complaints{{ $itemsupport->id  }}" tabindex="-1" role="dialog"
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
							   ต้องการรับคำร้องเรียนของบริษัท :&nbsp;{{ $itemsupport->company }} นี้หรือไม่ ?
							   <input type="text" name="worker_support" class="form-control d-none" id="exampleInputEmail1"
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
		 </td>

		 <td>
			
		   {{ isset($itemsupport->completion) ? $itemsupport->completion : 'ไม่พบข้อมูล' }}
		 </td>
		 <td>
		   <a href="{{ url('/') }}/support/{{ $itemsupport->id }}" class="text-white">
			   <button type="button" class="btn btn-primary btn-sm">
				   <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
			   </button>
		   </a>
		   
			 <!-- Button trigger modal -->
			 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
			 data-target="#exampleModal{{ $itemsupport->id }}">
			 <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
		 </button>

		 <!-- Modal -->
		 <div class="modal fade" id="exampleModal{{ $itemsupport->id }}" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel" aria-hidden="true">
			 <div class="modal-dialog" role="document">
				 <div class="modal-content">
					 <div class="modal-header">
						 <h5 class="modal-title" id="exampleModalLabel{{ $itemsupport->id }}">การลบ</h5>
						 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
					 </div>
					 <div class="modal-body">
						 คุณต้องการลบใบสั่งงาน:&nbsp;{{ $itemsupport->support_number }}
						 ของบริษัท:&nbsp;{{ $itemsupport->company }} &nbsp;ใช่ไหม?
					 </div>
					 <div class="modal-footer">
						 <form action="{{ url('/') }}/support/delete/{{ $itemsupport->id  }}" method="POST">

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
		   

	   <a href="{{ url('/') }}/support/{{ $itemsupport->id }}/edit" class="text-white"> 
		   <button type="button" class="btn btn-warning btn-sm">
			   <i class="far fa-edit"></i>&nbsp; แก้ไข
		   </button>
	   </a>
		   <!-- Button trigger modal
		   <form
		   action="{{ url('/') }}/support/{{ $itemsupport->id }}"
		   method="POST"
		   onsubmit="validate();"
		   style="display:inline" >
   
		   {{ csrf_field() }}
		   {{ method_field('DELETE') }}
	   <a><button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> ลบ</button></a>
	   </form>
		-->
		   
				 </div>
			   </div>
			 </div>
		   </div>
		 </td>
				 
			 @else<!-- ถ้ารับบงาน ปุ่มแก้ไขจะหายไป --> 	
			 {{ $itemsupport->worker_support}}
		 </td>

		 <td>
		   <?php 
					   //เก็บค่าวันที่ปัจจุจัน เช่น 17/01/20
		   if ($itemsupport->completion) {
			   $completion_splits = explode(" ",$itemsupport->completion);
					   //split ข้อมูลที่เป็นข้อมูล แยกออกมาเป็น อาเร โดยใช้ "/"
					   $aaa=$completion_splits[0];
					   $time =explode("-", $aaa); 
		   }
	   
	   
			?>
		   {{$time[2]}}-{{$time[1]}}-{{$time[0]}} {{$completion_splits[1]}}
			
		 </td>
		 <td>
		   <a href="{{ url('/') }}/support/{{ $itemsupport->id }}" class="text-white">
			   <button type="button" class="btn btn-primary btn-sm">
				   <i class="far fa-eye"></i>&nbsp;&nbsp;&nbsp;ดู
			   </button>
		   </a>
		   
			 <!-- Button trigger modal -->
			 <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
			 data-target="#exampleModal{{ $itemsupport->id }}">
			 <i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ
		 </button>

		 <!-- Modal -->
		 <div class="modal fade" id="exampleModal{{ $itemsupport->id }}" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel" aria-hidden="true">
			 <div class="modal-dialog" role="document">
				 <div class="modal-content">
					 <div class="modal-header">
						 <h5 class="modal-title" id="exampleModalLabel{{ $itemsupport->id }}">การลบ</h5>
						 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
					 </div>
					 <div class="modal-body">
					   คุณต้องการลบใบสั่งงาน:&nbsp;{{ $itemsupport->support_number }}
					   ของบริษัท:&nbsp;{{ $itemsupport->company }} &nbsp;ใช่ไหม?
					 </div>
					 <div class="modal-footer">
						 <form action="{{ url('/') }}/support/delete/{{ $itemsupport->id  }}" method="POST">

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
		   
		   
				 </div>
			   </div>
			 </div>
		   </div>
		 </td>
			 @endif

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
	{{ $support->links() }}
	<script>
		function validate(){
			//SUBMIT
			var wantToDelete= confirm('คุณแน่ใจว่าต้องการลบการซัพพอร์ต ');
			if(wantToDelete){
				this.submit();
			}
		}
	</script>
	

@endsection



