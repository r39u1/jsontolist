<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JsonToListRequest extends FormRequest
{
    protected const URL_REGEX = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    protected const RGB_SEMICOLONS_REGEX = '/^\(\d+;\d+;\d+\)$/';
    protected const RGB_COMMAS_REGEX = '/^\(\d+,\d+,\d+\)$/';
    protected const NUMBER_REGEX = '/^\d+$/';
    protected const MAX_REGEX = '/^max$/i';

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
            'json' => ['required', 'json'],
            'depth' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (
                        !preg_match(self::NUMBER_REGEX, $value) and
                        !preg_match(self::MAX_REGEX, $value) or
                        strval($value) === '0'
                    ) {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                }
            ],
            'background' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (
                        !isset($value['url']) and
                        !isset($value['rgb']) and
                        !is_null($value)
                    ) {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                }
            ]
        ];
    }

    protected function prepareForValidation()
    {
        if (preg_match(self::URL_REGEX, $this->background)) {
            $background['url'] = $this->background;
        } elseif (preg_match(self::RGB_COMMAS_REGEX, $this->background)) {
            $background['rgb'] = $this->background;
        } elseif (preg_match(self::RGB_SEMICOLONS_REGEX, $this->background)) {
            $background['rgb'] = str_replace(';', ',', $this->background);
        }

        if (isset($background)) {
            $this->merge([
                'background' => $background,
            ]);
        }
    }
}
