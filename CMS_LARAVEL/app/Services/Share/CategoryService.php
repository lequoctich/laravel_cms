<?php

namespace App\Services\Share;

use App\Services\Guest\BaseService;
use App\Models\Category;

class CategoryService extends BaseService
{
    /**
     * Get list     All category parent
     * 
     * @return sql
     */
    public function getListCategory()
    {
        //use relation;
        //return  Category::with('RelationCategory')->get();
        return  Category::with('slugMenu')->where('delete_flag', 0)->get();
    }

    /**
     * Get list only category parent
     * 
     * @return sql
     */
    public function getListParentCategory()
    {
        return  Category::where('parent_id', 0)->where('delete_flag', 0)->get();
    }

    
     /**
      * Update cloums menu_id where category id.
      *
      * @param int   $categoryId   category id
      * @param array $menuIdString menu string
      * 
      * @return sql
      */
    public function updateMenuIdInCategory($categoryId, $menuIdString)
    {
        return  Category::where('id', $categoryId)
        ->update(['menu_id' => $menuIdString]);
    }

    /**
     * Update cloums name where category id.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function updateNameInCategory($categoryId, $categoryName, $slug)
    {
        return  Category::where('id', $categoryId)
        ->update(['name' => $categoryName, 'slug' => $slug]);    
    }

    /**
    * Update cloums parent id where category id.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function updateParentIdInCategory($categoryId, $parentId)
    {
        return  Category::where('id', $categoryId)
        ->update(['parent_id' => $parentId]);    
    }

    /**
    * Update cloums parent id where category id.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function deleteCategory($categoryId)
    {
        return  Category::where('id', $categoryId)
        ->update(['delete_flag' => 1]);    
    }

    /**
    * add category.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function addCategory($name, $slug)
    {
        return  Category::insert ( ['name' => $name, 'slug' => $slug]);    
    }

}