<?php 

namespace App\Services;

use App\Repositories\EmployeeRepository ; 

class EmployeeService { 
    public $employee_repository; 

    public function __construct(EmployeeRepository $employee_repository) {
        $this->employee_repository = $employee_repository;
    }

    public function loadEmployees(): array {
        $employees = $this->employee_repository->loadEmployees();
        $datastorage = [] ; 
        foreach ($employees as $employee) { 
            if(!empty($employee)){
                $full_name = $employee['last_name'] . ', ' .
                             $employee['first_name'] . ' ' .
                             $employee['middle_name'];

                $section =   $employee['sections']['section_code']. ', ' .
                             $employee['sections']['section_name']  ;     

                $datastorage [] = [
                    'id' => $employee['id'], 
                    'employee_id'=>$employee['employee_id'],
                    'full_name' => $full_name,
                    'section' => $section,

                ] ; 
            }
        }
        return $datastorage ; 
        
    }
    public function storeEmployee($data) {
        return $this->employee_repository->storeEmployee($data);
    }
    public function showEmployee($id) {
        return $this->employee_repository->showEmployee($id);
    }
    public function updateEmployee($id, $data) {
        return $this->employee_repository->updateEmployee($id, $data);
    }
    public function deleteEmployee($id) {
        return $this->employee_repository->deleteEmployee($id);
    }
}