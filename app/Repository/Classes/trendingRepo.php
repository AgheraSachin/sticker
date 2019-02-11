<?php

namespace App\Repository\Classes;

use App\category;
use App\Repository\Interfaces\trendingInterface;
use App\trending;

class trendingRepo implements trendingInterface
{
    public function getAll()
    {
       return trending::all();;
    }


    public function add($data)
    {
        trending::create($data);
    }

    public function delete($id)
    {
        trending::destroy($id);
    }

    public function getById($id)
    {
        return trending::find($id);
    }

    public function update($data, $id)
    {
        $cate = trending::find($id);
        $cate->filename = $data['filename'];
        $cate->save();
    }

    public function masterCall()
    {

        return category::with(['tray_icon', 'sticker'])->get()->toArray();
    }


}
