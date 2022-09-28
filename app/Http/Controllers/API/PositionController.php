<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionCollection;
use App\Http\Resources\PositionResource;
use App\Repositories\Blog\PositionRepositoryInterface;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected $positionRepository;
    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }
    public function index()
    {
        return new PositionCollection($this->positionRepository->getAll());
    }
    public function store(Request $request)
    {
        return new PositionResource($this->positionRepository->create($request->all()));
    }
    public function show($id)
    {
        return new PositionResource($this->positionRepository->find($id));
    }
    public function update(Request $request)
    {
        return new PositionResource(
            $this->positionRepository->update($request->id, $request->all())
        );
    }
    public function destroy($id)
    {
        return response()->json([
            'status' => true,
            'post' => new PositionResource($this->positionRepository->delete($id))
        ]);
    }
    public function search($title)
    {
        $request = $this->positionRepository->search($title);
        if (is_null($request)) {
            return response()->json('Data not found', 404);
        }
        return response()->json(PositionResource::collection($request));
    }
}
