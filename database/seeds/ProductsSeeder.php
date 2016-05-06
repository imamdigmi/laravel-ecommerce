<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample category
        $shoes = Category::create(['title' => 'Shoes']);
        $shoes->childs()->saveMany([
            new Category(['title' => 'Lifestyle']),
            new Category(['title' => 'Running']),
            new Category(['title' => 'Basketball']),
            new Category(['title' => 'Soccer']),
        ]);

        $clothes = Category::create(['title' => 'Clothes']);
        $clothes->childs()->saveMany([
            new Category(['title' => 'Blazer']),
            new Category(['title' => 'Hoodie']),
            new Category(['title' => 'Vest']),
        ]);

        // sample product
        $running = Category::where('title', 'Running')->first();
        $lifestyle = Category::where('title', 'Lifestyle')->first();
        $shoes1 = Product::create([
            'name' => 'Nike Air Force',
            'model' => 'Man Shoes',
            'photo' => 'stub-shoe.jpg',
            'price' => 340000
        ]);
        $shoes2 = Product::create([
            'name' => 'Nike Air Max',
            'model' => 'Sepatu Wanita',
            'photo' => 'stub-shoe.jpg',
            'price' => 440000
        ]);
        $shoes3 = Product::create([
            'name' => 'Nike Air Zoom',
            'model' => 'Sepatu Wanita',
            'photo' => 'stub-shoe.jpg',
            'price' => 370000
        ]);
        $running->products()->saveMany([$shoes1, $shoes2, $shoes3]);
        $lifestyle->products()->saveMany([$shoes1, $shoes2]);

        $blazer = Category::where('title', 'Blazer')->first();
        $vest = Category::where('title', 'Blazer')->first();
        $blazer1 = Product::create([
            'name' => 'Nike Aeroloft Bomber',
            'model' => 'Blazer Women',
            'photo' => 'stub-jacket.jpg',
            'price' => 720000
        ]);
        $blazer2 = Product::create([
            'name' => 'Nike Guild 550',
            'model' => 'Blazer Man',
            'photo' => 'stub-jacket.jpg',
            'price' => 380000
        ]);
        $blazer3 = Product::create([
            'name' => 'Nike SB Steele',
            'model' => 'Blazer Man',
            'photo' => 'stub-jacket.jpg',
            'price' => 1200000
        ]);
        $blazer->products()->saveMany([$blazer1, $blazer3]);
        $vest->products()->saveMany([$blazer2, $blazer3]);

        // Copy image sample to public folder
        $from = database_path('seeds' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);
        $to = public_path('img' . DIRECTORY_SEPARATOR);
        File::copy($from . 'stub-jacket.jpg', $to . 'stub-jacket.jpg');
        File::copy($from . 'stub-shoe.jpg', $to . 'stub-shoe.jpg');
    }
}
