<?php

namespace App\Http\Controllers;

use App\Property;
use App\Tenancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TenancyController extends Controller
{

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id = 1)
    {
        return view('tenancies.index', [
            'tenancies' => Tenancy::where('property_id', $id)->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tenancies.create', [
            'properties' => Property::select('id', 'name')->get()
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Tenancy::create($data);

        return redirect()->route('tenancies.index');
    }
}
