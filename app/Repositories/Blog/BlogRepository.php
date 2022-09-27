<?php
namespace App\Repositories\Blog;

use App\Repositories\BaseRepository;
use App\Models\Blog;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface{
    
/**
     * Get Model Post
     */
    public function getModel()
    {
        return Blog::class;
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