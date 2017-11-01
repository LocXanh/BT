<?php
 namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $auth;
    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request){
            $login = array(
            'loginID' => $request->loginID,
            'password' => $request->password,

        );  
        
        if($this ->auth->attempt($login)){
            return redirect('/employees');
        }else{
            return redirect() ->back()->with([ 'flash_level'=>'danger', 'flash_message'=>'LoginID or password not match !','loginID' =>$request->loginID, 'password'=>$request->password]);
        }
        

    }


        public function getLogout()
        {
            $this->auth->logout();
            return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/auth/login');
        }

}

