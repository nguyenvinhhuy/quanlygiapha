<?php

namespace App\Repositories;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

abstract class EloquentRepository implements RepositoryInterface

{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(Request $request)
    {

        return $this->_model->create($request);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update(Request $request)
    {
        $result = $this->find($request->input('id'));
        if ($result) {
            $result->update($request);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete(Request $request)
    {
        $result = $this->find($request->input('id'));
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}
