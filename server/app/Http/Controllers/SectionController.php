<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SectionService;
use App\Traits\ResponseTrait;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    use ResponseTrait;

    public $section_service;
    
    public function __construct(SectionService $section_service){
         $this->section_service = $section_service;
    }

    public function index()
    {
        $result = $this->successResponse('Load Success'); 
        try {
            $result['data'] = $this->section_service->loadSections();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }    

        return $result; 
    }
    
    public function store(SectionRequest $section_request)
    {
        $result = $this->successResponse('Store Success') ; 
        try {
            $data = [
                'section_code' => $section_request['section_code'],
                'section_name' => $section_request['section_name'],
            ];
            $this->section_service->storeSection($data); 
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }
        return $result;
    }
    
    public function show(string $id)
    {
        $result = $this->successResponse("Show Success");

        try {
            $result ['data']= $this->section_service->showSection($id);
    } catch (\Exception $e) {
            $result = $this->errorResponse($e) ;
        }
        return $result ; 
    }

    public function update(SectionRequest $section_request, string $id)
    {
        $result = $this->successResponse("Update Success");
        try {
            $data = [   
                'section_code' => $section_request['section_code'],
                'section_name' => $section_request['section_name'],
            ]; 
            $this->section_service->updateSection($id,$data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e) ;
        }
        return $result ; 
    }

    public function destroy(string $id)
    {
        $result = $this->successResponse("Deleted");

        try {
            $this->section_service->deleteSection($id);
        } catch (\Exception $e) {
            $result = $this->errorResponse( $e);
        }
        return $result;
    }

}
