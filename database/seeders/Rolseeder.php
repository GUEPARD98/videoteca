<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Rolseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.index', 'description' => 'ver dashboard'])->syncRoles([$admin, $role2]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'ver listado categorias'])->syncRoles([$admin, $role2]);;
        Permission::create(['name' => 'admin.categories.create', 'description' => 'crear categorias'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'editar categorias'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'eliminar categorias'])->syncRoles([$admin]);;

        Permission::create(['name' => 'admin.posts.index', 'description' => 'ver lista de articulos '])->syncRoles([$admin, $role2]);;
        Permission::create(['name' => 'admin.posts.create', 'description' => 'crear articulos'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.posts.edit', 'description' => 'editar articulos'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.posts.destroy', 'description' => 'eliminar articulos'])->syncRoles([$admin]);;

        Permission::create(['name' => 'admin.slider.index', 'description' => 'ver lista de carrucel '])->syncRoles([$admin, $role2]);;
        Permission::create(['name' => 'admin.slider.create', 'description' => 'crear carrucel'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.slider.edit', 'description' => 'editar carrucel'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.slider.destroy', 'description' => 'eliminar carrucel'])->syncRoles([$admin]);;

        Permission::create(['name' => 'admin.tags.index', 'description' => 'ver listado de etiquetas'])->syncRoles([$admin, $role2]);;
        Permission::create(['name' => 'admin.tags.create', 'description' => 'crear etiqueta'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'editar etiqueta'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.tags.destroy', 'description' => 'eliminar etiqueta'])->syncRoles([$admin]);;


        Permission::create(['name' => 'admin.users.index', 'description' => 'ver lista de usuarios'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.users.create', 'description' => 'ver dashboard'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.users.edit', 'description' => 'asignar un rol'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.users.destroy', 'description' => 'asignar un rol'])->syncRoles([$admin]);;

        Permission::create(['name' => 'admin.roles.index', 'description' => 'ver listado de roles'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.roles.create', 'description' => 'crear rol'])->syncRoles([$admin]);;
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar rol'])->syncRoles([$admin]);;

        Permission::create(['name' => 'admin.roles.edit', 'description' => 'editar roles'])->syncRoles([$admin]);;
    }
}