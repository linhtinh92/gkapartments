<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\UserRepository;
use App\Repositories\CheckoutRepository;
use Flash;
use Auth;


class DashboardController extends Controller
{
    public function __construct(
        UserRepository $userRepository,
        CheckoutRepository $checkoutRepository)
    {
        $this->userRepository = $userRepository;
        $this->checkoutRepository = $checkoutRepository;
    }

    public function backendLogin()
    {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {
        $user = $this->userRepository->findByField('username', $request->username)->first();

        if ($user) {
            $credentials = array(
                'username' => $request->username,
                'password' => $request->password
            );
            if (Auth::guard('admin')->attempt($credentials)) {

                return redirect()->route('admin.dashboards.dashboard');
            } else {
                Flash::error('Password do not match !');
                return redirect()->route('admin.login');
            }
        } else {
            Flash::error('Username does not exist !');
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $checkouts = $this->checkoutRepository->findByField('status',0);
        return view('backend.dashboard.index',compact('checkouts'));
    }
}
