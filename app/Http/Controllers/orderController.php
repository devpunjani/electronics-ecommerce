<?php

namespace App\Http\Controllers;

//Mains
use Illuminate\Http\Request;

//Models
use App\Models\categoryModel;
use App\Models\productModel;
use App\Models\orderModel;

//Functionalies
use Storage;
use File;
use Alert;
use DB;

//Excel Bulk Upload
use Shuchkin\SimpleXLSX;

//Pdf Download
use Barryvdh\DomPDF\Facade\Pdf;

class orderController extends Controller
{
    public function new()
    {
        $orders = DB::table('orders')->where('status','Pending')->get();
        return view('orders.new',compact('orders'));
    }

    public function accept($id)
    {
        $order = orderModel::find($id);
        $order->status = "Accepted";
        $order->save();

        return redirect()->route('orders.new');
    }

    public function reject($id)
    {
        $order = orderModel::find($id);
        $order->status = "Rejected";
        $order->save();

        return redirect()->route('orders.new');
    }

    public function accepted()
    {
        $orders = DB::table('orders')->where('status','Accepted')->get();
        return view('orders.accepted',compact('orders'));
    }

    public function deliver($id)
    {
        $order = orderModel::find($id);
        $order->status = "Delivered";
        $order->save();

        return redirect()->route('orders.accepted');
    }

    public function delivered()
    {
        $orders = DB::table('orders')->where('status','Delivered')->get();
        return view('orders.delivered',compact('orders'));
    }

    public function canceled()
    {
        $orders = DB::table('orders')->where('status','Canceled')->get();
        return view('orders.canceled',compact('orders'));
    }

    public function returned()
    {
        $orders = DB::table('orders')->where('status',"Return Requested")->get();
        return view('orders.returned',compact('orders'));
    }

    public function returnaccept($id)
    {
        $order = orderModel::find($id);
        $order->status = "Return Accepted";
        $order->save();

        return redirect()->route('orders.returned');
    }

    public function returnreject($id)
    {
        $order = orderModel::find($id);
        $order->status = "Return Rejected";
        $order->save();

        return redirect()->route('orders.returned');
    }
}


namespace App\Http\Controllers;

