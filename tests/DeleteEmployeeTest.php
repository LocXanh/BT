<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteEmployeeTest extends TestCase
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


    public function testEmployee_delete_success()
    {
    	 $faker = Faker\Factory::create();
        $this->visit(route('login'));
        $this->type('admin', 'loginID');
        $this->type('12345678', 'password');
        $this->press('Login');
        $this->visit(route('employees.index'));
        $this->click('Edit');
        $this->see('Edit');
        $this->click('Delete');
        $this->see('Ấn nút OK để xóa thông tin từ DB');
        $this->press('OK');
        $this->seePageIs(route('notification'));
        $this->see('Delete employee success ');
        $this->click('OK');
        $this->seePageIs(route('employees.index'));
    }
}
