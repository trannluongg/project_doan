<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 9/3/2020
 * Time: 2:17 PM
 */

namespace Modules\Admin\Providers;


use Illuminate\Support\ServiceProvider;

class ModuleRepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $models             = [
            'Module',
            'ModuleGroup'
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
