<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static $login_validation_rules=
    [
    'email'=>'required|email|exists:users',
    'password'=>'required'
    ];

   public static  $rules = [
                       'name' => 'Required|Max:100|',
        'email'     => 'Required|Between:3,64|Email|Unique:users',
    
        'password'  =>'Required',
        'cpassword'=>'Required'
        ];

 public function confirmEmail()
    {
        $this->confirmed = true;
        $this->token = null;
        $this->save();
    }
                # validation code
        }


