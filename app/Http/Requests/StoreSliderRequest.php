<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        /*         $post = $this->route()->parameter('post');
 */
        $slider = $this->route()->parameter('slider');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'

        ];
        if ($slider) {
            $rules['slug'] = 'required|unique:posts,slug,' .  $slider->id;
        }


        if ($this->status == 2) {
            $rules = array_merge(
                $rules,
                [
                    'category_id' => 'required',
                    'tags' => 'required',
                    'extract' => 'required',
                    'body' => 'required',

                ]

            );
        }


        return $rules;
    }
}
