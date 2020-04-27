<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Historyjob extends Model
{
     //ชื่อตารางในฐานข้อมูล
protected $table = "historyjob";
//ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
protected $fillable = ["new_order","delivery","company","cell","company_sticker","warranty_sticker","list_product",
                       "number","annotation","worker","check_job","status","order_number","assign"];    
//Primary Key
     protected $primaryKey = "id";

public static function getItem($id){
    //SIMILAR TO, BUT DIFFERENT A LITTLE BIT
    //return self::where('id',$id)->get($id);
    return self::findOrFail($id);
}
public $timestamps = false;

public static function insert($new_order, $delivery, $company, $cell, $company_sticker, $warranty_sticker, 
     $list_product, $number,$annotation,$worker,$check_job,$status,$order_number,$assign)
     {
       $sql = "INSERT INTO historyjob (new_order, delivery, company, cell, company_sticker, warranty_sticker, list_product,number,
       annotation,worker,check_job,status,order_number,assign)
       VALUES ( '{$new_order}','{$delivery}','{$company}','{$cell}','{$company_sticker}','{$warranty_sticker}','{$list_product}',
       {$number},'{$annotation}','{$worker}','{$check_job}','{$status}',{$order_number},),{$assign},)
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }
public static function new()
     {
       $sql = "SELECT * FROM mypj.historyjob  
       ORDER BY id  DESC LIMIT 1";
       return DB::select($sql , []);
     }

     public function orderdetail()
     {
         return $this->hasMany('App\orderdetail','order_number');
     }

}
