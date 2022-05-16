<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = Product::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('description', 'LIKE', '%' . $request->search . '%')->orderBy('created_at', 'DESC')->paginate(20);
        } else {
            $products = $this->productModel->sortByDesc('created_at');
        }
        // dd($this->productModel);
        $user = auth()->user();
        $admin = Admin::where('user_id', $user->id)->first();

        $data = [
            'active' => 'product',
            'admin' => $admin,
            'products' => $products,
        ];
        return view('admin.product.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $admin = Admin::where('user_id', $user->id)->first();
        $data = [
            'active' => 'product',
            'admin' => $admin,
        ];
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'specification' => 'required',
            'harga' => 'required|integer',
            'description' => 'required',
            'image' => 'req'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}