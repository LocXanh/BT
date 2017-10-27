<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Http\Controllers\Controller;
use Core\Services\EmployeeServiceContract;
use DB;

class EmployeesController extends Controller
{


    protected $service;


     public function __construct(EmployeeServiceContract $service)
    {
        # code...
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keyword = \Request::get('search');
        $emps = $this->service->search($keyword);
        return view('employee.list',compact('emps'))->with('employees',$emps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
       try {

        DB::beginTransaction();
        if ($request->avatar!= null) {
            # code...
             $file_name = $request->file('avatar')->getClientOriginalName();
             $request->file('avatar')->move('public/upload/image/avatar/',$file_name);
        }
        $file_name = '';
        $data = array(
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'is_delete'=>'0',
            'avatar'   =>$file_name,
        );

        $this->service->store($data);

        return redirect()->route('employees.index')->with([ 'flash_level'=>'success', 'flash_message'=>'Register new employee success !']);

        DB::commit();
           
       } catch (Exception $e) {
           DB::rollback();
           return redirect('/error')->with([ 'flash_level'=>'danger', 'flash_message'=>'Employee not save success to database !']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        // $emp = $this->service->find($id);
        // return view('employees.edit',compact('emp',$emp));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $emp = $this->service->find($id);
        return view('employee.edit',compact('emp',$emp));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmployeeRequest $request, $id)
    {
        //
        if ($request->avatar!= null) {
            # code...
             $file_name = $request->file('avatar')->getClientOriginalName();
             $request->file('avatar')->move('public/upload/image/avatar/',$file_name);
        }
        $file_name = '';
        $data = array(
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'is_delete'=>'0',
            'avatar'   =>$file_name,
        );

        $this->service->update($id,$data);
        return redirect()->route('employees.index')->with([ 'flash_level'=>'success', 'flash_message'=>'Update employee success !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            DB::beginTransaction();
            $this->service->destroy($id);
        
            return redirect()->route('employees.index')->with([ 'flash_level'=>'success', 'flash_message'=>'Delete employee success !']);
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
             return redirect('/error')->with([ 'flash_level'=>'success', 'flash_message'=>'Delete employee not success !']);
            
        }
        
        
       
    }
    public function delete($id)
    {
        $this->service->destroy($id);
        return redirect()->route('employees.index')->with([ 'flash_level'=>'success', 'flash_message'=>'Delete employee success !']);
    }
}
