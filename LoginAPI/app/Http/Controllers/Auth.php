<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as OAuth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Login as LoginRequest;
use App\Http\Requests\Auth as AuthRequest;
use App\Events\NewRegister;
use App\Models\User;

class Auth extends Controller
{
    public function store(AuthRequest $req)
    {

        $data = $req->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->token = Str::random(60);
        $user->save();

        event(new NewRegister($user));

        return response()->json([
            'status' => 'success'
        ], 201);

    }

    public function login(LoginRequest $req)
    {

        $data = $req->validated();

        $data = [
            'email' => $req->email,
            'password' => $req->password,
            'active' => 1
        ];

        if (OAuth::attempt($data)) {

            $user = $req->user();

            $token = $user->createToken('accessToken')
            ->accessToken;

            return response()->json([
                'status' => 'success',
                'token' => $token
            ], 200);

        } else {

            return response()->json([
                'status' => 'error'
            ]);

        }

    }

    public function logout(Request $req)
    {

        $req->user()->token()->revoke();

        return response()->json([
            'status' => 'success'
        ]);

    }

    public function activate(int $id, string $token)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->token = $token) {
                $user->active = true;
                $user->token = '';
                $user->save();
                return view('registry.active', [
                    'user' => $user->name,
                    'email' => $user->email
                ]);
            }
        }
        return view('registry.error');
    }
}