<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Testing\AssertionsTrait;


class EditEmployeeTest extends TestCase
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


     /**
     * test update success
     */
      public function testEmployee_update_success()
    {
        $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Update');
        $this->see('Xác nhận thông tin ');
        $this->press('OK');
        $this->seePageIs(route('notification'));
        $this->see('Update employee success ');
        $this->click('OK');
        $this->see('Employee');

    }

    /**
    * test email invalid format
    */
    public function testEmployee_update_notSucess_case1()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type('examl','email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Update');
        $this->see('Email field invalids format ');
    }



     /**
    * test email invalid format case1
    */
     public function testEmail_invalid_format_case2()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type('xmal@.com','email');
        $this->type($faker->address,'address');
        $this->type(rand(0,9999).'-'.rand(0,9999).'-'.rand(0,9999),'phone');
        $this->press('Update');
        $this->see('Email field invalids format');
    }

     /**
    * test phone invalid format case1
    */
     public function testPhone_invalid_format_case2()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type('098732','phone');
        $this->press('Update');
        $this->see('Phone field invalids format');
    }


    /**
    * test phone invalid format case2
    */
     public function testPhone_invalid_format_case1()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type('0998-233-1b','phone');
        $this->press('Update');
        $this->see('Phone field invalids format');
    }

    /**
    * test phone greather than 14 character
    */
     public function testPhone_greather_than_14_character()
    {
         $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->type($faker->name,'name');
        $this->type($faker->email,'email');
        $this->type($faker->address,'address');
        $this->type('0998-233-1111-11','phone');
        $this->press('Update');
        $this->see('Phone number can not too 14 character');
    }
}
    