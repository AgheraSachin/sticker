<?php

namespace App\Repository\Classes;

use App\category;
use App\Repository\Interfaces\categoryInterface;
use App\Repository\Interfaces\stickerInterface;
use App\Sticker;

class stickerRepo implements stickerInterface
{

    public function getAll()
    {
        $result = Sticker::with('category')->get()->toArray();
        return $result;
    }

    public function addSticker($data)
    {
        Sticker::create($data);
    }

    public function delete($id)
    {
        Sticker::destroy($id);
    }

    public function getById($id)
    {
        return Sticker::find($id);
    }

    public function update($data, $id)
    {
        $cate = Sticker::find($id);
        $cate->category_id = $data['category_id'];
        if (isset($data['sticker'])) {
            $cate->sticker = $data['sticker'];
        }
        $cate->save();
    }


}
