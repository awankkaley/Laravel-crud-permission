<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'delete categories']);

        //create roles and assign existing permissions
        $writerRole = Role::create(['name' => 'writer']);
        $writerRole->givePermissionTo('manage posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('manage categories');
        $adminRole->givePermissionTo('manage posts');

        // gets all permissions via Gate::before rule
        $superadminRole = Role::create(['name' => 'super-admin']);

        // $usersGeneral = User::factory(5)->create();

        $user =   User::factory()->create([
            'name' => 'Writer',
            'username' => 'awankkaley1',
            'email' => 'awank.kaley.10@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $user->assignRole($writerRole);

        $user = User::factory()->create([
            'name' => 'Admin',
            'username' => 'awankkaley2',
            'email' => 'awank.kaley.11@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'awankkaley3',
            'email' => 'awank.kaley.12@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $user->assignRole($superadminRole);

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();
    }
}
