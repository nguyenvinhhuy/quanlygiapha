<?php

namespace App\Repositories\Person;
use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;

interface PersonInterface extends RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    // public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(Request $request);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(Request $request);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete(Request $request);
}