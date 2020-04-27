<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ดาวโหลดเลขที่ใบสั่งงาน {{$Order->order_number}}</title>
	<style>
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: normal;
 src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: bold;
 src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
}
body{
	
	font-style: 20;
 font-family: "THSarabunNew";

}

th{
	
	border: 1px solid black;

}

	




</style>	
</head>
<body>

<smooth style="font-size: 20;">เลขใบสั่งงาน :&nbsp;&nbsp;{{$Order->order_number}}</smooth><br>

<center><strong style="font-size: 30;">ใบสั่งงาน</strong></center>  


<table     cellspacing="0" >
	<tr  >
		<td  height= "30"style="font-size: 20;">วันที่สั่งงาน :&nbsp;{{$Order->new_order}}</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td  height= "30"style="font-size: 20;">วันที่ส่งของ :&nbsp;{{$Order->delivery}}</td>
	</tr>

	<tr>
		<td  style="font-size: 20;">บริษัทลูกค้า :&nbsp;{{$Order->company}}</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td  style="font-size: 20;">ชื่อเซลล์ :&nbsp;{{$Order->cell}}</td>
	</tr>

	<tr>
		<td  style="font-size: 20;">ติดสติกเกอร์บริษัท :&nbsp;{{$Order->company_sticker}}</td>
	</tr>

	<tr>
		<td style="font-size: 20;">ติดสติกเกอร์รับประกัน :&nbsp;{{$Order->warranty_sticker}}</td>
	</tr>

</table>
<br><br>


<table    width="100%" border="0" >
	<td height= "450">
		
		
	
		<table style="border: 1px solid black;" width="100%"  cellspacing="0" >
			<tr  >
			
				<th    width="6%" height= "40" style="font-size: 20; "><center >#</center></th>
				<th   width="44%" height= "40"style="font-size: 20;"><center >รายการสินค้า</center></th>
				<th  width="6%" height= "40"style="font-size: 20;"><center >จำนวน</center></th>
				<th  width="44%" height= "40"style="font-size: 20;"><center >หมายเหตุ</center></th>
			
			</tr>
			<?php 

			$i = 0;
			
			?> 
			@foreach ($order_detail as $order_details)
			<tr >
				<?php 

				$i=$i+1;
				
				?> 
				<td width="6%" height= "30"style="font-size: 18; border-right: 1px solid black; border-bottom: 1px solid gainsboro;"><center> 	{{ $loop->iteration }}</center></td>
				<td width="44%" height= "30"style="font-size: 18; border-right: 1px solid black; border-bottom: 1px solid gainsboro;"><center >{!! nl2br(e($order_details->product_name)) !!}</center></td>
				<td width="6%" height= "30"style="font-size: 18; border-right: 1px solid black; border-bottom: 1px solid gainsboro;"><center> {{$order_details->Qty}}</center></td>
				<td  width="44%" height= "30"style="font-size: 18; border-right: 1px solid black; border-bottom: 1px solid gainsboro;"><center >{!! nl2br(e($order_details->remark)) !!}</center></td>
				
			</tr>
			
			@endforeach
			
			<?php 
			
			
			for ($x = 1; $x <= 10-$i; $x++) {
				?> 
			
			<tr >
			
			<td width="6%" height= "30"style="font-size: 18; border-right: 1px solid black;"></td>
			<td width="6%" height= "30"style="font-size: 18;border-right: 1px solid black;"></td>
			<td width="6%" height= "30"style="font-size: 18;border-right: 1px solid black;"></td>
			<td width="6%" height= "30"style="font-size: 18;border-right: 1px solid black;"></td>
			
		</tr>
		<?php  
			}
			?>  
		</table>
		
	</td>
			</td>
	</table>
	

<br>

<smooth style="font-size: 20;">ผู้สั่งงาน :&nbsp;{{$Order->assign}}</smooth>
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
<smooth style="font-size: 20;">ผู้รับงาน :&nbsp;{{$Order->worker}}</smooth>
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
<smooth style="font-size: 20;">ผู้ตรวจงาน :&nbsp;{{$Order->check_job}}</smooth>


</body>

</html>