<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = [
            [
                'name' => 'Pizza Singapur',
                'image' => '/pizzas/pizza1.jpeg',
                'price' => '5.95',
                'size' => '30 cm',
                'weight' => '580 g',
                'short_description' => 'Organic tomato, garlic, basil & oregano',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Arizona',
                'image' => '/pizzas/pizza2.jpeg',
                'price' => '6.95',
                'size' => '24 cm',
                'weight' => '345 g',
                'short_description' => 'Organic tomato, mozzarella & basil',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Tunis',
                'image' => '/pizzas/pizza3.jpeg',
                'price' => '7.5',
                'size' => '30 cm',
                'weight' => '470 g',
                'short_description' => 'Dry San Marzano tomatoes, roasted potatoes & onions, British mozzarella, Colston Bassett stilton and seasonal pesto [light tomato base]',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Adelaida',
                'image' => '/pizzas/pizza4.jpeg',
                'price' => '4',
                'size' => '30 cm',
                'weight' => '735 g',
                'short_description' => 'Roasted cured ham British mozzarella, ricotta & wild mushrooms',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Bergen',
                'image' => '/pizzas/pizza5.jpeg',
                'price' => '3.99',
                'size' => '30 cm',
                'weight' => '615 g',
                'short_description' => 'Organic tomato, garlic, oregano, capers, Kalamata black olives',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Madrid',
                'image' => '/pizzas/pizza6.jpeg',
                'price' => '8.5',
                'size' => '24 cm',
                'weight' => '355 g',
                'short_description' => 'Organic tomato, cured chorizo',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Barcelona',
                'image' => '/pizzas/pizza7.jpeg',
                'price' => '9.99',
                'size' => '30 cm',
                'weight' => '465 g',
                'short_description' => 'Traditional Neapolitan pork salami, wild broccoli, San Marzano tomato', 
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza Moscow',
                'image' => '/pizzas/pizza8.jpeg',
                'price' => '10.5',
                'size' => '30 cm',
                'weight' => '440 g',
                'short_description' => 'Colston Bassett stilton and seasonal pesto [light tomato base]',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pizza El-Paso',
                'image' => '/pizzas/pizza9.jpeg',
                'price' => '18.95',
                'size' => '24 cm',
                'weight' => '350 g',
                'short_description' => 'spicy lamb sausage or Yorkshire fennel sausage',
                'is_spicy' => rand(0, 1),
                'is_popular' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($pizzas as $pizza) {
            DB::table('pizzas')->insert($pizza);
        }
    }
}
