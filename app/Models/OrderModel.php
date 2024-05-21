<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
   
    static public function getRecordUser($user_id)
    {
 $retrun = OrderModel::select('orders.*')
 ->where('user_id','=',$user_id)
 ->where('is_payment','=',1)
 ->where('is_delete','=',0)
 ->orderBy('id','desc')
 ->paginate(20);
 
    }
}
