<?php
namespace App\Models;

use DB;
use App\Models\BaseModel;

class Category extends BaseModel
{
    protected $table = 'Category';
    protected $primaryKey = 'id';
    public $timestamps = true;

     /**
     * Get the relation in category.
     */
    public function slugMenu()
    {
        return $this->belongsTo('App\Models\Slug', 'menu_slug', 'slug_id');
    }

}