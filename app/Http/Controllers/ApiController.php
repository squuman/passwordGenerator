<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class ApiController extends Controller
{

    public function getData($diff,$length) {
        if ($this->validateDiff($diff) == false)
            return ['error' => 'Difficult must be easy,middle or hard'];
        if($this->validateLength($length) == false)
            return ['error' => 'length must me number ' . $length];

        $password = GeneratorController::generatePasswordApi($diff,$length);

        return [
            'success' => 1,
            'result' => [
                'password' => $password
            ]
        ];
    }

    private function validateDiff($diff) {
        if (in_array($diff,['easy','middle','hard']))
            return true;
        else
            return false;
    }

    private function validateLength($length) {
        if (is_numeric($length))
            return true;
        else
            return false;
    }

}
