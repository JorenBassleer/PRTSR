<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'shoes'
        ]);
        Type::create([
            'name' => 'jacket'
        ]);
        Type::create([
            'name' => 'hoodie'
        ]);
        Type::create([
            'name' => 'jeans'
        ]);
        Type::create([
            'name' => 'socks'
        ]);
        Type::create([
            'name' => 't-shirts'
        ]);
        Type::create([
            'name' => 'underwear'
        ]);
        Type::create([
            'name' => 'bra'
        ]);
        Type::create([
            'name' => 'belt'
        ]);
        Type::create([
            'name' => 'hat'
        ]);
    }
}
