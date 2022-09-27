<?php
namespace App\Repositories\Blog;

use App\Repositories\RepositoryInterface;

interface PositionRepositoryInterface extends RepositoryInterface
{
    /**
     * Search
     * @param $title
     * @return mixed
     */
    public function search($title);
}