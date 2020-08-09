<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 21/3/2020
 * Time: 4:02 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\ModuleField;

class Module extends Model
{
    public $prefix = 'mod';
    protected $table = 'modules';

    public $fieldClass = ModuleField::class;

    public $relationships = [
        'module_permissions' => Permission::class,
        'modules'           => ModuleGroup::class
    ];

    protected $guarded = [];

    public function module_permissions()
    {
        return $this->hasMany(Permission::class, 'module_id');
    }

    public function modules()
    {
        return $this->belongsTo(ModuleGroup::class, 'mod_module_group_id');
    }
}
