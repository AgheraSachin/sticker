<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\trendingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class TrendingController extends Controller
{
    public $trending;

    public function __construct(trendingInterface $trending)
    {
        $this->trending = $trending;

    }

    public function index()
    {
        $trendings = $this->trending->getAll();
        return view('Trendings.trending-list',compact('trendings'));
    }

    public function create()
    {
        return view('Trendings.add-trending');

    }

    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $original_pic = $request->file('logo');

            $file_extension = $original_pic->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;


            $data['filename'] = $filename;
            # upload original image
            Storage::put('trending/' . $filename, (string)file_get_contents($original_pic), 'public');

            $image_get = Storage::get('trending/' . $filename);

            $image_50_50 = Image::make($image_get)
                ->resize(100, 100)
                ->encode($file_extension, 100);
            $tray_icon_name = time() . '.webp';

            Storage::put('trending/1x/' . $tray_icon_name, (string)$image_50_50, 'public');

        }
        $this->trending->add($data);
        return redirect('/trending');
    }

    public function edit(Request $request, $id)
    {
        $tray_icons = $this->trending->getById($id)->toArray();
        return view('Trendings.edit-trending', compact('tray_icons'));

    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('logo')) {
            $original_pic = $request->file('logo');

            $file_extension = $original_pic->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;


            $data['filename'] = $filename;
            # upload original image
            Storage::put('trending/' . $filename, (string)file_get_contents($original_pic), 'public');

            $image_get = Storage::get('trending/' . $filename);

            $image_50_50 = Image::make($image_get)
                ->resize(100, 100)
                ->encode($file_extension, 100);
            $tray_icon_name = time() . '.webp';

            Storage::put('trending/1x/' . $tray_icon_name, (string)$image_50_50, 'public');

        }
        $this->trending->update($data,$id);
        return redirect('/trending');
    }

    public function destroy($id){
        $this->trending->delete($id);
        return redirect('/trending');
    }
}
