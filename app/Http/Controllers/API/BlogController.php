<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogController extends Controller
{
   protected $blogRepository;
   public function __construct(BlogRepositoryInterface $blogRepository)
   {
      $this->blogRepository = $blogRepository;
   }
   public function index()
   {
      return new BlogCollection($this->blogRepository->getAll());
   }
   public function store(Request $request)
   {
      return new BlogResource($this->blogRepository->create($request->all()));
   }
   public function show($id)
   {
      return new BlogResource($this->blogRepository->find($id));
   }
   public function update(Request $request)
   {
      return new BlogResource(
         $this->blogRepository->update($request->id, $request->all())
      );
   }
   public function destroy($id)
   {
      return response()->json([
         'status' => true,
         'post' => new BlogResource($this->blogRepository->delete($id))
      ]);
   }
   public function search($title)
   {
      $request = $this->blogRepository->search($title);
      if (is_null($request)) {
         return response()->json('Data not found', 404);
      }
      return response()->json(BlogResource::collection($request));
   }
}
