<?php

namespace App\Jobs;

use App\Models\Admins;
use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignRolePermissionAdmin implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $admin;
    private $roles;
    /**
     * AssignRolePermissionAdmin constructor.
     * @param Admin $admin
     * @param array $roles
     */
    public function __construct(Admins $admin, $roles = [])
    {
        $this->roles = $roles;
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->roles as $role) {
            $role_r     = Role::where('id', $role)->firstOrFail();
            $permission = $role_r->permissions;
            $this->admin->givePermissionTo($permission);
            $this->admin->assignRole($role_r);
        }
    }
}
