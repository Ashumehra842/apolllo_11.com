<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Event\UserCreated;
use App\Event\TestEvent;
class HomeController extends Controller
{
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }

    public function test()
    {
        return view('test');
    }

    public function myfun(){
        $email = 'ashumehra768@outlook.com';
        event(new UserCreated($email));
    }

    public function test12(){
        $var = "this is my test function for testing events";
        event(new TestEvent(ucwords($var)));
    }

    public function savetest(Request $request)
    {
        if ($request->hasFile('newimage')) {
     
            $image = $request->file('newimage');
            dd($image);
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            $this->save();
        
        return back()->with('success','Image Upload successfully');
        }
    }


    public function store(Request $request)
    {
    
     if ($request->hasFile('newimage')) {
     
            $image = $request->file('newimage');

            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            $this->save();
        
        return back()->with('success','Image Upload successfully');
        }

    }

}
