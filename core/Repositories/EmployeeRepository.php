<?php 
namespace Core\repositories;

use App\Employee;

/**
* 
*/
class EmployeeRepository implements EmployeeRepositoryContract
{
	
	protected $emp;
	public function __construct(Employee $emp)
	{
		$this->emp = $emp;
	}

	public function list()
	{
		$emps = $this->emp->all();
		return $emps;
	}

	public function paginate()
	{
		# code...
		return $this->emp->paginate(10);
	}

	public function find($id)
	{
		# code...
		return $this->emp->findOrFail($id);
	}
	public function store($data)
	{
		return $this->emp->create($data);
	}
	 public function update($id, $data)
	{
		# code...
		$emp = $this->find($id);
		return $emp->update($data);
	}

	public function destroy($id){
		$emp = $this->find($id);
        return $emp->destroy($id);
	}
	public function listEmployeesOfDepartment($department_id)
	{
		$emps = $this->emp->where('department_id',$department_id)->paginate(10);
		return $emps;
	}

	public function search($keyword){
		$emps = $this->emp->where('name', 'LIKE', '%'.$keyword.'%')->paginate(10);
		return $emps;
	}
}