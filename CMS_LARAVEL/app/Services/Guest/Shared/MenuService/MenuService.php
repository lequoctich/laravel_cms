<?php

namespace App\Services\Guest\Shared\MenuService;

use App\Services\Guest\BaseService;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page;

class MenuService extends BaseService
{

    // /**
    //  * List menu service
    //  *
    //  * @return object
    //  */
    // public function listMenu()
    // {
    //     $categorys = Category::All();
    //     $infomation = Page::All();
    //     $menu = Menu::All()->groupBy('id');
    //     // foreach ($menu as $key => $val) {
    //     //     $menu[$key] = $val[0];
    //     // }
    //     $menu = $this->getFirstArray($menu);
    //     $category = $this->multiMenuArray($categorys);
    //     $page = $this->multiMenuArray($infomation);
    //     //dd($category->toArray());
    //     foreach ($menu as $id => $value) {
    //         if (isset($category[$id])) {
    //             $menu[$id]['child'] = $category[$id];
    //         }

    //         if (isset($page[$id])) {
    //             $menu[$id]['child'] = $page[$id];
    //         }
    //     }
    //     //dd($menu);
    //     return $menu;

    // }

    // /**
    //  * Move menu get form database become multi menu
    //  * 
    //  * @param array $menu get form database
    //  * 
    //  * @return object
    //  */
    // private function multiMenuArray($menu)
    // {
    //     $groupeds = $menu->groupBy('parent_id')->sortKeysDesc();

    //     foreach ($groupeds as $idParent => $childs) {
    //         $collection = collect($childs);
    //         $groupId = $collection->groupBy('id');
    //         // $groupId = $this->getFirstArray($groupId);
    //         $groupeds[$idParent] = $this->getFirstArray($groupId);
    //     }

    //     $menu = [];
    //     $idChild = '';
    //     foreach ($groupeds as $id => $childs) {
    //         if (($idChild == '')) {
    //             $idChild = $id;
    //         } else {
    //             $childs[$idChild]['child'] = $groupeds[$idChild];
    //             $groupeds[$id] = $childs;
    //             $menu = $childs;
    //             $idChild = $id;
    //         }
    //     }

    //     return ($menu->flatten(1)->groupBy('menu_id'));
    // }

    // private function getFirstArray($array)
    // {
    //     foreach ($array as $key => $val) {
    //         $array[$key] = $val[0];
    //     }
    //     return $array;
    // }



}