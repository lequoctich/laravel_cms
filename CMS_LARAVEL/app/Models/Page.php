<?php
namespace App\Models;

use DB;
use App\Models\BaseModel;

class Page extends BaseModel
{
    protected $table = 'page';
    protected $primaryKey = 'id';

    /**
     * Get the relation in category.
     */
    public function slugMenu()
    {
        return $this->belongsTo('App\Models\Slug', 'menu_slug', 'slug_id');
    }

}