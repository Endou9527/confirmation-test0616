<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'description' => 'required|string',
            'season' => 'required|array',
            'image' => 'nullable|image|max:2048'
        ];
    }

    public function messages()
    {
        return[        
        'name.required' => '商品名を入力してください',
        'price.required' => '値段を入力してください',
        'price.integer' => '数値で入力してください',
        'price.min' => '0〜10,000円以内で入力してください',
        'price.max' => '0〜10,000円以内で入力してください',
        'season_id.required' => '季節を選択してください',
        'image.required' => '商品画像を登録してください',
        'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
        'description.required' => '商品説明を入力してください',
        'description.max' => '120文字以内で入力してください',
        ];
    }

}
