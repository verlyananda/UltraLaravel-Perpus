<?php

namespace App\Http\Requests;

class UpdateBookRequest extends StoreBookRequest
{
    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = 'required|unique:books,title,' . $this->route('book');
        return $rules;
    }
}

