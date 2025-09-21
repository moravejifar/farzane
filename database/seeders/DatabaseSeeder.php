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
        $this->call(AttractionsTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(Miscellaneous_chargesTableSeeder::class);
        // $this->call(Room_typeTableSeeder::class);
        // $this->call(Room_statusTableSeeder::class);
        // $this->call(RoomsTableSeeder::class);
        $this->call(Facility_typeTableSeeder::class);
        $this->call(FacilityTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(Payment_typeTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(Job_typeTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(Miscellaneous_charges_addTableSeeder::class);
        $this->call(TimesheetTableSeeder::class);

    }
}
