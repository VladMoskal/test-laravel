<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PropertyController extends Controller
{
    private $imgStorage;

    public function __construct()
    {
        $this->imgStorage = $_SERVER['DOCUMENT_ROOT'] . '/img/properties';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('properties.index', [
            'properties' => Property::where('owner_id', $request->user()->id)->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $filename = uniqid() . '.' . $request->image->extension();
        Input::file('image')->move($this->imgStorage, $filename);

        isset($data['mortgage']) ? $data['mortgage'] = true : $data['mortgage'] = false;
        $data['image'] = $filename;
        $data['owner_id'] = $request->user()->id;

        Property::create($data);

        return redirect()->route('properties.index');
    }
}
