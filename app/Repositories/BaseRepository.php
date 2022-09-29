<?php
namespace App\Repositories;
abstract class BaseRepository  implements RepositoryInterface
{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    public function setModel(){
        $this->model= app()->make($this->getModel());
    }
    public function getAll($attributes= []){
        if(empty($attributes['s']))
        {
            return $this->model->all();
        }
        else{
            $attributes['s']='';
        }
        return $this->model->where('title','like','%'.$attributes['s'].'%')->get(); 
    }
    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

     /**
     * Create
     * @param array $attribute
     * @return mixed
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function update($id, $attribute = [])
    {
        $result = $this->model->find($id);
        if($result)
        {
            $result->update($attribute);
            $result->save();
            return $result;
        }

        return false;
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if($result)
        {
            $result->delete();
            return $result;
        }
        return false;
    }
}
