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

    public function employee_delete_success()
    {
    	$this->visit(route('employees.index'));
    	$this->press('Edit');
    	$this->seePageIs(route('employees.edit'));
        $this->press('Delete');
        $this->see('Confirm Delete');
        $this->press('Yes');
        $this->seePageIs(route('employees.index'));
        $this->see('Delete employee success ');
    }
}
