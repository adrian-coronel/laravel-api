<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(25) # 25 clientes
            ->hasInvoices(10) #10 facturas cada uno
            ->create();

        Customer::factory()
            ->count(100) # 25 clientes
            ->hasInvoices(5) #10 facturas cada uno
            ->create();

        Customer::factory()
            ->count(100) # 25 clientes
            ->hasInvoices(3) #10 facturas cada uno
            ->create();

        # Clientes sin factura
        Customer::factory()
            ->count(5) # 25 clientes
            ->create();
    }
}
