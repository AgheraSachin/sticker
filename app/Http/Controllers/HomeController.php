<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\categoryInterface;
use App\Repository\Interfaces\matchInterface;
use App\Repository\Interfaces\teamInterface;
use App\Repository\Interfaces\contestInterface;
use App\Repository\Interfaces\participateUserInterface;


class HomeController extends Controller
{
    private $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
