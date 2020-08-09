<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:46
 */

namespace Modules\Admin\Providers;


use Illuminate\Support\ServiceProvider;

class ProductRepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $models             = [
            'Product'
        ];
        $namespace_frontend = "Modules\\Admin\\Repository\\";
        foreach ($models as $model)
        {
            $this->app->singleton(
                $namespace_frontend . $model . '\\' . $model . 'RepositoryInterface',
                $namespace_frontend . $model . '\\' . $model . 'Repository'
            );
        }
    }
}
