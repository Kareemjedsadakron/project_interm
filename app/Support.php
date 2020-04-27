<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Support extends Model
{
    //ชื่อตารางในฐานข้อมูล
    protected $table = "support";
    //ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
    protected $fillable = ["id","request","completion","company","name_customer","telephone"
    ,"responsible","email","other","complaint","support_image","image_update","support_number","receive_complaints","delete","user_delete","img1","img2","img3","img4","img5","img6","status"];    
    //Primary Key
    protected $primaryKey = "id";

    public static function getAll(){
     return self::get();
    }
    
    public static function getItem($id){
        //SIMILAR TO, BUT DIFFERENT A LITTLE BIT
        //return self::where('id',$id)->get($id);
    return self::findOrFail($id);
    }
        
            public static function storeItem($item){
            return self::create($item); 			//RETURN OBJECT
            }
    public static function updateItem($id, $item){
    self::findOrFail($id)->update($item); 	//NO NEED TO RETURN
    }

    public static function destroyItem($id){
    self::findOrFail($id)->delete();
    }
        
    public $timestamps = false;
        
}
