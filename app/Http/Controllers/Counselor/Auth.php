<?php namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Services\CounselorRegistrar;
use Illuminate\Http\Request;

class Auth extends Controller
{

    public function login()
    {

    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
    }

    public function registerStore(CounselorRegistrar $registrar, Request $request)
    {
        $validator = $registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $registrar->create($request->all());
        Log::debug($user);

        return redirect($this->redirectPath());
    }

    public function redirectPath()
    {
        Log::debug($this->redirectPath);
        Log::debug($this->redirectTo);
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/counselor';
    }

}
