<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 07/06/2020
 * Time: 16:13
 */

namespace App\Http\Controllers\Search;


use Jenssegers\Agent\Agent;

class SearchController
{
    public function index()
    {
        $agent = new Agent();

        if ($agent->isMobile()){
            return view('pages.search.index_mobile');
        }
        else{
            return view('pages.search.index');
        }
    }
}
