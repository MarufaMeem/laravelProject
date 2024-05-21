<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use HasFactory;
    protected $table = 'partner';

    
    static public function getRecord()
    {
        return self::select('partner.*')->paginate(10);
    
      
    }
    static public function getSingle($id){
        return self::find($id);
        }
    
        static public function getRecordActive()
    {
        return self::select('partner.*')
       
        ->where('partner.is_delete','=',0)
        ->where('partner.status','=',0)
    
        ->orderBy('partner.id','asc')
        ->get();
    }

    public function getLogo()
    {
       if(!empty($this->image) && file_exists('uploads/partner/'.$this->image))
       {
        return url('uploads/partner/'.$this->image);
    }
    else
    {
        return "";
    }
    }
}
