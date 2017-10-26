<?php

namespace Core\Services;

interface EmployeeServiceContract
{
	public function paginate();
	public function find($id);
	public function store($data);
	public function update($id, $data);
	public function destroy($id);
	public function list();
	public function search($search);
}