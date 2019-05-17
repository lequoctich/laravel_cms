<?php

namespace App\Http\Controllers\Admin\MenuController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Admin\Menu\MenuAjaxService;
use App\Services\Share\MenuService;

class MenuAjaxController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sortMenu(MenuAjaxService $menuAjaxService, MenuService $menuService)
    {
        //TODO: Trans session
        $menuAjaxService->sortMenu(request()->input('id'));

        $listMenu = $menuService->MenuTwoLever();

        return view('admin/admin1/menu/list_menu_ajax', compact('listMenu'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editMenu(MenuAjaxService $menuAjaxService, MenuService $menuService)
    {
        $menuService->updateNameMenuTable(request()->input('menuId'), request()->input('menuName'));
        $menuAjaxService->editMenu(
            request()->input('menuId'),
            request()->input('CategoryId'),
            request()->input('pageId')
        );
        
        return $status = 200;
    }

    /**
     * Add Menu Service
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addMenu(MenuService $menuService)
    {
        $menuService->insertMenu(request()->input('menuName'));

        $listMenu = $menuService->MenuTwoLever();

        return view('admin/admin1/menu/list_menu_ajax', compact('listMenu'));
       
    }

    /**
     * Delete Menu Service
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteMenu(MenuService $menuService)
    {   
        //todo: check neu  menu van con trong catagory thi khong duoc xoa menu
        $status = $menuService->deleteMenu(request()->input('menuId'));
        if ($status['status'] == 200) {
            $listMenu = $menuService->MenuTwoLever();
            return view('admin/admin1/menu/list_menu_ajax', compact('listMenu'));
        }
        //return popup error
       
       
    }
}
