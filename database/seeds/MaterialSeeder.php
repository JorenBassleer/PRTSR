<?php

use Illuminate\Database\Seeder;
use App\Material;
class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'name' => 'denim'
        ]);
        Material::create([
            'name' => 'leather'
        ]);
        Material::create([
            'name' => 'flax'
        ]);
        Material::create([
            'name' => 'cotton'
        ]);
        Material::create([
            'name' => 'wool'
        ]);
        Material::create([
            'name' => 'ramie'
        ]);
        Material::create([
            'name' => 'silk'
        ]);
        Material::create([
            'name' => 'fur'
        ]);
    }
}
