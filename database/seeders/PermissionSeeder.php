<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage_users',
            'manage_jobs',
            'apply_jobs',
            'view_applications',
        ];
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        $roleAdmin = Role::updateOrCreate(['name'=>'admin']);
        $roleEmployer = Role::updateOrCreate(['name'=>'employer']);
        $roleJobSeeker = Role::updateOrCreate(['name'=>'job_seeker']);

        $roleAdmin->givePermissionTo($permissions);
        $roleEmployer->givePermissionTo(['manage_jobs', 'view_applications']);
        $roleJobSeeker->givePermissionTo('apply_jobs');

        $user = User::find(1);
        $user->assignRole(['admin']);
        $user2 = User::find(4);
        $user2->assignRole(['employer']);
        $user3 = User::find(5);
        $user3->assignRole(['job_seeker']);
    }
}
