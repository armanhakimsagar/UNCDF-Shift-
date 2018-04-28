<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GenderTypes::class);
        $this->call(LocationType::class);
        $this->call(Gender::class);
        $this->call(ResourceTypeSeeder::class);
        $this->call(BusinessType::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BusinessTypes::class);
    }
}