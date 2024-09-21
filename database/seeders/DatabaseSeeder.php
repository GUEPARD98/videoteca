<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Llamada a los seeders adicionales si existen
        $this->call(RolSeeder::class);

        // Crear usuarios con roles asignados
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $bloggerRole = Role::firstOrCreate(['name' => 'Blogger']);

        User::updateOrCreate(
            ['email' => 'amurillo23615@gmail.com'],
            [
                'name' => 'Andres Murillo',
                'password' => bcrypt('12345678')
            ]
        )->assignRole($adminRole);

        User::updateOrCreate(
            ['email' => 'alvah35@example.com'],
            [
                'name' => 'Henner Rivas Berrio',
                'password' => bcrypt('12345678')
            ]
        )->assignRole($bloggerRole);

        // Crear categorías
        Category::updateOrCreate(
            ['id' => 1],
            ['name' => 'Articulos', 'slug' => 'articulos']
        );
        Category::updateOrCreate(
            ['id' => 2],
            ['name' => 'Sliders', 'slug' => 'sliders']
        );
        Category::updateOrCreate(
            ['id' => 3],
            ['name' => 'Educacion', 'slug' => 'educacion']
        );
        Category::updateOrCreate(
            ['id' => 4],
            ['name' => 'Convocatoria', 'slug' => 'convocatoria']
        );
        Category::updateOrCreate(
            ['id' => 5],
            ['name' => 'Contratacion', 'slug' => 'contratacion']
        );
    }
}
