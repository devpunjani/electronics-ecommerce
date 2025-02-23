<?php

namespace App\Http\Controllers;

//Mains
use Illuminate\Http\Request;

//Models
use App\Models\categoryModel;

//Functionalies
use Storage;
use File;
use Alert;

//Excel Bulk Upload
use Shuchkin\SimpleXLSX;

//Pdf Download
use Barryvdh\DomPDF\Facade\Pdf;

class categoryController extends Controller
{
    //Fetching Categories From Data Base
    public function index()
    {
        $categories=categoryModel::all();
        return view('category.index',compact('categories'));
    }

    //For Creating Category
    public function create()
    {
        return view('category.create');
    }

    //For Storing Category In DataBase
    public function store (Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories',
            'imagePath'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:20480'
        ]);

        //Custom Name For Image
        $imageName = str_replace(' ','_', $request->name).'.'.$request->imagePath->extension();
        $request->imagePath->move(public_path('categoryImage'),$imageName);

        $values=$request->only('name');
        $values['imagePath']=$imageName;

        //Creating Model & Saving Data In Database
        categoryModel::create($values);

        Alert::success("Successfully Inserted");
        return redirect()->route('category.index');
    }

    //For Deleting Category
    public function destroy($id)
    {
        categoryModel::find($id)->delete();
        Alert::success("Successfully Deleted");
        return redirect()->route('category.index');
    }

    //For Edit Category
    public function edit($id)
    {
        $category = categoryModel::find($id);
        return view('category.edit',compact('category'));
    }

    //For Update Data Of Edit Category
    public function update(Request $request)
    {
        $request->validate([
            'categoryId'=>'required',
            'name'=>'required|unique:categories,name,'.$request->categoryId.',categoryId'
        ]);

        $imageName = str_replace(' ','_', $request->name).''.time().'.'.$request->imagePath->extension();
        $request->imagePath->move(public_path('categoryImage'),$imageName);

        $category=categoryModel::find($request->categoryId);
        $category->imagePath=$imageName;
        $category->name = $request->name;
        $category->save();
        Alert::success("Successfully Updated");
        return redirect()->route('category.index');
    }

    //For Bulk Upload
    public function bulkUpload()
    {
        return view('category.bulkUpload');
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
                $category = new categoryModel();
                $category->name = $row[0];
                $category->imagePath = $row[1];
                $category->save();
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
        return redirect()->route('category.index');
    }

    //Bulk Image Upload
    public function bulkImageUpload()
    {
        return view('category.bulkImageUpload');
    }

    //Bulk Image Upload Attempt
    public function bulkImageUploadAttempt(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image',
        ]);

        foreach ($request->image as $img) {
            $imageName = $img->getClientOriginalName();
            $img->move(public_path('categoryImage'),$imageName);
        }

        Alert::success("Successfully Uploaded");
        return redirect()->back();
    }
}
