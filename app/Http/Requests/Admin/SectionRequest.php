<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name'=>'required|max:255',
            'section_icon_id'=>'required|exists:section_icons,id',
            'tag_id'=>'required|array',
            'tag_id.*'=>'required|exists:section_icons,id',
            'description'=>'required|max:255',  
            'keywords'=>'nullable|max:1000',
            // 'suitable_for'=>'nullable|max:1000',
            // 'service_overview'=>'nullable|max:1000',
            // 'not_include'=>'nullable|max:1000',
            // 'items_back'=>'nullable|max:1000',
            // 'prepare_collection'=>'nullable|max:1000',           
        ];
    }
}
