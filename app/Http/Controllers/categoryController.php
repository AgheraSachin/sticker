<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\categoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{

    private $category;

    public function __construct(categoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        return view('category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = [
            'category' => $request->category,
            'title' => $request->title,
            'publisher' => $request->publisher,
            'publisher_website' => $request->pw,
            'privacy_policy_website' => $request->ppw,
            'licence_agreement_website' => $request->law,
        ];
        $this->category->addCategory($category);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->getCategoryById($id)->toArray();
        return view('category.edit-category', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = [
            'category' => $request->category,
            'title' => $request->title,
            'publisher' => $request->publisher,
            'publisher_website' => $request->pw,
            'privacy_policy_website' => $request->ppw,
            'licence_agreement_website' => $request->law,
        ];
        $this->category->update($category, $id);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect('category');

    }


}
