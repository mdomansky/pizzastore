<?php

use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryoptions = [
            [
                'name' => '10:00 - 20:00',
                'cost' => 4.75,
            ],
            [
                'name' => '10:00 - 14:00',
                'cost' => 7.75,
            ],
            [
                'name' => '14:00 - 20:00',
                'cost' => 8.75,
            ],
            [
                'name' => '14:00 - 16:00',
                'cost' => 9.99,
            ],
        ];
        foreach ($deliveryoptions as $option) {
            DB::table('deliveryoptions')->insert($option);
        }
    }
}
