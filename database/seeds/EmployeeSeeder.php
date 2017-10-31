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
        DB::table('employees')->delete();
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $index)
        {
            Employee::create([
                'name'  => $faker->name,
                'email'     => $faker->email,
                'avatar'    => '',
                'address'   => $faker->address,
                'is_delete' => '0',
                'phone'=> rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),
            ]);
        }
    }
}
