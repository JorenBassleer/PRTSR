<?php

use Illuminate\Database\Seeder;
use App\Gender;
class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => 'm'
        ]);
        Gender::create([
            'name' => 'f'
        ]);
        Gender::create([
            'name' => 'u'
        ]);
    }
}
