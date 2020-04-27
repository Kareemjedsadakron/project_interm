<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class support_image extends Model
{
    //ชื่อตารางในฐานข้อมูล
    protected $table = "support_image";
    //ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["img","support_id"];    
    //Primary Key
     protected $primaryKey = "id";
     public $timestamps = false;

     public static function insert1($img,$support_id)
     {
       $sql = "INSERT INTO support_image (img,support_id)
       VALUES ( '{$img}','{$support_id}')
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }
     
}
