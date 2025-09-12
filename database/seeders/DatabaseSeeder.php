<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Cart::factory(10)->create()
        //     ->each(function($cart){
        //         User::factory(1)->for($cart)->create()
        //             ->each(function ($user){
        //                 Order::factory(1)->for($user)->create();
        //             });
        //      });

        // Product::factory(12)->create();


    }
}
