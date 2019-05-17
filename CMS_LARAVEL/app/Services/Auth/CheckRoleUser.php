<?php

namespace App\Services\Auth;
use Illuminate\Support\Facades\Auth;

class CheckRoleUser
{

    /**
     * Contruct function
     *
     * @return mix
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check system admin
     *
     * @return boolean
     */
    static function isSystemAdmin()
    {
        if (Auth::user()->role == 3) {
            return true;
        }
        return false;
    }

    /**
     * Check admin
     *
     * @return boolean
     */
    static function isAdmin()
    {
        if (Auth::user()->role == 2) {
            return true;
        }
        return false;
    }

    /**
     * Check contain admin
     *
     * @return boolean
     */
    static function isContentAdmin()
    {
        if (Auth::user()->role == 1) {
            return true;
        }
        return false;
    }

    /**
     * Check user
     *
     * @return boolean
     */
    static function user()
    {
        if (Auth::user()->role == 0) {
            return true;
        }
        return false;
    }     
}
