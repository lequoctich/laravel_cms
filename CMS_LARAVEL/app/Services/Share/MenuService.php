<?php

namespace App\Services\Share;

use App\Services\Guest\BaseService;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page;

class MenuService extends BaseService
{

    /**
     * Get one row menu where id
     *
     * @param int $id menu id
     * 
     * @return sql
     */
    public function getRowMenu($id)
    {
        return Menu::select('id', 'name', 'local', 'sort', 'role')->where('id', $id)->get();
    }

    /**
     * List menu service
     *
     * @return object
     */
    public function listMenu()
    {
        $categorys = Category::with('slugMenu')->where('delete_flag', 0)->get();
        $infomation = Page::with('slugMenu')->where('delete_flag', 0)->get();
        $menu = Menu::with('slug')->get()->groupBy('id');

        $menu = $this->getFirstArray($menu);
        $category = $this->multiMenuArray($categorys)->groupBy('menu_id');
        $page = $this->multiMenuArray($infomation)->groupBy('menu_id');

        $menu = $this->mapChildMenu($menu, $category, $page)->toArray();
        $menu = collect($menu)->sortBy('sort');
        // dd($menu);
        return $menu;

    }

    /**
     * Move menu get form database become multi menu
     * 
     * @param array $menu get form database
     * 
     * @return object
     */
    public function multiMenuArray($menu, $groupBy = 'menu_id')
    {
        $groupeds = $menu->groupBy('parent_id')->sortKeysDesc();
        //dd($groupeds);
        foreach ($groupeds as $idParent => $childs) {
            $collection = collect($childs);
            $groupId = $collection->groupBy('id');

            $groupeds[$idParent] = $this->getFirstArray($groupId);
        }
        //dd($groupeds->toArray());

        $menuMulti = [];
        $idChild = [];

        foreach ($groupeds as $id => $childs) {
            if ((empty($idChild))) {
                array_push($idChild, $id);
               
            } else {
                
                foreach ($idChild as $key => $childId) {
                    if (isset($childs[$childId])) {
                        $childs[$childId]['child'] = $groupeds[$childId];
                        $groupeds[$id] = $childs;
                        $menuMulti = $childs;         
                    }
                             
                }
                array_push($idChild, $id); 
               
            }
        }
        \Log::error($idChild);

        if (!empty($menuMulti)) {
            return ($menuMulti->flatten(1));
        }
        return $menu;

    }

    /**
     * Get first element in Array
     * 
     * @param array array
     * 
     * @return array
     */
    private function getFirstArray($array)
    {
        foreach ($array as $key => $val) {
            $array[$key] = $val[0];
        }
        return $array;
    }

    /**
     * Maps Child Menu becom multil menu
     * 
     * @param array menu
     * @param array category
     * @param array page
     * 
     * @return array
     */
    private function mapChildMenu($menu, $category, $page)
    {

        foreach ($category as $idMenuStr => $val) {
            $arrIdChildMenu = explode(",", $idMenuStr);
            foreach ($menu as $id => $value) {
                if (in_array($id, $arrIdChildMenu)) {
                    if (!isset($menu[$id]['child'])) {
                        // check cho 2 truong hop 2 ham goi
                        if (is_array($category[$idMenuStr])) {
                            $menu[$id]['child'] = $category[$idMenuStr];
                        } else {
                            $menu[$id]['child'] = [$category[$idMenuStr]];
                        }

                    } else {

                        if (is_array($menu[$id]['child']) && is_array($category[$idMenuStr])) {
                            $menu[$id]['child'] = array_merge($menu[$id]['child'], $category[$idMenuStr]);
                        } else {
                            $menu[$id]['child'] = array_merge($menu[$id]['child'], [$category[$idMenuStr]]);
                        }


                    }
                }
            }
        }

        foreach ($page as $idMenuStr => $val) {
            $arrIdChildMenu = explode(",", $idMenuStr);
            foreach ($menu as $id => $value) {
                if (in_array($id, $arrIdChildMenu)) {
                    if (!isset($menu[$id]['child'])) {

                        if (is_array($page[$idMenuStr])) {
                            $menu[$id]['child'] = $page[$idMenuStr];
                        } else {
                            $menu[$id]['child'] = [$page[$idMenuStr]];
                        }

                    } else {

                        if (is_array($menu[$id]['child']) && is_array($page[$idMenuStr])) {
                            $menu[$id]['child'] = array_merge($menu[$id]['child'], $page[$idMenuStr]);
                        } else {
                            $menu[$id]['child'] = array_merge($menu[$id]['child'], [$page[$idMenuStr]]);
                        }

                    }
                }
            }
        }
        return $menu;

    }


    /**
     * Get menu only 2 level
     *
     * @return sql
     */
    public function MenuTwoLever()
    {
        $menu = Menu::all();
        $menu = $this->getFirstArray($menu->groupBy('id')->toArray());
        $category = Category::where('menu_id', '<>', null)->get()->groupBy('menu_id')->toArray();
        $page = Page::where('menu_id', '<>', null)->get()->groupBy('menu_id')->toArray();

        $menu = $this->mapChildMenu($menu, $category, $page);
        $menu = collect($menu)->sortBy('sort');

        return $menu;
    }

    /**
     * Update colums name in menutable
     *
     * @param int    $id   menu id
     * @param string $name possition of id
     * 
     * @return sql
     */
    public function updateNameMenuTable($id, $name)
    {
        try {
            $menu = Menu::where('id', $id)
                ->update(['name' => $name]);
            return [
                'status' => 200
            ];
        } catch (Exception $e) {
            return [
                'status' => 403,
                'mesage' => $e->getMessage()
            ];

        }

    }

    /**
     * Update colums sort in menutable
     *
     * @param int $menuId menu id
     * @param int $local  possition of id
     * 
     * @return sql
     */
    public function updateShortMenu($menuId, $local)
    {
        Menu::where('id', $menuId)
            ->update(['sort' => $local]);

    }

    /**
     * Add menu 
     *
     * @param string $menuName menuName
     * 
     * @return sql
     */
    public function insertMenu($menuName)
    {
        $sort = Menu::select("sort")->max("sort");
        return Menu::insertGetId(['name' => $menuName, 'sort' => $sort + 1]);
    }

    /**
     * Add menu 
     *
     * @param number $menuId menu id
     * 
     * @return sql
     */
    public function deleteMenu($menuId)
    {

        $sort = Menu::where("id", $menuId)->delete();

        return ['status' => 200];
    }

}