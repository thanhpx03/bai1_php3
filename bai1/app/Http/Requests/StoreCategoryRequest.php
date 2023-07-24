<?php

namespace App\Http\Requests;
use  App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $tablename= (new Category())->getTable();
        return [
            'name' =>"required|string|max:50|unique:$tablename",
            'mota' =>['nullable','string','max:200'],
            
        ];
    }
}
