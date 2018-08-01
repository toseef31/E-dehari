<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DhrUser;
use App\Models\Worker;
use App\Models\UserInfo;
use DB;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if($request->session()->has('u_session')){
    $userType = $request->session()->get('u_session');
        if ($userType->type == "individual") {
          return redirect('/accounts/individual');
        }elseif ($userType->type == "shop") {
          return redirect('/accounts/franchise');
        }elseif ($userType->type == "company") {
          return redirect('/accounts/company');
        }
      }else {
        return view('accounts.signup');
      }

    }


    public function login_route(Request $request)
    {
      if($request->session()->has('u_session')){
    $userType = $request->session()->get('u_session');
        if ($userType->type == "individual") {
          return redirect('/accounts/individual');
        }elseif ($userType->type == "shop") {
          return redirect('/accounts/franchise');
        }elseif ($userType->type == "company") {
          return redirect('/accounts/company');
        }
      }else {
        return view('accounts.login');
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator =  $this->validate($request,[
    'phone' => 'required|unique:dhr_users,phone',
    'password' => 'required|min:6'
  ]);

      $user = new DhrUser;
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = md5($request->input('password'));
      $user->type = $request->input('type');

      $user->save();
      return redirect('/accounts/login')->with('success','You are successfully Registered');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Login Function
public function login(Request $request)
{
  $phone  = $request->input('phone');
  $password = md5($request->input('password'));
  // dd($request->all());
  $user1 = DhrUser::wherephone($phone)->first();

  if (!empty($user1->phone)) {
    if ($phone == $user1->phone) {
      if ($password == ($user1->password)) {
        $request->session()->put('u_session', $user1);
        // $request->session()->put('type', $user1->type);
        // $request->session()->put('name', $user1->name);
        $val = $request->session()->get('u_session');

        $user = DhrUser::find($val->userId);
        // $message = "you are successfully logged in";
        // $request->session()->put('success', "you are successfully logged in");
        if ($user->type == "individual") {
          return redirect('/accounts/individual');
        }elseif ($user->type == "shop") {
          // return view('accounts.franchise', compact('user'));
          return redirect('/accounts/franchise');

        }elseif ($user->type == "company") {
          // return view('accounts.franchise', compact('user'));
          return redirect('/accounts/company');

        }

        // return view('index', compact('user'));

      }else {
        return redirect('/login')->with('red-alert', 'Incorrect Password');
      }
    }
    }else {
      return redirect('/login')->with('red-alert', 'Incorrect Phone');
  }
}


public function Logout()
{
  session()->flush();
  session()->forget('u_session');
  return redirect('/accounts/login');
}



}