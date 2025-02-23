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

class productController extends Controller
{
    //Fetching Categories From Data Base
    public function index()
    {
        $products=productModel::all();
        return view('product.index',compact('products'));
    }

    //For Creating product
    public function create()
    {
        $categories=categoryModel::all();
        return view('product.create',compact('categories'));
    }

    //For Storing product In DataBase
    public function store (Request $request)
    {
        $request->validate([
            'categoryId'=>'required',
            'name'=>'required|unique:products',
            'imagePath'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:20480',
            'description'=>'required',
            'price'=>'required'
        ]);

        //Custom Name For Image
        $imageName = str_replace(' ','_', $request->name).''.time().'.'.$request->imagePath->extension();
        $request->imagePath->move(public_path('productImage'),$imageName);

        $values=$request->all();
        $values['imagePath']=$imageName;

        //Creating Model & Saving Data In Database
        productModel::create($values);

        Alert::success("Product Successfully Inserted");
        return redirect()->route('product.index');
    }

    //For Deleting product
    public function destroy($id)
    {
        productModel::find($id)->delete();
        Alert::success("Product Successfully Deleted");
        return redirect()->route('product.index');
    }

    //For Edit product
    public function edit($id)
    {
        $product = productModel::find($id);
        return view('product.edit',compact('product'));
    }

    //For Update Data Of Edit product
    public function update(Request $request)
    {
        $request->validate([
            'categoryId'=>'required',
            'productId'=>'required',
            'name'=>'required|unique:products,name,'.$request->productId.',productId',
            'imagePath'=>'required|image,webp|mimes:png,jpg,jpeg,gif,svg,webp|max:20480',
            'description'=>'required',
            'price'=>'required'
        ]);
        $imageName = str_replace(' ','_', $request->name).''.time().'.'.$request->imagePath->extension();
        $request->imagePath->move(public_path('productImage'),$imageName);

        $product=productModel::find($request->productId);
        $product->imagePath=$imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        Alert::success("Product Successfully Updated");
        return redirect()->route('product.index');
    }

    //For Bulk Upload
    public function bulkUpload()
    {
        return view('product.bulkUpload');
    }

    //For Bulk Upload Attempt
    public function bulkUploadAttempt(Request $request)
    {
        $request->validate([
            'csvFile' => 'required',
        ]);

        $fileName = time().'.'.$request->csvFile->extension();
        $request->csvFile->move(public_path('csvFile'),$fileName);
        $file_path=public_path('csvFile')."/".$fileName;
        if($xlsx = SimpleXLSX::parse($file_path))
        {
            //return $xlsx->rows();
            foreach($xlsx->rows() as $row)
            {
                $product = new productModel();
                $product->categoryId = DB::table('categories')->where('name',$row[0])->value('categoryId');
                $product->name = $row[1];
                $product->imagePath = $row[2];
                $product->description = $row[3];
                $product->price = $row[4];

                $product->save();
            }
        }
        else
        {
            return SimpleXLSX::parseError();
        }

        if(File::exists($file_path))
        {
            unlink($file_path);
        }
        return redirect()->route('product.index');
    }

    //Bulk Image Upload
    public function bulkImageUpload()
    {
        return view('product.bulkImageUpload');
    }

    //Bulk Image Upload Attempt
    public function bulkImageUploadAttempt(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image',
        ]);
        foreach ($request->image as $img) {
            $imageName = $img->getClientOriginalName();
            $img->move(public_path('productImage'),$imageName);
        }

        Alert::success("Successfully Uploaded");
        return redirect()->back();
    }
}
