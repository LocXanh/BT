<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use App\Employee;

class AddEmployeeTest extends TestCase
{
   
  
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    
    public function testEmployeeCreateSuccess()
    {
        $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.create'));
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Register');
        $this->see('Xác nhận thông tin nhân viên');
        $this->press('OK');
        $this->see('Register new employee success ');
        $this->click('OK');
        $this->see('Employee');
        
    }

   

    public function testEmail_invalid_format_case1()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.create'));
        $this->type($faker->name,'name');
        $this->type('xmal.com','email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Register');
        $this->see('Email field invalids format');
    }


     public function testEmail_invalid_format_case2()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.create'));
        $this->type($faker->name,'name');
        $this->type('xmal@.com','email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Register');
        $this->see('Email field invalids format');
    }

     public function testPhone_invalid_format_case2()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.create'));
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type('098732','phone');
        $this->press('Register');
        $this->see('Phone field invalids format');
    }
    //  public function testPhone_invalid_format_case3()
    // {
    //      $faker = Faker\Factory::create();
    //     $this->visit(route('login'));
    //     $this->type('admin', 'loginID');
    //     $this->type('12345678', 'password');
    //     $this->press('Login');
    //     $this->visit(route('employees.create'));
    //     $this->type($faker->name,'name');
    //     $this->type($faker->email,'email');
    //     $this->type($faker->address,'address');
    //     $this->type('0998-233-1b','phone');
    //     $this->press('Register');
    //     $this->see('Phone field invalids format');
    // }

     public function testPhone_greather_than_14_character()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.create'));
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type('0998-233-1111-11','phone');
        $this->press('Register');
        $this->see('Phone number can not too 14 character');
    }

}
