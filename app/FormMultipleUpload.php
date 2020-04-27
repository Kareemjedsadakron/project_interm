<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FormMultipleUpload extends Model
{
    protected $table = 'form_multiple_upload';
    //ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["filename","support_id","support_number"];    
    //Primary Key
     protected $primaryKey = "id";
     public $timestamps = false;

     public static function getItem($support_id){
        //SIMILAR TO, BUT DIFFERENT A LITTLE BIT
        //return self::where('id',$id)->get($id);
        return self::findOrFail($support_id);
}
