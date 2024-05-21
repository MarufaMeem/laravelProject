<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    use HasFactory;
    protected $table = 'page';

static public function getRecord()
{
    return self::select('page.*')->get();
}

public function getLogo()
{
   if(!empty($this->image) && file_exists('uploads/page/'.$this->image))
   {
    return url('uploads/page/'.$this->image);
}
else
{
    return "";
}
}
static public function getSlug($slug){
    return self::where('slug','=',$slug)->first();
    }


static public function getSingle($id){
    return self::find($id);
    }


}
