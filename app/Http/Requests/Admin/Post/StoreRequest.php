<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You must fill this column',
            'title.string' => 'Title must be string format',
            'content.string' => 'Title must be string format',
            'content.required' => 'You must fill this column',
            'preview_image.required' => 'You must fill this column',
            'preview_image.file' => 'You must select file',
            'main_image.required' => 'You must fill this column',
            'main_image.file' => 'You must select file',
            'category_id.required' => 'title required',
            'category_id.integer' => 'integer',
            'tag_ids.array' => 'tags must be in array'
        ];
    }
}
