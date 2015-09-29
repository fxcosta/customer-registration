<?php

namespace Candido\Service;

/**
 * Interface ServiceInterface
 * @package Candido\Service
 */
interface ServiceInterface
{
    /**
     * ShowAll
     *
     * @return mixed
     */
    public function showAll();

    /**
     * Show id
     *
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
    * Create
    *
    * @return bool
    */
    public function create();

    /**
     * Update
     *
     * @param $id
     * @return bool
     */
    public function update($id);

    /**
     * Delete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
