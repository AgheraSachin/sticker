<?php

namespace App\Repository\Interfaces;

interface stickerInterface
{

    public function getAll();

    public function addSticker($data);

    public function delete($id);

    public function getById($id);

    public function update($data, $id);
}
