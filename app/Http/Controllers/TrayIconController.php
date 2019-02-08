<?php

namespace App\Http\Controllers;

use App\Tray_icon;
use Illuminate\Http\Request;
use App\Repository\Interfaces\trayIconInterface;
use App\Repository\Interfaces\categoryInterface;
use Illuminate\Support\Facades\Storage;
use Image;

class TrayIconController extends Controller
{
    public $icon;
    public $category;

    public function __construct(trayIconInterface $icon, categoryInterface $category)
    {
        $this->icon = $icon;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = $this->icon->getAll();
        return view('Team.tray-icon-list', compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('Team.add-tray-icon', compact('categories'));

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
            $original_pic = $request->file('logo');

            $file_extension = $original_pic->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;


            $data['logo'] = $filename;
            # upload original image
            Storage::put('tray_icon/' . $filename, (string)file_get_contents($original_pic), 'public');

            $image_get = Storage::get('tray_icon/' . $filename);

            $image_50_50 = Image::make($image_get)
                ->resize(96, 96)
                ->encode($file_extension, 100);
            $tray_icon_name = time() . '.webp';

            Storage::put('tray_icon/1x/' . $tray_icon_name, (string)$image_50_50, 'public');

        }
        $data['category_id'] = $request->category;
        $data['icon_name'] = $tray_icon_name;
        $this->icon->addTrayIcon($data);
        return redirect('/tray_icon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tray_icon $tray_icon
     * @return \Illuminate\Http\Response
     */
    public function show(Tray_icon $tray_icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tray_icon $tray_icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Tray_icon $tray_icon, $id)
    {
        $categories = $this->category->getAll();
        $tray_icons = $this->icon->getById($id)->toArray();
        return view('Team.edit-tray-icon', compact('categories', 'tray_icons'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tray_icon $tray_icon
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
            Storage::put('tray_icon/' . $filename, (string)file_get_contents($original_pic), 'public');

            $image_get = Storage::get('tray_icon/' . $filename);

            $image_50_50 = Image::make($image_get)
                ->resize(96, 96)
                ->encode($file_extension, 100);
            $tray_icon_name = time() . '.webp';

            Storage::put('tray_icon/1x/' . $tray_icon_name, (string)$image_50_50, 'public');
            $data['icon_name'] = $tray_icon_name;

        }
        $data['category_id'] = $request->category;
        $this->icon->update($data,$id);
        return redirect('/tray_icon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tray_icon $tray_icon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->icon->delete($id);
        return redirect('/tray_icon');

    }
}
