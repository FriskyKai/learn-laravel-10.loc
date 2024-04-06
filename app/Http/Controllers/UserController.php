<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Метод для отображения всего
    public function index() {
        $users = User::all();

        if (!$users) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($users)->setStatusCode(200);
    }
    // Метод для отображения текущего
    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($user)->setStatusCode(200);
    }
    // Метод создания
    public function store(CreateUserRequest $request) {
        $user = new User($request->all());
        $user->role_id = Role::where('code', 'user')->first()->id;
        $user->save();

        return response()->json($user)->setStatusCode(201);
    }
    // Метод частичного обновления
    public function update(UpdateUserRequest $request, $id) {
        $user = User::find($id);

        if(!$user) {
            throw new ApiException(404, 'Not Found');
        }

        $user->update($request->all());
        return response()->json($user)->setStatusCode(200);
    }
    // Метод удаления
    public function destroy($id) {
        $user = User::find($id);

        if(!$user) {
            throw new ApiException(404, 'Not Found');
        }

        User::destroy($id);
        return response()->json()->setStatusCode(204);
    }
}
