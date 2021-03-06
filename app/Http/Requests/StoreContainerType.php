<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class StoreContainerType extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'POST':

            return [
            'name' => 'required|unique:container_types,name',
            'description' => 'max:50'
            ];

            break;
            
            case 'PUT':

            return [
            'name' => 'required| unique:container_types,name,'. $this->segment(3) ,
            'description' => 'max:50'
            ];

            break;
            
            default: break;
        }
    }

    //Overriding the response 422
    public function response(array $errors)
    {
        return Response::make(json_encode($errors), 200);
    }
}
