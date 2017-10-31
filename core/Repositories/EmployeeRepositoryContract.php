<?php
namespace Core\Repositories;

interface EmployeeRepositoryContract
{
	public function paginate();
	public function find($id);
	public function store($data);
	public function update($id, $data);
	public function destroy($id);
	public function list();
	public function listEmployeesOfDepartment($department_id);
	public function search($data);
}