<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\Constraint\Operator;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Route;
use App\Enums\ProductStatusEnum;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private string $title='';
    public function __construct()
    {
        $this->model=(new product())->query();
        $routeName = Route::currentRouteName();
        $arr = explode(separator:'.' , string:$routeName);
        $arr = array_map(callback:'ucfirst' ,array: $arr);
        $title = implode(separator:'-' , array:$arr);
        /* dd($routeName); */

        $arrProductStatus = ProductStatusEnum::asArray();

        View::share('title', $title);
        View::share('arrProductStatus', $arrProductStatus);
    }


    /**
     * Display a listing of the resource.
     *
    * @param  \Illuminate\Http\Request  $request
    * @return array
     * @return \Illuminate\Http\Response
     *
     */
  /*   public function index(Request $request) */
    public function index()
    {
        $data = product::orderBy('id','asc')->paginate(5);
        return view('product/list',compact('data') );
    }



     public function api(){
    return Datatables::of(product::query())


    ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function addNew()
    {
         $manufacture = Manufacture::all();
         return view('product.addnew',compact('manufacture'));
        /*  return redirect()->route('addnew'); */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewPost(Request $request)
    {


        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $data = new product;
        $data->manufacturers_id = $request->manufacturers_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        // dd($data);
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product/editpro',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
