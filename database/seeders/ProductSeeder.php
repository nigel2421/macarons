<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'White Chocolate Raspberry Macarons',
                'description' => 'A delightful combination of white chocolate and raspberry. Ingredients: Almond flour, sugar, egg whites, white chocolate, raspberry.',
                'image_urls' => json_encode([
                    '/images/macarons/white-chocolate-raspberry.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Per Piece', 'price' => 300],
                    ['option' => 'Box of 6', 'price' => 1800],
                    ['option' => 'Box of 10', 'price' => 3000],
                    ['option' => 'Box of 20 (10% discount)', 'price' => 5400],
                ]),
            ],
            [
                'name' => 'Milk Chocolate Peanut Paste Macarons',
                'description' => 'A rich and nutty macaron with milk chocolate and peanut paste. Ingredients: Almond flour, sugar, egg whites, milk chocolate, peanut paste.',
                'image_urls' => json_encode([
                    '/images/macarons/milk-chocolate-peanut-paste.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Per Piece', 'price' => 300],
                    ['option' => 'Box of 6', 'price' => 1800],
                    ['option' => 'Box of 10', 'price' => 3000],
                    ['option' => 'Box of 20', 'price' => 5400],
                ]),
            ],
            [
                'name' => 'Pistachio Macarons',
                'description' => 'A classic pistachio macaron with a rich, nutty flavor. Ingredients: Almond flour, sugar, egg whites, pistachio paste, buttercream.',
                'image_urls' => json_encode([
                    '/images/macarons/pistachio.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Per Piece', 'price' => 350],
                    ['option' => 'Box of 10', 'price' => 3500],
                    ['option' => 'Box of 30 (10% discount)', 'price' => 9450],
                ]),
            ],
            [
                'name' => 'Lemon Ganache and Lemon Gel Macarons',
                'description' => 'A zesty and refreshing macaron with lemon ganache and lemon gel. Ingredients: Almond flour, sugar, egg whites, lemon, white chocolate.',
                'image_urls' => json_encode([
                    '/images/macarons/lemon-ganache.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Per Piece', 'price' => 300],
                    ['option' => 'Box of 6', 'price' => 1800],
                    ['option' => 'Box of 10', 'price' => 3000],
                    ['option' => 'Box of 20 (10% discount)', 'price' => 5400],
                ]),
            ],
            [
                'name' => 'Coffee and Caramel Macarons',
                'description' => 'A perfect balance of coffee and caramel in a delicious macaron. Ingredients: Almond flour, sugar, egg whites, coffee, caramel.',
                'image_urls' => json_encode([
                    '/images/macarons/coffee-caramel.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Per Piece', 'price' => 300],
                    ['option' => 'Box of 6', 'price' => 1800],
                    ['option' => 'Box of 10', 'price' => 3000],
                    ['option' => 'Box of 20 (10% discount)', 'price' => 5400],
                ]),
            ],
            [
                'name' => 'Custom-Made Macarons',
                'description' => 'Create your own macaron flavor! Minimum 30 pieces required. Ingredients: Almond flour, sugar, egg whites, your choice of flavor.',
                'image_urls' => json_encode([
                    '/images/macarons/custom-made.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Box of 30 (10% discount)', 'price' => 9450],
                ]),
            ],
            [
                'name' => 'Assorted Flavored Macarons',
                'description' => 'A box of 30 macarons with a variety of 3 flavors. Minimum 30 pieces required. Ingredients: Almond flour, sugar, egg whites, assorted flavors.',
                'image_urls' => json_encode([
                    '/images/macarons/assorted-flavors.jpeg',
                ]),
                'prices' => json_encode([
                    ['option' => 'Box of 30 (10% discount)', 'price' => 8100],
                ]),
            ],
        ]);
    }
}
