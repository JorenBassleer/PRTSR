<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 10)->create()->each(function($product) {
            $image = factory(App\Image::class, 3)->make();
            $product->images()->saveMany($image);
            $random_nbr_prod = rand(1,8);
            $product->materials()->attach($random_nbr_prod);
       });
    }
}
