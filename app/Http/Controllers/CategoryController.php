<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Метод для отображения всего
    public function index() {
        $categories = Category::all();

        if (!$categories) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($categories)->setStatusCode(200);
    }
    // Метод для отображения текущего
    public function show($id) {
        $category = Category::find($id);

        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }

        return response()->json($category)->setStatusCode(200);
    }
    // Метод создания
    public function store(CreateCategoryRequest $request) {
        $category = new Category($request->all());
        $category->save();

        return response()->json($category)->setStatusCode(201);
    }
    // Метод частичного обновления
    public function update(UpdateCategoryRequest $request, $id) {
        $category = Category::find($id);

        if(!$category) {
            throw new ApiException(404, 'Not Found');
        }

        $category->update($request->all());
        return response()->json($category)->setStatusCode(200);
    }
    // Метод удаления
    public function destroy($id) {
        $category = Category::find($id);

        if(!$category) {
            throw new ApiException(404, 'Not Found');
        }

        Category::destroy($id);
        return response()->json()->setStatusCode(204);
    }
}
