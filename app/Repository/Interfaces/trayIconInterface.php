<?php

namespace App\Repository\Interfaces;

interface trayIconInterface
{

    public function getAll();

    public function addTrayIcon($data);

    public function delete($id);

    public function getById($id);

    public function update($data,$id);

}
