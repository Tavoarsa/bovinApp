<?php

namespace BovinApp\Http\Requests;

use BovinApp\Http\Requests\Request;

class SaveFarmRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            'name'                   => 'required|max:100',
            'address'                => 'required|max:100',
            'agent'                  => 'required',
            'operationCertificate'   => 'required',
            'exploitation'           => 'required',
            'patent'                 => 'required'
        ];
    }
}
