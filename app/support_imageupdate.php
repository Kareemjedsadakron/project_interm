<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class support_imageupdate extends Model
{
    //ชื่อตารางในฐานข้อมูล
    protected $table = "support_imageupdate";
    //ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["img","support_id"];    
    //Primary Key
     protected $primaryKey = "id";
     public $timestamps = false;


   
}
