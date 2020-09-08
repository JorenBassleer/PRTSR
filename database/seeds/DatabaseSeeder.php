<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
