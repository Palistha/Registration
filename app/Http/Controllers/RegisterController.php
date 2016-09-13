<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;

use App\User;
use Input;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Mail\Mailer;
use Session;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $abc = DB::table('users')->orderBy('id','DESC')->get();
        
    
         return view('page.list',compact('abc'));


   }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      return view('register');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // echo '<pre>'; print_r($request->name); die();
        
 $this->validate($request, User:: $rules);
         $register = new User();
$register->name  = $request->name;
$register->email = $request->email;
$register->password = bcrypt( $request->password );
$register->token =  $request->token;

$register->remember_token = '';
 
$register->save();
//$mail->sendEmailConfirmationTo($register);
 
      
  

 //Session::flash('message', 'Successfully created register!');
return redirect('register/list')->with('status','Please confirm your email address');
}
    

  
      
      

    

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
       $register=User::find($id);
      return view('page.edit',compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    $registerUpdate=$request->all();
   $register=User::find($id);
   $register->update($registerUpdate);
   return redirect('register/list');
}
     

    
    public function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('register/list');
       

}




public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        flash('You are now confirmed. Please login.');
        return redirect('login');
    }



    function lists()
    {
        return view('register.list');
        
    }
}
