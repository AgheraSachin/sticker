<?php

namespace App\Repository\Interfaces;

interface categoryInterface
{

    public function getAll();

    public function addCategory($data);

    public function delete($id);

    public function getCategoryById($id);

    public function update($data, $id);

    public function masterCall();
}
