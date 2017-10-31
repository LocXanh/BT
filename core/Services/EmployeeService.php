<?php
namespace Core\Services;

use Core\Repositories\EmployeeRepositoryContract;

/**
* 
*/
class EmployeeService implements  EmployeeServiceContract
{

	protected $repository;
	
	function __construct(EmployeeRepositoryContract $repository)
	{
		# code...
		return $this->repository = $repository;
	}

	public function paginate()
	{
		return $this->repository->paginate();
	}


	  public function find($id)
    {
        return $this->repository->find($id);
    }
 
    public function store($data)
    {
        return $this->repository->store($data);
    }
 
    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }
 
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function list()
    {
    	return $this->repository->list();
    }
    public function listEmployeesOfDepartment($department_id)
    {
        return $this->repository->listEmployeesOfDepartment($department_id);
    }

    public function search($search)
    {
        return $this->repository->search($search);
    }
}