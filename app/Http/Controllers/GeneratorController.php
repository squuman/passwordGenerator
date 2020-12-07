<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GeneratorRequest;
use Illuminate\Support\Facades\Redirect;

class GeneratorController extends Controller
{
    public static function generatePassword(GeneratorRequest $data) {
        $difficult = $data->input('difficult');
        $length = $data->input('length');
        if ($difficult == 'easy')
            $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        elseif($difficult == 'medium')
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        else
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+<>?:"{}[],./;\'';

        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return redirect()->route('home')->with("password", implode($pass));
    }

    public static function generatePasswordApi($difficult,$length) {

        if ($difficult == 'easy')
            $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        elseif($difficult == 'medium')
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        else
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+<>?:"{}[],./;\'';

        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
    }
}
