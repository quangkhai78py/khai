<?php
namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    /**
     * @function Create function.
     * @description Insert into database.
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @function Update record
     * @description Update record in database by id
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * @function Get all data from database.
     * @description Get all data from database.
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all()->toArray();
    }

    /**
     * @function Get record by id.
     * @description Get record by id.
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @function Delete record in database by id.
     * @description Delete record in database by id.
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}
