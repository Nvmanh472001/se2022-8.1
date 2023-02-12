<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Components\Recusive;
use Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{

    protected $guarded = [];
    private $order;
    private $product;
    private $user;
    public function __construct(Product $product, Order $order, User $user)
    {
        $this->product = $product;
        $this->order = $order;
        $this->user = $user;
    }
    public function index()
    {
        $roles = auth()->user()->roles;
        $count =0;
        foreach ($roles as $role) {
            $permission = $role->permissions;
            if ($permission->contains('keycode', 'order_edit')) {
                $count =+1;
            }
        }
        $order = $this->order->all();
        $orderItem = $this->order::with(['orderItem']);
        $user = $this->order::with(['user']);
        $customer = $this->order::with(['customer']);
        return view('admins.order.index', compact('order', 'orderItem', 'user', 'customer','count'));
    }
    public function update(Request $request, $id)
    {
       
        try {
            $order = $this->order->findOrFail($id);
            $order->stt = $request->stt;
            DB::beginTransaction();
        
            $order->update();
            

            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
            
        } catch (\Exception$exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }

    }

}
