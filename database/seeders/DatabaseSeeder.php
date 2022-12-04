<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domains\Branch\Models\Branch;
use App\Domains\Invoice\Models\Invoice;
use App\Domains\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         $user = User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => Hash::make('123456789')
         ]);

         $user->branches()->saveMany(
             Branch::factory(10)
                 ->hasUsers((int) range(0, 5))
                 ->create()
         );

         Branch::each(static fn (Branch $branch) => Invoice::factory()
             ->hasInvoiceLines((int) range(1, 5))
             ->create([
             'branch_id' => $branch->id,
         ]));
    }
}
