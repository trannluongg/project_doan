<?php

namespace App\Http\Controllers;

use App\Core123\Auth\AuthMe;
use App\Models\Brands;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $user = null;
        $menus = $this->getMenu();

        try{
            if (AuthMe::token('users'))
            {
                Config::set('auth.defaults.guard', 'users');
                $user = JWTAuth::setToken(AuthMe::token('users'))->toUser();
            }
            view()->share(['menus' => $this->getMenu(), 'user' => $user]);
        }
        catch (Exception $e)
        {
            view()->share(['menus' => $this->getMenu(), 'user' => $user]);
            return redirect()->route('get.user.home', compact('menus'));
        }
    }

    public function getMenu()
    {
        $menu = Brands::limit(10)->get(['bra_name', 'bra_icon', 'bra_slug']);
        return $menu;
    }
}
