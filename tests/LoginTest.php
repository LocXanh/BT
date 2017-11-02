<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
     public function testExample()
    {
        $this->assertTrue(true);
    }


    /**
    * Test login success
    */
    public function testLoginSuccess()
    {
        $this->visit(route('login'));
	    $this->type('admin', 'loginID');
	    $this->type('12345678', 'password');
	    $this->press('Login');
	    $this->assertTrue(Auth::check());
	    $this->seePageIs(route('employees.index'));
    }

    /**
    * test password wrong
    */
     public function testPassword_wrong()
    {
        $this->visit(route('login'));
	    $this->type('admin', 'loginID');
	    $this->type('123456', 'password');
	    $this->press('Login');
	    $this->seePageIs(route('login'));
	    $this->see('LoginID or password not match !');
    }

    /**
    * test loginID wrong
    */
    public function testLoginID_wrong()
    {
        $this->visit(route('login'));
	    $this->type('admn', 'loginID');
	    $this->type('12345678', 'password');
	    $this->press('Login');
	    $this->seePageIs(route('login'));
	    $this->see('LoginID or password not match !');
    }

    public function testPassword_less_than_6_character()
    {
    	$this->visit(route('login'));
	    $this->type('admin', 'loginID');
	    $this->type('12346', 'password');
	    $this->press('Login');
	    $this->seePageIs(route('login'));
	    $this->see('Password must be at least 6 character');
    }

    public function testLoginID_greater_than_255_character()
    {
        $this->visit(route('login'));
	    $this->type('12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', 'loginID');
	    $this->type('12346', 'password');
	    $this->press('Login');
	    $this->seePageIs(route('login'));
	    $this->see(' greater than 255 characters');	
    }

    

}
