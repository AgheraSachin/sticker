<?php

namespace App\Repository\Interfaces;

interface trendingInterface
{


    public function getAll();

    public function add($data);

    public function delete($id);

    public function getById($id);

    public function update($data, $id);

    public function masterCall();
}
