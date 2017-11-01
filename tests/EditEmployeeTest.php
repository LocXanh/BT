<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

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

      public function employee_update_success()
    {
    	// $this->visit(route('employees.index'));
    	// $this->press('edit');
     //     $this->seePageIs(route('employees.edit'));
     //    $this->type('ABC','name');
     //    $this->type('xxx@mail.com','email');
     //    $this->type('ABC','address');
     //    $this->type('0999-1133-3333','phone');
     //    $this->type('aaaa.jpg','avatar');
     //    $this->press('Save');
     //    $this->seePageIs(route('employees.index'));
     //    $this->see('Update employee success ');
        $this->WithoutMiddleware();
        $this->be(User::first());
        $data = [
            'name' => 'Uyên',
            'email' => 'nguyenuyen2309@gmail.com'
        ];
        $this->route('POST','employees.update',$data);
        $this->assertRedirectedToRoute('notification');
        $this->seeInDatabase('employees',['name' => 'Uyên']);

    }
}
    