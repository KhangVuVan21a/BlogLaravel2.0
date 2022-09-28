<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Repositories\Blog\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return new CategoryCollection($this->categoryRepository->getAll());
    }
    public function store(Request $request)
    {
        return new CategoryResource($this->categoryRepository->create($request->all()));
    }
    public function show($id)
    {
        return new CategoryResource($this->categoryRepository->find($id));
    }
    public function update(Request $request)
    {
        return new CategoryResource(
            $this->categoryRepository->update($request->id, $request->all())
        );
    }
    public function destroy($id)
    {
        return response()->json([
            'status' => true,
            'post' => new CategoryResource($this->categoryRepository->delete($id))
        ]);
    }
    public function search($title)
    {
        $request = $this->categoryRepository->search($title);
        if (is_null($request)) {
            return response()->json('Data not found', 404);
        }
        return response()->json(CategoryResource::collection($request));
    }
}
