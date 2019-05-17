<?php

namespace App\Services\Share;

use App\Services\Guest\BaseService;
use App\Models\Page;

class PageService extends BaseService
{

    /**
     * Get list All category parent
     * 
     * @return sql
     */
    public function getListPage()
    {
        //use relation;
        //return  Category::with('RelationCategory')->get();
        return  Page::where('delete_flag', 0)->get();
    }
   
    /**
     * Get Only parent page Page
     *
     * @return sql
     */
    public function getPageParent()
    {
        return  Page::where('parent_id', 0)->where('delete_flag', 0)->get();
    }

    /**
     * Update cloums menu_id where Page id.
     *
     * @param int   $categoryId   category id
     * @param array $menuIdString menu string
     * 
     * @return sql
     */
    public function updateMenuIdInPage($pageId, $menuIdString)
    {
        return  Page::where('id', $pageId)
        ->update(['menu_id' => $menuIdString]);
    }

    /**
     * Update cloums name and slug where page id.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function updateNameInPage($pageId, $pageName, $slug)
    {
        return  Page::where('id', $pageId)
        ->update(['name' => $pageName, 'slug' => $slug]);    
    }

     /**
    * Update cloums parent id where category id.
    *
    * @param int   $categoryId   category id
    * @param string $categoryName category name
    * 
    * @return sql
    */
    public function updateParentIdInPage($pageId, $parentId)
    {
        return  Page::where('id', $pageId)
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
    public function deletePage($pageId)
    {
        return  Page::where('id', $pageId)
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
    public function addPage($name, $slug)
    {
        return  Page::insert ( ['name' => $name, 'slug' => $slug]);    
    }

}