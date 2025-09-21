<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ItemsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
        $this->call(RoomtypesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(RemindersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(UsersTableSeeder::class);



    }
}
