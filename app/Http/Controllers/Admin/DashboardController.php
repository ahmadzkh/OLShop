<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    protected $userModel;
    protected $productModel;
    protected $orderModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->productModel = Product::all();
        $this->orderModel = Order::all();
    }

    public function index()
    {
        $user = auth()->user();
        $admin = Admin::where('user_id', $user->id)->first();
        $products_count = $this->productModel->count();
        $earn = DB::select("SELECT SUM(price) as total FROM order_details");
        $pending_count = $this->orderModel->where('status', 'pending')->count();
        $completed_count = $this->orderModel->where('status', 'completed')->count();

        // dd($earn[0]);

        $data = [
            'active' => 'dashboard',
            'admin' => $admin,
            'product_count' => $products_count,
            'earn' => $earn[0],
            'pending_count' => $pending_count,
            'completed_count' => $completed_count,
        ];
        return view('admin.main', $data);
    }
}