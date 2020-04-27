<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    //ชื่อตารางในฐานข้อมูล
protected $table = "order";
//ชื่อคอลัมน์ในฐานข้อมูลที่อนุญาติให้แก้ไขข้อมูล
protected $fillable = ["new_order","delivery","company","cell","company_sticker",
                       "warranty_sticker","list_product","number","annotation","worker","check_job","status","order_number","assign","delete","user_delete"];    
//Primary Key
     protected $primaryKey = "id";
     
     public function orderdetail()
     {
         return $this->hasMany('App\orderdetail','order_id');
     }

     function select_search($q){
      $sql = "SELECT * FROM order	
              INNER JOIN order_detail ON order.id=order_detail.order_id; 
              where new_order like '%{$q}%' 
              or list_product like '%{$q}%'
              or company like '%{$q}%'
              or cell like '%{$q}%'
              or order_number like '%{$q}%'
               ";
      return DB::select($sql, []);
    }
     public static function getAll(){
        return self::orderBy('id','desc')
        ->get();
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


     public static function insert($new_order, $delivery, $company, $cell, $company_sticker, $warranty_sticker, 
     $list_product, $number,$annotation,$worker,$check_job,$status,$order_number,$assign)
     {
       $sql = "INSERT INTO order (new_order, delivery, company, cell, company_sticker, warranty_sticker, list_product,number,
       annotation,worker,check_job,status,order_number,assign)
       VALUES ( '{$new_order}','{$delivery}','{$company}','{$cell}','{$company_sticker}','{$warranty_sticker}','{$list_product}',
       {$number},'{$annotation}','{$worker}','{$check_job}','{$status}',{$order_number},),{$assign},)
       
       ";
       DB::insert($sql, []); //NO NEED TO RETURN
     }
     public static function new()
     {
       $sql = "SELECT * FROM mypj.order  
       ORDER BY id  DESC LIMIT 1";
       return DB::select($sql , []);
     }
    public static function Historycopy($id)
    {
        $sql = "INSERT INTO historyjob  (`new_order`,`delivery`,`company`,`cell`,`company_sticker`,`warranty_sticker`,`list_product`,`number`,`annotation`,`worker`,`check_job`,`status`,`order_number`,`assign`)
        SELECT new_order,delivery,company,cell,company_sticker,warranty_sticker,list_product,number,annotation,worker,check_job,status,order_number,assign FROM mypj.order
        WHERE id=$id";
       return DB::select($sql , []);
    }
    public static function NewOrder()
      {
        $sql = "SELECT * FROM mypj.order
        ORDER BY id  DESC LIMIT 1";
        return DB::select($sql , []);
      }
}
