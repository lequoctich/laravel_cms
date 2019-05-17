<?php

namespace App\Services\Admin\Category;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Services\Share\CategoryService;
use App\Services\Share\MenuService;


class ListCategoryService
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService, MenuService $menuService)
    {
        $this->categoryService = $categoryService;
        $this->menuService = $menuService;
    }

    /**
     * List Category
     *
     * @return sql
     */
    public function ListCategory()
    {
        $listCategory = $this->categoryService->getListCategory();
        $mutilCategory = $this->menuService->multiMenuArray($listCategory);
        return $mutilCategory;
    }
}