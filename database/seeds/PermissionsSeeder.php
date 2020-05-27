<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'create user']);
        $permission = Permission::create(['name' => 'create schedule']);

        $permission = Permission::create(['name' => 'edit user']);
        $permission = Permission::create(['name' => 'edit schedule']);
        
        $permission = Permission::create(['name' => 'delete user']);
        $permission = Permission::create(['name' => 'delete schedule']);
       
        $permission = Permission::create(['name' => 'permissions']);
        $permission = Permission::create(['name' => 'assign permissions']);
        
        $permission = Permission::create(['name' => 'schedules']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['create user','schedules','create schedule','edit schedule','permissions']);
        $user = User::where('id',1)->firstOrFail();
        $user->assignRole('admin');
        $user->givePermissionTo(['edit user','assign permissions']);

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo(['schedules','create schedule','edit schedule']);
        $user = User::where('id',2)->firstOrFail();
        $user->assignRole('teacher');


        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('');
        $user = User::where('id',3)->firstOrFail();
        $user->assignRole('student');


    }
}
