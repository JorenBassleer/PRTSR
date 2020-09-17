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
            // Add random images
            $image = factory(App\Image::class, 3)->make();
            $product->images()->saveMany($image);
            // Add random materials
            $random_nbr_mat = rand(1,8);
            $product->materials()->attach($random_nbr_mat);
            // Add random type
            $random_nbr_type = rand(1,10);
            $product->types()->attach($random_nbr_type);
            
       });
    }
}
