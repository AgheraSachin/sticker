<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\categoryInterface;
use App\Repository\Interfaces\stickerInterface;
use App\Repository\Interfaces\trendingInterface;
use App\Sticker;
use App\trending;
use App\version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class StickerController extends Controller
{

    public $sticker;
    public $category;
    public $trending;

    public function __construct(stickerInterface $sticker, categoryInterface $category,trendingInterface $trending)
    {
        $this->sticker = $sticker;
        $this->category = $category;
        $this->trending = $trending;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stickers = $this->sticker->getAll();
        return view('Match.sticker-list', compact('stickers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('Match.add-sticker', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $files = $request->file('logo');

            foreach ($files as $key => $val) {
                $file_extension = $val->getClientOriginalExtension();
                $filename = $key . time() . '.' . $file_extension;
                $data['logo'] = $filename;
                # upload original image
                Storage::put('sticker/' . $filename, (string)file_get_contents($val), 'public');

                $image_get = Storage::get('sticker/' . $filename);

                $image_50_50 = Image::make($image_get)
                    ->resize(512, 512)
                    ->encode($file_extension, 100);
                $tray_icon_name = $key . time() . '.webp';

                Storage::put('sticker/1x/' . $tray_icon_name, (string)$image_50_50, 'public');
                $data['category_id'] = $request->category;
                $data['sticker'] = $tray_icon_name;
                $this->sticker->addSticker($data);

            }
        }
        return redirect('/sticker');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sticker $sticker
     * @return \Illuminate\Http\Response
     */
    public function show(Sticker $sticker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sticker $sticker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->getAll();
        $stickers = $this->sticker->getById($id)->toArray();
        return view('Match.edit-sticker', compact('categories', 'stickers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sticker $sticker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('logo')) {
            $original_pic = $request->file('logo');

            $file_extension = $original_pic->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;


            $data['logo'] = $filename;
            # upload original image
            Storage::put('sticker/' . $filename, (string)file_get_contents($original_pic), 'public');

            $image_get = Storage::get('sticker/' . $filename);

            $image_50_50 = Image::make($image_get)
                ->resize(512, 512)
                ->encode($file_extension, 100);
            $tray_icon_name = time() . '.webp';

            Storage::put('sticker/1x/' . $tray_icon_name, (string)$image_50_50, 'public');
            $data['sticker'] = $tray_icon_name;

        }
        $data['category_id'] = $request->category;
        $this->sticker->update($data, $id);
        return redirect('/sticker');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sticker $sticker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sticker->delete($id);
        return redirect('/sticker');
    }

    public function APIgetAll()
    {
        $result = $this->category->masterCall();
        $version = version::get()->toArray();
        $trending = $this->trending->getAll()->toArray();
        $result['version'] = $version[0]['name'];
        $result['trending'] = Storage::url('trending/').$trending[0]['filename'];
        return response()->json(['status' => 1, 'message' => 'success', 'data' => $result], 200);
    }
}
