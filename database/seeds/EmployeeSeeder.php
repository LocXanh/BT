<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $index)
        {
            Employee::create([
                'name'  => $faker->name,
                'email'     => $faker->email,
                'avatar'    => '',
                'address'   => $faker->address,
                'is_delete' => '0',
                'phone'=> $faker->phoneNumber
            ]);
        }
    }
}
