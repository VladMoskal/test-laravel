<?php

namespace App\Http\Controllers;

use App\Tenancy;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TenantController extends Controller
{

    private $imgStorage;

    public function __construct()
    {
        $this->imgStorage = $_SERVER['DOCUMENT_ROOT'] . '/img/tenants';
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id = 1)
    {
        return view('tenants.index', [
            'tenants' => Tenant::where('tenancy_id', $id)->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tenants.create', [
            'tenancies' => Tenancy::all()
        ]);
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

        $data['image'] = $filename;

        Tenant::create($data);

        return redirect()->route('tenants.index');

    }
}
