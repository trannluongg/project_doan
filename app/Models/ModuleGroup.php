<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 2:50 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\ModuleGroupField;

class ModuleGroup extends Model
{
    public $prefix = 'mog';
    protected $table = 'modules_group';

    public $fieldClass = ModuleGroupField::class;

    public $relationships = [
        'modules_group' => Module::class
    ];

    protected $guarded = [];

    public function modules_group()
    {
        return $this->hasMany(Module::class, 'mod_module_group_id', 'id');
    }
}
