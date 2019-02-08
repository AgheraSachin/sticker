<?php

namespace App\Repository\Classes;

use App\category;
use App\Repository\Interfaces\trayIconInterface;
use App\Tray_icon;

class trayIconRepo implements trayIconInterface
{

    public function getAll()
    {
        $result = Tray_icon::with(['category'])->get()->toArray();
        return $result;
    }

    public function addTrayIcon($data)
    {
        Tray_icon::create($data);
    }

    public function delete($id)
    {
        Tray_icon::destroy($id);
    }

    public function getById($id)
    {
        return Tray_icon::find($id);
    }

    public function update($data, $id)
    {
        $icon = Tray_icon::find($id);
        $icon->category_id = $data['category_id'];
        if (isset($data['icon_name'])) {
            $icon->icon_name = $data['icon_name'];
        }
        $icon->save();

    }


}
