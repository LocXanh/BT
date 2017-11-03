<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Http\Controllers\Controller;
use Core\Services\EmployeeServiceContract;
use App\Events\ViewEmployee;

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

    public function 


    public function register(EmployeeRequest $request)
    {
        $filename = NULL;
        if ($request->avatar!= null) {
            # code...
             $filename = $request->file('avatar')->getClientOriginalName();
             $request->file('avatar')->move('upload/image/avatar/',$filename);
        }
       
        return redirect()->route('employees.confirm-register')->with(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'avatar'=>$filename,'address'=>$request->address ]);

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
        $data = array(
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'avatar'   => $request->avatar,
        );

        $this->service->store($data);

        return redirect()->route('notification')->with([ 'notification'=>'Register new employee success !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $emp = $this->service->find($id);
        event(new ViewEmployee($emp));
        return view('employee.show',compact('emp',$emp));
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


    public function save(EditEmployeeRequest $request, $id)
    {
         $filename = NULL;
        if ($request->avatar!= null) {
            # code...
             $filename = $request->file('avatar')->getClientOriginalName();
            
             $request->file('avatar')->move('upload/image/avatar/',$filename);
        }

        return redirect()->route('employees.confirm-update',[$id])->with(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'avatar'=>$filename,'address'=>$request->address ]);
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
        try {

        DB::beginTransaction(); 
        $data = array(
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'avatar'   => $request->avatar,
        );

        $this->service->update($id,$data);
         DB::commit();
         return redirect()->route('notification')->with([ 'notification'=>'Update employee success !']);
           
       } catch (Exception $e) {
           DB::rollback();
           return redirect('notification')->with([ 'notification'=>'Update employee not success !']);
       }

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
        //
        try {

        DB::beginTransaction();
       
        $this->service->destroy($id);
         DB::commit();
         return redirect()->route('notification')->with([ 'notification'=>'Delete employee success !']);
           
       } catch (Exception $e) {
           DB::rollback();
           return redirect('notification')->with([ 'notification'=>'Delete employee not success !']);
       }
           
       
    }
    public function delete($id)
    {
        return redirect()->route('employees.confirm-delete',[$id]);
    }

 
}
