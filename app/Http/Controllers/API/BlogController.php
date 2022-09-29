<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
   protected $blogRepository;
   public function __construct(BlogRepositoryInterface $blogRepository)
   {
      $this->blogRepository = $blogRepository;
   }
   public function index()
   {
      $comments = Blog::with('categories')->get();
      return response()->json($comments);
      //return new BlogCollection($this->blogRepository->getAll());
   }
   public function store(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'title' => 'required|min:10|max:255',
         'shortDetail' => 'required',
         'detail' => 'required',
         'thumb' => 'required',
         'status' => 'required|boolean',
         'datePublic' => 'required',
         'categoryId' => 'required|numeric',
      ], [
         'title.required' => 'Title không được để trống',
         'title.min' => 'Title phải nhiều hơn 10 ký tự',
         'title.max' => 'Title không được vượt quá 255 ký tự',
         'shortDetail.required' => 'shortDetail không được để trống',
         'detail.required' => 'Detail không được để trống',
         'thumb.required' => 'thumb không được để trống',
         'datePublic.required' => 'datePublic không được để trống',
         'categoryId.required' => 'Category không được để trống',
         'categoryId.numeric' => 'Category phải là dạng số',
         'status.required' => 'Public không được để trống',
         'status.boolean' => 'Public phải là dạng bolean(true, false)',
      ]);

      if ($validator->fails()) {
         return response()->json($validator->errors(), 402);
      }
      dd($request->all());
      return new BlogResource($this->blogRepository->create($request->all()));
   }
   public function show($id)
   {
      $comments = Blog::with('categories')->find($id);
      return response()->json($comments);
      //return new BlogResource($this->blogRepository->find($id));
   }
   public function update(Request $request)
   {
      // $validator = Validator::make($request->all(), [
      //    'title' => 'min:10|max:255',
      //    'status' => 'boolean',
      //    'datePublic' => 'date',
      //    'categoryId' => 'numeric',
      // ], [
      //    'title.min' => 'Title phải nhiều hơn 10 ký tự',
      //    'title.max' => 'Title không được vượt quá 255 ký tự',
      //    'datePublic.date' => 'datePublic không đúng định dạng ngày tháng',
      //    'categoryId.numeric' => 'Category phải là dạng số',
      //    'status.boolean' => 'Public phải là dạng bolean(true, false)',
      // ]);
      // if ($validator->fails()) {
      //    return response()->json($validator->errors(), 402);
      // }
      //dd($request->title);
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
