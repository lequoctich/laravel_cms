<?php

namespace App\Http\Controllers\Admin\PageController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\Share\MenuService;
use App\Services\Admin\Page\ListPageService;
use App\Services\Share\pageService;



class PageController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ListpageService $listpageService, pageService $pageShareService)
    {
        //$this->middleware('auth');
        $this->listpageService = $listpageService;
        $this->pageShareService = $pageShareService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        //return 'lol';
        $listPage = $this->listpageService->listPage();
        $listParentPage= $this->pageShareService->getPageParent();
        return view('admin/admin1/page/index', compact('listPage', 'listParentPage'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rename(Request $request)
    {
        $this->pageShareService->updateNameInPage($request->id, $request->name, $request->slug);
        return ['status'=>200];
    }

    /**
     * Add Child Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addChild(Request $request)
    {
        $this->pageShareService->updateParentIdInPage($request->idChild, $request->idPage);
        return ['status'=>201];
    }

    /**
     * Add Child Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeChild(Request $request)
    {
        $this->pageShareService->updateParentIdInPage($request->pageId, 0);
        return ['status'=>201];
    }

     /**
     * delete Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {
        $this->pageShareService->deletePage($request->pageId);
        return ['status'=>201];
    }

    /**
     * add Category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPage(Request $request)
    {
        $this->pageShareService->addPage($request->name, $request->slug);
        return ['status'=>201];
    }

}
