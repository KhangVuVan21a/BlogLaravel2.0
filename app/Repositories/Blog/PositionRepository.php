<?php 
namespace App\Repositories\Blog;

use App\Models\Position;
use App\Repositories\BaseRepository;

class PositionRepository extends BaseRepository implements CategoryRepositoryInterface{
    /**
     * Get Model Post
     */
    public function getModel()
    {
        return Position::class;
    }

    /**
     * Search
     * @param $title
     * @param array $title
     * @return mixed
     */
    public function search($title){
        $result = $this -> model -> where('title', 'LIKE', '%'.$title.'%')->get();
        return $result;
    }
}