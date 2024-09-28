<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
class LoginController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($data)){
           return redirect()->route('admin.orders');
        }else{
            return back()->with('message','Invalid User');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    public function dashboard()
    {
        $todayOrder = Order::where(['status' => 'pending'])->whereDate('created_at', '>=', date('Y-m-d'))->whereDate('created_at', '<=', date('Y-m-d'))->get();  
        $pendingOrders = Order::where(['payment_status' => 'paid', 'status' => 'pending'])->get();
        $ongoingOrders = Order::where(['status' => 'ongoing'])->get();
        $onthewayOrders = Order::where(['status' => 'ontheway'])->get();
        $deliveredOrders = Order::where(['status' => 'delivered'])->get();
        $completeOrders = Order::where(['payment_status' => 'paid', 'status' => 'completed'])->get();

        $totalTodayOrder = count($todayOrder);
        $totalPendingOrder = count($pendingOrders);
        $totalOnGoingOrders = count($ongoingOrders);
        $totalOnTheWayOrders = count($onthewayOrders);
        $totalDeliveredOrders = count($deliveredOrders);
        $totalComplateOrder = count($completeOrders);
        
        return view('admin.dashboard',compact('totalTodayOrder','totalPendingOrder','totalOnGoingOrders','totalOnTheWayOrders','totalDeliveredOrders','totalComplateOrder'));
    }
}
