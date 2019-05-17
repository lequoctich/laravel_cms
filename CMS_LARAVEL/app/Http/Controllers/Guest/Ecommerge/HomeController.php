<?php
namespace App\Http\Controllers\Guest\Ecommerge;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Share\MenuService;

class HomeController extends BaseController
{
    protected $menuService;

    /**
     * Construct function.
     *
     * @param MenuService $menuService Call menu service
     * 
     * @return mix
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Index Controller Show Home Screen.
     *
     * @return view
     */
    public function index()
    {
        $menuData = $this->menuShow();
        //return $menuData;
        return view('home/home', compact('menuData'));
    }

    /**
     * Index Controller Show Home Screen.
     *
     * @return view
     */
    public function menuShow()
    {
        return $this->menuService->listMenu();
    }
}
