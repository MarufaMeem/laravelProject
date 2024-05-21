<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    use HasFactory;
    protected $table = 'slider';

    
    static public function getRecord()
    {
        return self::select('slider.*')->paginate(10);
    
      
    }
    static public function getSingle($id){
        return self::find($id);
        }
    
        static public function getRecordActive()
    {
        return self::select('slider.*')
       
        ->where('slider.is_delete','=',0)
        ->where('slider.status','=',0)
    
        ->orderBy('slider.id','asc')
        ->get();
    }

    public function getLogo()
    {
       if(!empty($this->image) && file_exists('uploads/slider/'.$this->image))
       {
        return url('uploads/slider/'.$this->image);
    }
    else
    {
        return "";
    }
    }


}
