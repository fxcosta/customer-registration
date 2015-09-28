<?php

namespace Candido\Service;

interface ServiceInterface
{
    public function showAll();

    public function show($id);

    public function create();

    public function update($id);

    public function delete($id);
}