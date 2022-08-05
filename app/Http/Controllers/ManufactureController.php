<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacture = Manufacture::orderBy('id','asc')->paginate(6);
        $title = 'index';
        return view('manufacture/index',compact('manufacture','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create';
        return view('manufacture/addnew',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Manufacture::create($request->all());
        return redirect()->route('manufactures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        $title ='show';
        return view('manufacture/show',compact('manufacture','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        $title ='show';
        return view('manufacture/edit',compact('manufacture','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Manufacture $manufacture)
    {
        $data = $manufacture->update($request->all());
        if($data){
            return redirect()->route('manufactures.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        $manufacture->delete();
        return redirect()->back();
    }
}
