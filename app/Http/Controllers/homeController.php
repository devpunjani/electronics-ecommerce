<?php

namespace App\Http\Controllers;

//Models
use App\Models\userModel;
use App\Models\forgotPasswordModel;
use App\Models\contactModel;
use App\Models\categoryModel;
use App\Models\feedbackModel;
use App\Models\productModel;
use App\Models\wishlistModel;
use App\Models\cartModel;
use App\Models\orderModel;


//Functionalies
use Hash;
use Auth;
use Session;
use Alert;
use DB;
use Storage;
use File;
use Extension;

//Pdf Download
use Barryvdh\DomPDF\Facade\Pdf;

//Mains
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

//Mails
use Illuminate\SUpport\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\forgotPasswordEmail;


class homeController extends Controller
{
    //Index
    public function index()
    {
        $categories = DB::table('categories')->limit(4)->get();
        $products = DB::table('products')->limit(8)->get();
        return view('index',compact('categories'),compact('products'));
    }

    //Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    //Contact Us Admin
    public function contactusAdmin()
    {
        $contactus = DB::table('contact')->get();
        return view('contactusAdmin',compact('contactus'));
    }

    //Feedback Admin
    public function feedbackAdmin()
    {
        $feedbacks = DB::table('feedback')->get();
        return view ('feedbackAdmin',compact('feedbacks'));
    }

    //Register Page
    public function registerPage()
    {
        return view('register');
    }

    //Register Data Save
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required | unique:users',
            'address'=>'required',
            'password'=>'required | confirmed'
        ]);

        $user = new userModel();

        if($request->has('photourl'))
        {
            //Custom Name For Image
            $imageName = str_replace('.','_', $request->email).'.'.$request->photourl->extension();
            $request->photourl->move(public_path('userImage'),$imageName);
            $user->photourl = $imageName;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->type = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        //Email Data Send
        $email =  $user->email;

        //Data
        $mailData = [
            'title'=>'Successfully Register',
            'url'=>'www.youtube.com'
        ];

        //Mail Send
        Mail::to($email)->send(new SendEmail($mailData));

        Alert::success('Account Registered Successfully');
        return redirect()->route('loginPage');
    }

    //Login Page
    public function loginPage()
    {
        return view('login');
    }

    //Check Login
    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);

        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>1]);

        if($check)
        {
            /* return "User Login Successfull"; */
            $request->session()->put('id',1);
            Alert::success('User Login Successfull');
            return redirect()->route('index');
        }
        else
        {
            Alert::error('Login Failed');
            return redirect()->route('loginPage');
        }
    }

    //Admin Login
    public function loginPageAdmin()
    {
        return view('adminlogin');
    }

    //Check Admin Login
    public function loginAttemptAdmin(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);

        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>0]);

        if($check)
        {
            Alert::success('Admin Login Successfull');
            return redirect()->route('dashboard');
        }
        else
        {
            Alert::error('Admin Login Failed');
            return redirect()->route('loginPageAdmin');
        }
    }

    //Log Out
    public function logout()
    {
        Session::flush();
        Auth::logout();
        Alert::success('Logout Successfull');
        return redirect()->route('loginPage');
    }

    //Contact Us
    public function contact()
    {
        return view('contact');
    }

    //Contact Us Data Save
    public function contactAttempt(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $user = new contactModel();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->message = $request->message;
        $user->save();

        return redirect()->back();
    }

    //Feedback
    public function feedback()
    {
        return view('feedback');
    }

    //Feedback Data Save
    public function feedbackAttempt(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $user = new feedbackModel();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->message = $request->message;
        $user->save();

        return redirect()->back();
    }

    //Products
    public function products()
    {
        $products = DB::table('products')->get();
        return view('products',compact('products'));
    }

    //Product Page
    public function product($id)
    {
       /*  $product = DB::table('products')->where('productId',$id)->get(); */
        $product = productModel::find($id);
        return view('product',compact('product'));
    }

    //Account
    public function account()
    {
        /* $account = DB::table('users')->find(Auth::user()->id); */
        $account = userModel::find(Auth::user()->id);
        return view('account',compact('account'));
    }

    //Edit Account
    public function editaccount()
    {
        $account = DB::table('users')->find(Auth::user()->id);
        return view('editaccount',compact('account'));
    }

    //Update Account
    public function updateaccount(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'email'
        ]);

        $user = userModel::find(Auth::user()->id);

        if($request->has('photourl'))
        {
            //Custom Name For Image
            $imageName = str_replace('.','_', $request->email).'.'.$request->photourl->extension();
            $request->photourl->move(public_path('userImage'),$imageName);
            $user->photourl = $imageName;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        Alert::success("Account Updated Successfully");
        return redirect()->route('account');
    }

    //Account Delete
    public function deleteaccount()
    {
        DB::table('users')->where('id',Auth::user()->id)->delete();
        return redirect()->route('index');
    }

    //Wishlist
    public function wishlist()
    {
        $products =wishlistModel::where('userId',Auth::user()->id)->get();
        return view('wishlist',compact('products'));
    }

    //Remove Product From Wishlist
    public function wishlistdestroy($id)
    {
        wishlistModel::find($id)->delete();
        Alert::success("Product Removed From Wishlist");
        return redirect()->back();
    }

    //Add To Wishlist
    public function addtowishlist($id)
    {
        $user = new wishlistModel();
        $user->productId = $id;
        $user->userId = Auth::user()->id;
        $user->save();

        Alert::success("Product Added To Wishlist");
        return redirect()->back();
    }

    //Clear Wishlist
    public function clearwishlist()
    {
        DB::table('wishlist')->where('userId',Auth::user()->id)->delete();
        return redirect()->route('account');
    }

    public function addalltocart()
    {
        $products =wishlistModel::where('userId',Auth::user()->id)->get();
        foreach ($products as $product) {
            $user = new cartModel();
            $user->productId = $product->productId;
            $user->userId = Auth::user()->id;
            $user->save();
        }
        Alert::success("All Products Added To Cart");
        return redirect()->route('account');
    }

    //Cart
    public function cart()
    {
        $products = cartModel::where('userId',Auth::user()->id)->get();
        return view('cart',compact('products'));
    }

    //Remove Product From Cart
    public function cartdestroy($id)
    {
        cartModel::find($id)->delete();
        Alert::success("Product Removed From Cart");
        return redirect()->back();
    }

    //Add To Cart
    public function addtocart($id)
    {
        $user = new cartModel();
        $user->productId = $id;
        $user->userId = Auth::user()->id;
        $user->save();

        Alert::success("Product Added To Cart");
        return redirect()->back();
    }

    //Clear Cart
    public function clearcart()
    {
        DB::table('cart')->where('userId',Auth::user()->id)->delete();
        return redirect()->route('account');
    }

    //Buy Now
    public function buynow()
    {
        $products = cartModel::where('userId',Auth::user()->id)->get();
        $address = userModel::where('id',Auth::user()->id)->pluck('address')/* ->get() */;
        foreach ($products as $item) {
            $current_date = date('Y-m-d H:i:s');
            $order = new orderModel();
            $order->productId = $item->productId;
            $order->userId = Auth::user()->id;
            $order->orderDate = $current_date;
            $order->address =   $address;
            $order->amount = $item->product->price;
            $order->status = "Pending";
            $order->save();
        }
        DB::table('cart')->where('userId',Auth::user()->id)->delete();
        Alert::success("Order Placed Successfully");
        return redirect()->route('account');
    }

    //Orders
    public function orders()
    {
        $orders = orderModel::where('userId',Auth::user()->id)->orderBy('orderId', 'desc')->get();
        return view('orders',compact('orders'));
    }

    //Return Order
    public function returnorder($id)
    {
        $order = orderModel::find($id);
        $order->status = "Return Requested";
        $order->save();

        Alert::success("Order Return Requested");
        return redirect()->back();
    }

    //Cancel Order
    public function cancelorder($id)
    {
        $order = orderModel::find($id);
        $order->status = "Canceled";
        $order->save();

        Alert::success("Order Canceled");
        return redirect()->back();
    }

    //Pdf Download
    public function downloadPDF($id)
    {
        $order = DB::table('orders')->where('orderId',$id)->get();
        $pdf = Pdf::loadView('pdf.invoice',compact('order'));
        return $pdf->download('invoice.pdf');
    }

    //Categories
    public function categories()
    {
        $categories = DB::table('categories')->get();
        return view('categories',compact('categories'));
    }

    //Category Sort
    public function productSort($id){
        $products = DB::table('products')->where('categoryId',$id)->get();
        return view('productSort',compact('products'));
    }

    //Send Email
    public function sendEmail()
    {
        $email = 'devpunjani2123@gmail.com';

        $mailData = [
            'title'=>'Demo Email',
            'url'=>'www.youtube.com'
        ];

        Mail::to($email)->send(new SendEmail($mailData));

        return response()->json([
            'message'=>'Email Has Been Sent'
        ], Response::HTTP_OK);
    }

    //Forgot Password
    public function forgotPassword()
    {
        return view('forgotPassword');
    }

    //Forgot Password Attempt
    public function forgotPasswordAttempt(Request $request)
    {
        $request->validate(['email'=>'required|email']);

        //Checking Email From User Data
        $user=userModel::where('email',$request->email)->first();
        if($user){
            $otp = random_int(1000,9999);
            $fg = new forgotPasswordModel();
            $fg->userId = $user->id;
            $fg->otp = $otp;
            $fg->save();

            $mailData = [
                'name'=>$user->name,
                'otp'=>$otp
            ];
            Mail::to($user->email)->send(new forgotPasswordEmail($mailData));

            return redirect()->route('askOtp',['id'=>$fg->id]);
        }
        else{
            Alert::warning("Email Does Not Exist");
            return redirect()->back();
        }
    }

    //Ask Otp
    public function askOtp($id)
    {
        return view('askOtp',compact('id'));
    }

    //Match Otp
    public function matchOtp(Request $request)
    {
        $request->validate([
            'id'=>'required|numeric',
            'otp'=>'required|numeric|digits:4'
        ]);

        $fg = forgotPasswordModel::find($request->id);

        if($fg->otp == $request->otp){
            return redirect()->route('resetpassword',['id'=>$fg->userId]);
        }
        else
        {
            Alert::warning("Otp Does Not Match");
            return redirect()->back();
        }
    }

    //Reset Password
    public function resetpassword($id)
    {
        return view('resetPassword',compact('id'));
    }

    //Reset Password Attempt
    public function resetpasswordAttempt(Request $request){
        $request->validate([
            'id'=>'required',
            'password'=>'required | confirmed'
        ]);

        $user = userModel::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success("Password Updated Successfully");
        return redirect()->route('loginPage');
    }

    public function changepassword(){
        return view('changepassword');
    }

    public function changepasswordAttempt(Request $request)
    {
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'required | confirmed'
        ]);

        $old_pass = DB::table('users')->find(Auth::user()->id);

        if(Hash::check($request->oldpassword,$old_pass->password))
        {
            $user = userModel::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            Alert::success("Password Changed Successfully");
            return redirect()->route('account');
        }
        else
        {
            Alert::warning("Incorrect Password");
            return redirect()->back();
        }
    }
}
