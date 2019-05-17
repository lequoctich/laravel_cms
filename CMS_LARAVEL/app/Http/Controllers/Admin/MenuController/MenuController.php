<?php

namespace App\Http\Controllers\Admin\MenuController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Share\MenuService;
use App\Services\Share\CategoryService;
use App\Services\Share\PageService;

class MenuController extends BaseController
{

    protected $menuShareService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MenuService $menuShareService)
    {
        $this->menuShareService = $menuShareService;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listMenu = $this->menuShareService->MenuTwoLever();

        return view('admin/admin1/menu/list_menu', compact('listMenu'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edits(CategoryService $categoryService, PageService $pageService, $idMenu = '')
    {
        //GET MENU VALUES
        $menu = $this->menuShareService->getRowMenu($idMenu);
        //GET CHILE MENU
        //get Category
        $listCategory = $categoryService->getListParentCategory();
        $categoryChildMenu = $listCategory->groupBy('menu_id');
        $childMenuCategory = [];
        $childMenuPage = [];
        foreach ($categoryChildMenu as $menuId => $Categorys) {
            $menuIdArray = explode(',', $menuId);

            if (in_array($idMenu, $menuIdArray)) {
                $childMenuCategory[] = $Categorys;
            }
        }
        $childMenuCategory = collect($childMenuCategory)->flatten(1);
        //get Page
        $listPage = $pageService->getPageParent();
        $pageChildMenu = $listPage->groupBy('menu_id');

        foreach ($pageChildMenu as $menuId => $Pages) {
            $menuIdArray = explode(',', $menuId);

            if (in_array($idMenu, $menuIdArray)) {
                $childMenuPage[] = $Pages;
            }
        }
        $childMenuPage = collect($childMenuPage)->flatten(1);

        return view('admin/admin1/menu/edits_menu', compact('menu', 'childMenuCategory', 'childMenuPage', 'listCategory', 'listPage'));

    }


}
