<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Profesional']);
        $role2 = Role::create(['name' => 'Paciente']);
        

        Permission::create(['name' => 'stories.index'])->assignRole($role1);
        Permission::create(['name' => 'patient.index'])->assignRole($role2);
        Permission::create(['name' => 'stories.create'])->assignRole($role1);
        Permission::create(['name' => 'stories.store'])->assignRole($role1);
        Permission::create(['name' => 'stories.edit'])->assignRole($role1);
        Permission::create(['name' => 'stories.show'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'stories.update'])->assignRole($role1);
        Permission::create(['name' => 'stories.destroy'])->assignRole($role1);
        
        


    }
}
