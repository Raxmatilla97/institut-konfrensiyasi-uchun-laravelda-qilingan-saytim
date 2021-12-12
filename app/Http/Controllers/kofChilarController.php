<?php

namespace App\Http\Controllers;
use App\Kof_chilar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class kofChilarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        
        $konf = Kof_chilar::all();
        return view('admin.konfrensiya.index', compact('konf'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $konf = Kof_chilar::find($id);
      
        return view('admin.konfrensiya.show', compact('konf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $konf = Kof_chilar::where('id',  '=', $id)->first();
      
        return view('admin.konfrensiya.edit', compact('konf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Kof_chilar::where('id', '=', $id)->first();

        $blog->update($request->all());
        return redirect()->route('admin.konf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kof_chilar $konf)
    {
        $konf->delete();

        return redirect()->route('admin.konf.index');
    }
}
