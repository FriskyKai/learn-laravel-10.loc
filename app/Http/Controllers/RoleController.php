<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Метод для отображения всего
    public function index() {
        $roles = Role::all();

        if (!$roles) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($roles)->setStatusCode(200);
    }
    // Метод для отображения текущего
    public function show($id) {
        $role = Role::find($id);

        if (!$role) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($role)->setStatusCode(200);
    }
    // Метод создания
    public function store(CreateRoleRequest $request) {
        $role = new Role($request->all());
        $role->save();

        return response()->json($role)->setStatusCode(201);
    }
    // Метод частичного обновления
    public function update(UpdateRoleRequest $request, $id) {
        $role = Role::find($id);

        if(!$role) {
            throw new ApiException(404, 'Not Found');
        }

        $role->update($request->all());
        return response()->json($role)->setStatusCode(200);
    }
    // Метод удаления
    public function destroy($id) {
        $role = Role::find($id);

        if(!$role) {
            throw new ApiException(404, 'Not Found');
        }

        Role::destroy($id);
        return response()->json()->setStatusCode(204);
    }
}
