<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 11:05 AM
 */

namespace Modules\Admin\Providers;


use Illuminate\Support\ServiceProvider;

class AclRepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $models             = [
            'Permission',
            'Role',
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
