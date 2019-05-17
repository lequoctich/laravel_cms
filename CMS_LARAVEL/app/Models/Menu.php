<?php
namespace App\Models;

use DB;
use App\Models\BaseModel;

class Menu extends BaseModel
{
    protected $table = 'menus';
    protected $primaryKey = 'id';

    public function slug()
    {
        return $this->belongsTo('App\Models\Slug', 'slug', 'slug_id');
    }

}