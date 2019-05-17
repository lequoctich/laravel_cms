<?php

namespace App\Services\Admin\Page;

use Illuminate\Http\Request;
use App\Services\Share\PageService;
use App\Services\Share\MenuService;
use App\Services\Share\Page;



class ListPageService
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageService $pageService, MenuService $menuService)
    {
        $this->pageService = $pageService;
        $this->menuService = $menuService;
    }

    /**
     * List Category
     *
     * @return sql
     */
    public function ListPage()
    {
        $listCategory = $this->pageService->getListPage();
        $mutilPage = $this->menuService->multiMenuArray($listCategory);
       // dd($mutilCategory);
        return $mutilPage;
    }
}