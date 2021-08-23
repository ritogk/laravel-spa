<?php
namespace App\UseCases\Auth\Front;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterAction{
    use RegistersUsers;

    /**
     * __invoke
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return response()->json(['message' => '成功'], 200);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'self_pr' => $data['self_pr'],
            'tel' => $data['tel'],
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
