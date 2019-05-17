<?php

namespace App\Services\Admin\Menu;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page;
use App\Services\Share\CategoryService;
use App\Services\Share\PageService;
use App\Services\Share\MenuService;

class MenuAjaxService
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService, PageService $pageService, MenuService $menuService)
    {
        $this->categoryService = $categoryService;
        $this->pageService = $pageService;
        $this->menuService = $menuService;
    }

    /**
     * Short Menu
     *
     * @param array  $menus 
     * 
     * @return sql
     */
    public function sortMenu($menus)
    {
        foreach ($menus as $menu) {
            $this->menuService->updateShortMenu($menu[0], $menu[1]);

        }

    }

    /**
     * Edit menu function.
     * 
     * @param int  $menuIdParam 
     * 
     * @param array  $categorys 
     * 
     * @param array  $page 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editMenu($menuIdParam, $categorys, $page)
    {
        $this->deleteMenuIdInCategory($menuIdParam);
        $this->deleteMenuIdInPage($menuIdParam);
        if (!empty($categorys)) {
            foreach ($categorys as $categoryId) {
                //common category shared service
                $menuIdArray = Category::select('menu_id')->where('id', $categoryId)->get()->toArray();
                $menuId = explode(",", $menuIdArray[0]['menu_id']);
                array_push($menuId, $menuIdParam);
                $menuIdString = implode(",", $menuId);
                $this->categoryService->updateMenuIdInCategory($categoryId, $menuIdString);
            };
        }
        
        if (!empty($page)) {
            foreach ($page as $pageId) {
                //common category shared service
                $menuIdArray = Page::select('menu_id')->where('id', $pageId)->get()->toArray();
                $menuId = explode(",", $menuIdArray[0]['menu_id']);
                array_push($menuId, $menuIdParam);
                $menuIdString = implode(",", $menuId);     
                $this->pageService->updateMenuIdInPage($pageId, $menuIdString);
            };
        }

        return true;
    }

    /**
     * Delete menu id in colum menu_id in category
     *
     * @param int $menuIdParam menuId need delete in string menu_id
     * 
     * @return sql
     */
    private function deleteMenuIdInCategory($menuIdParam)
    {
        $categoryArrays = Category::select("id", 'menu_id')->where('parent_id', 0)->get()->toArray();
        $this->processingDeleteMenu($categoryArrays, $menuIdParam, "category");
    }

    /**
     * Delete menu id in colum menu_id in page
     *
     * @param int $menuIdParam menuId need delete in string menu_id
     * 
     * @return sql
     */
    private function deleteMenuIdInPage($menuIdParam)
    {
        $pageArrays = Page::select("id", 'menu_id')->where('parent_id', 0)->get()->toArray();  
        $this->processingDeleteMenu($pageArrays, $menuIdParam, "page");
    }

    /**
     * Processing Delete Id for category and Page
     *
     * @param array  $arrayParams 
     * 
     * @param int    $menuIdParam
     * 
     * @param string $menuIdParam
     * 
     * @return sql
     */
    private function processingDeleteMenu($arrayParams, $menuIdParam, $keyParam)
    {
     
        foreach ($arrayParams as $key => $arrayParam) {
            $itemId = $arrayParam['id'];
            $menuIdArray = explode(",", $arrayParam['menu_id']);
           
            if (in_array($menuIdParam, $menuIdArray)) {
                foreach ($menuIdArray as $key => $val) {    
                    if ($val == $menuIdParam) {
                        unset($menuIdArray[$key]);
                    }
                }
                $menuIdString = implode(",", $menuIdArray);
                if ($keyParam == "category") {
                    $this->categoryService->updateMenuIdInCategory($itemId, $menuIdString);
                } else {
                    $this->pageService->updateMenuIdInPage($itemId, $menuIdString);
                }
                
            }        
        }       
    }
}
