<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




class HomeController extends Controller
{
    public function showWelcome() 
    {
        return view('welcome');
    }

    public function uppercase($word)
    {
    $data = [
    'word' => $word,
    'wordUpper' => strtoupper($word),
    ];
    return view('uppercase', $data);
    } 

    public function rolldice ($guess)
    {
    $roll = mt_rand(1,6);
    return view ('roll-dice')
        ->with("roll",  $roll)
        ->with("guess",  $guess);
    }

    public function increment($number = 0)
    {
        $number += 1;

        return view('increment') -> with('number', $number);
    }

}
