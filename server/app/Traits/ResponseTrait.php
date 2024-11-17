<?php

namespace App\Traits;

trait ResponseTrait
{
    public function returnResponse($result)
    {
        return response()->json($result);
    }

    public function successResponse($message)
    {
        return [
            'status'        => 'success',
            'status_code'   => 200,
            'message'       => $message,
        ];
    }

    public function modelNotFoundResponse($id)
    {
        return [
            'status'        => 'error',
            'status_code'   =>  404,
            'message'       => 'No Model Found',
            'errors'         => ['id' => $id.' this id was not found']
        ];
    }

    public function modelNotFoundResponseFromHRIS($empid)
    {
        return [
            'status'        => 'error',
            'status_code'   =>  404,
            'message'       => 'No Data in HRIS',
            'errors'         => ['emp_id' => $empid.' this employee number was not found in HRIS database']
        ];
    }

    public function errorResponseAuthentication($message)
    {
        return [
            'status'        => 'warning',
            'status_code'   => 500,
            'message'       => $message,
        ];
    }

    public function errorResponse($e)
    {
        return [
            'status'        => 'error',
            'status_code'   =>  500,
            'message'       => $e->getMessage(),
            'class'         => get_class($e),
            'errors'         => ['error' => 'Please contact the system developer']
        ];
    }

    public function failedValidationResponse($errors)
    {
        return [
            'status'        => 'warning',
            'status_code'   =>  400,
            'message'       => 'Validation Errors',
            'error'         => $errors
        ];
    }


}
