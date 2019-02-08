<?php

namespace App\Repository\Classes;

use App\category;
use App\Repository\Interfaces\categoryInterface;

class categoryRepo implements categoryInterface
{

    public function getAll()
    {
        $result = category::get()->toArray();
        return $result;
    }

    public function addCategory($data)
    {
        category::create($data);
    }

    public function delete($id)
    {
        category::destroy($id);
    }

    public function getCategoryById($id)
    {
        return category::find($id);
    }

    public function update($data, $id)
    {
        $cate = category::find($id);
        $cate->title = $data['title'];
        $cate->publisher = $data['publisher'];
        $cate->publisher_website = $data['publisher_website'];
        $cate->privacy_policy_website = $data['privacy_policy_website'];
        $cate->licence_agreement_website = $data['licence_agreement_website'];
        $cate->save();
    }

    public function masterCall()
    {

        return category::with(['tray_icon', 'sticker'])->get()->toArray();
    }


}
