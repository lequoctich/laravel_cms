<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use App\Services\Admin\Shared\SettingService;

class ResetPasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
        public function __construct(SettingService $settingService) {
        $this->settingService = $settingService;
    }
    public function rules()
    {
        return [
        ];
    }

    /**
     * Custom error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
             ];
    }
}