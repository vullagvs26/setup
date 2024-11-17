<?php
namespace App\Repositories ; 


use App\Models\Employee;

class EmployeeRepository {
    public $employee_model ;

    public function __construct(Employee $employee_model) {
        $this->employee_model = $employee_model; 
    }
    public function loadEmployees(){
        return $this->employee_model->with('sections')->get();
    }
    public function storeEmployee($data) {
        return $this->employee_model->create($data) ;
    }
    public function showEmployee($id) {
        return $this->employee_model->where("id", $id)->get();
    }
    public function updateEmployee($id, $data) {
        return $this->employee_model->where("id", $id)->update($data);
    }
    public function deleteEmployee($id) {
        return $this->employee_model->where("id", $id)->delete();
    }
}