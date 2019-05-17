<?php

namespace App\Http\Controllers\Admin\CategoryController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Admin\Menu\MenuAjaxService;
use App\Services\Share\MenuService;
use App\Services\Admin\Category\ListCategoryService;
use App\Services\Share\CategoryService;

class CategoryController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ListCategoryService $listCategoryService, CategoryService $categoryShareService)
    {
        //$this->middleware('auth');
        $this->listCategoryService = $listCategoryService;
        $this->categoryShareService = $categoryShareService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $listCategory = $this->listCategoryService->ListCategory();
        $listParentCategory = $this->categoryShareService->getListParentCategory();
        return view('admin/admin1/category/index', compact('listCategory', 'listParentCategory'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rename(Request $request)
    {
        $this->categoryShareService->updateNameInCategory($request->id, $request->name, $request->slug);
        return ['status'=>200];
    }

    /**
     * Add Child Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addChild(Request $request)
    {
        $this->categoryShareService->updateParentIdInCategory($request->idChild, $request->idCategory);
        return ['status'=>201];
    }

    /**
     * Add Child Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeChild(Request $request)
    {
        $this->categoryShareService->updateParentIdInCategory($request->categoryId, 0);
        return ['status'=>201];
    }

    /**
     * delete Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {
        $this->categoryShareService->deleteCategory($request->categoryId, 0);
        return ['status'=>201];
    }

    /**
     * add Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addCategory(Request $request)
    {
        $this->categoryShareService->addCategory($request->name, $request->slug);
        return ['status'=>201];
    }


}
