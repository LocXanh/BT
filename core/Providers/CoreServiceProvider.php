<?php

namespace Core\Providers;

use Illuminate\Support\ServiceProvider;
use Core\Repositories\EmployeeRepository;
use Core\Repositories\EmployeeRepositoryContract;
use Core\Services\EmployeeService;
use Core\Services\EmployeeServiceContract;
/**
* 
*/
class CoreServiceProvider extends ServiceProvider
{
	
	 public function boot()
    {
        //
    }


	public function register()
	{
		$this->app->bind(EmployeeRepositoryContract::class, EmployeeRepository::class);
		$this->app->bind(EmployeeServiceContract::class, EmployeeService::class);
	} 
}