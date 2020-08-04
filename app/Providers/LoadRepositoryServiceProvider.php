<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 26/07/2020
 * Time: 15:41
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class LoadRepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $models             = [
            'Product',
            'Brand',
            'User'
        ];
        $namespace_frontend = "App\\Repository\\";
        foreach ($models as $model)
        {
            $this->app->singleton(
                $namespace_frontend . $model . '\\' . $model . 'RepositoryInterface',
                $namespace_frontend . $model . '\\' . $model . 'Repository'
            );
        }
    }
}
