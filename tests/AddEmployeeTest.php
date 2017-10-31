<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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


    public function employee_register_success()
    {
    	$this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xxx@mail.com','email');
        $this->type('ABC','address');
        $this->type('0999-1133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->press('OK');
        $this->seePageIs(route('employees.index'));
        $this->see('Register new employee success ');
    }
    public function employee_register_success_case2()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xxx@m','email');
        $this->type('ABC','address');
        $this->type('0999-1133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->press('OK');
        $this->seePageIs(route('employees.index'));
        $this->see('Register new employee success ');
    }

    public function employee_register_success_case3()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xxx@mail.com','email');
        $this->type('ABC','address');
        $this->type('0-1-3','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->press('OK');
        $this->seePageIs(route('employees.index'));
        $this->see('Register new employee success ');
    }
    public function employee_register_success_case4()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xxx@mail.com','email');
        $this->type('ABC','address');
        $this->type('09-1133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->press('OK');
        $this->seePageIs(route('employees.index'));
        $this->see('Register new employee success ');
    }

    public function email_invalid_format_case1()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail.com','email');
        $this->type('ABC','address');
        $this->type('0999-1133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        // $this->press('OK');
        // $this->seePageIs(route('employees.create'));
        $this->see('Vui lòng khớp với định dạng được yêu cầu ');
       $this->dontSee('Register new employee success');
    }
    public function email_invalid_format_case2()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@','email');
        $this->type('ABC','address');
        $this->type('0999-1133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu ');
    }





     public function phone_greather_than_14_character()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@gmail.com','email');
        $this->type('ABC','address');
        $this->type('0999111133-3333','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu');
    }

    public function phone_invalid_format_case1()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@a','email');
        $this->type('ABC','address');
        $this->type('0999-1133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu');
        
    }

    public function phone_invalid_format_case4()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@a','email');
        $this->type('ABC','address');
        $this->type('0999-1133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu');
    }
    public function phone_invalid_format_case2()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@a','email');
        $this->type('ABC','address');
        $this->type('09990001133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu');
    }

    public function phone_invalid_format_case3()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('xmail@a','email');
        $this->type('ABC','address');
        $this->type('0d990001133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->see('Vui lòng khớp với định dạng được yêu cầu');
    }

    public function name_greather_than_255_character()
    {
        $this->visit(route('employees.create'));
        $this->type('12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890','name');
        $this->type('dddd@fmal.com','email');
        $this->type('ABC','address');
        $this->type('0d990001133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
         $this->seePageIs(route('employees.create'));
    }
    public function email_greather_than_255_character()
    {
        $this->visit(route('employees.create'));
        $this->type('ABC','name');
        $this->type('12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789@012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890.','email');
        $this->type('ABC','address');
        $this->type('0d990001133','phone');
        $this->type('aaaa.jpg','avatar');
        $this->press('Register');
        $this->press('OK');
        $this->seePageIs(route('employees.create'));
        $this->see('Email can not too 255 character');
    }

}
