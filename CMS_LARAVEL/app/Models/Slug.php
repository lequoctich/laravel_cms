<?php
namespace App\Models;

use DB;
use App\Models\BaseModel;

class Slug extends BaseModel
{
    protected $table = 'slug';
    protected $primaryKey = 'slug_id';

}