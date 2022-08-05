<?php

namespace App\Http\Requests;

use App\Enums\ProductStatusEnum;
use App\Models\Manufacture;
use Composer\DependencyResolver\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>['required','string'],
            'status'=>['required',
            Rule::exists(Manufacture::class, 'id'),
            ],
        ];
    }
}