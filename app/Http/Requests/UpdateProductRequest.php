<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    { {
            return [
                "name" => "required|max:255|min:2",
                "description" => "required|max:1000|min:10",
                "image" => "nullable|file|image|mimes:jpg,png,jpeg|max:1024",
                "stock" => "required|numeric|min:0",
                "price" => "required|numeric|min:0",
                "supplier_id" => "required|exists:App\Models\Supplier,id",
            ];
        }
    }
}
