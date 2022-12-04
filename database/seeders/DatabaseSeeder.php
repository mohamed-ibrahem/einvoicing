<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domains\Branch\Models\Branch;
use App\Domains\Invoice\Models\Invoice;
use App\Domains\Invoice\Models\InvoiceLine;
use App\Domains\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        $admin = User::factory([
            'name' => 'Super admin',
            'email' => 'admin@system.app',
            'password' => Hash::make('123456789')
        ])->create();

        Branch::factory()
            ->has(User::factory()->count(random_int(5, 30)))
            ->has(
                Invoice::factory()->count(random_int(25, 100))->has(InvoiceLine::factory()->count(random_int(5, 10)))
            )
            ->count(random_int(10, 50))
            ->create();

        $admin->branches()->attach(Branch::first());
    }
}
