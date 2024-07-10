<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function register(Request $request): JsonResponse
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed'
            ]
        );

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return $this->sendResponse("Usuário registrado com sucesso", $user->createToken('API Token')->plainTextToken, 201);
    }

    public function get(Request $request): JsonResponse
    {
        if (!$request->user())
            return $this->sendError("Usuário não encontrado", 404);

        $user = User::findOrFail($request->user()->id);

        if ($user)
            return $this->sendResponse("Usuário encontrado com sucesso", $user);

        return $this->sendError("Usuário não encontrado", 404);
    }

    public function auth(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return $this->sendResponse(
                "Login realizado com sucesso.",
                Auth::user()->createToken('API Token')->plainTextToken
            );
        }

        return $this->sendError("Credenciais inválidas", 403);
    }

    public function update(UpdateUserRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();

        return $this->sendResponse("Usuário atualizado com sucesso.");
    }

    public function delete(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->delete();

        return $this->sendResponse("Usuário excluído com sucesso.");
    }
}
