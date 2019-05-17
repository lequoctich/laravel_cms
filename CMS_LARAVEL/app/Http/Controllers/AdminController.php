<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;

abstract class AdminController extends BaseController
{

    /**
     * AdminController constructor.
     */
    public function __construct() {
        // $this->middleware ( 'auth', [
        //     'except' => ['userlogin']
        // ] );
    }
}
