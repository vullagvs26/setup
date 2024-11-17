<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Traits\ResponseTrait;
use App\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{
    use ResponseTrait;

    public $employee_service;

    public function __construct(EmployeeService $employee_service){
        $this->employee_service = $employee_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        $result = $this->successResponse(message: 'Load Success'); 
        try {
            $result['data'] = $this->employee_service->loadEmployees();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }    

        return $result; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $employee_request)
    {
        $result = $this->successResponse('Store Success') ; 
        try {
            $data = [
                'employee_id' => $employee_request['employee_id'],
                'first_name' => $employee_request['first_name'],
                'last_name' => $employee_request['last_name'],
                'middle_name' => $employee_request['middle_name'],
                'section_id' => $employee_request['section_id'],

            ];
            $this->employee_service->storeEmployee($data); 
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }
        return $result;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id): array
    {
        $result = $this->successResponse("Show Success");

        try {
            $result ['data']= $this->employee_service->showEmployee($id);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e) ;
        }
        return $result ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $employee_request, string $id)
    {
        $result = $this->successResponse("Update Success");
        try {
            $data = [
                'employee_id' => $employee_request['employee_id'],
                'first_name' => $employee_request['first_name'],
                'last_name' => $employee_request['last_name'],
                'middle_name' => $employee_request['middle_name'],
                'section_id' => $employee_request['section_id'],
                
            ]; 
            $this->employee_service->updateEmployee($id,$data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e) ;
        }
        return $result ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->successResponse("Deleted");

        try {
            $this->employee_service->deleteEmployee($id);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }
        return $result;
    }
}
