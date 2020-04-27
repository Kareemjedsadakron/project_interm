<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class orderdetail extends Model
{
    //ชื่อตารางในฐานข้อมูล
    protected $table = "order_detail";
    //ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["product_name","Qty","remark","order_id","order_number"];    
    //Primary Key
     protected $primaryKey = "id";
     public $timestamps = false;


     public static function getItem($order_id){
        //SIMILAR TO, BUT DIFFERENT A LITTLE BIT
        //return self::where('id',$id)->get($id);
        return self::findOrFail($order_id);
    }
    
    public static function insert2($product_name2, $Qty2, $remark2, $order_id2, $order_number2)
     {
       $sql = "INSERT INTO order_detail (product_name, Qty, remark, order_id, order_number)
       VALUES ( '{$product_name2}','{$Qty2}','{$remark2}','{$order_id2}','{$order_number2}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }

     public static function insert3($product_name3, $Qty3, $remark3, $order_id3, $order_number3)
     {
       $sql = "INSERT INTO order_detail (product_name, Qty, remark, order_id, order_number)
       VALUES ( '{$product_name3}','{$Qty3}','{$remark3}','{$order_id3}','{$order_number3}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }

     public static function insert4($product_name4, $Qty4, $remark4, $order_id4, $order_number4)
     {
       $sql = "INSERT INTO order_detail (product_name, Qty, remark, order_id, order_number)
       VALUES ( '{$product_name4}','{$Qty4}','{$remark4}','{$order_id4}','{$order_number4}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }

     public static function insert5($product_name5, $Qty5, $remark5, $order_id5, $order_number5)
     {
       $sql = "INSERT INTO order_detail (product_name, Qty, remark, order_id, order_number)
       VALUES ( '{$product_name5}','{$Qty5}','{$remark5}','{$order_id5}','{$order_number5}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }
     public static function insert6($product_name6, $Qty6, $remark6, $order_id6, $order_number6)
     {
       $sql = "INSERT INTO order_detail (product_name, Qty, remark, order_id, order_number)
       VALUES ( '{$product_name6}','{$Qty6}','{$remark6}','{$order_id6}','{$order_number6}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }
}
