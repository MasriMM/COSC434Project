<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Supplement;
use App\Models\Order;
use Carbon\Carbon;

class OrderSupplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplementIds = Supplement::pluck('id')->toArray();
        $orderIds = Order::pluck('id')->toArray();

        foreach ($orderIds as $orderId) {
            $supplementCount = rand(1, 3); // each order has 1–3 supplements

            $selectedSupplements = collect($supplementIds)->random($supplementCount);

            foreach ($selectedSupplements as $supplementId) {
                $quantity = rand(1, 5);
                $price = Supplement::find($supplementId)->price;
                $subTotal = $price * $quantity;

                DB::table('order_supplements')->insert([
                    'order_id' => $orderId,
                    'supplement_id' => $supplementId,
                    'quantity' => $quantity,
                    'subTotal' => $subTotal,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}

