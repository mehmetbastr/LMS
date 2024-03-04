<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class CategoryController extends Controller
{
    public function AllCategory(){

        $category = Category::latest()->get();
        return view('admin.backend.category.all_category',compact('category'));

    }//end method

    public function AddCategory(){

        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request){

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);

            $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_gen));
            $save_url = 'upload/category/'.$name_gen;

            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function EditCategory($id){

        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));

    }

    public function UpdateCategory(Request $request){

        $cat_id = $request->id;

            if($request->file('image')){
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
                $img = $manager->read($request->file('image'));
                $img = $img->resize(370,246);

                $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_gen));
                $save_url = 'upload/category/'.$name_gen;

                Category::find($cat_id)->update([
                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
                    'image' => $save_url,
                ]);

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);

        } else{

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            ]);

        $notification = array(
            'message' => 'Category Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);


        }
    }

    public function DeleteCategory($id){

        $item = Category::find($id);
        $img = $item->image;
        unlink($img);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function AllSubCategory(){

        $subcategory = SubCategory::latest()->get();
        return view('admin.backend.category.subcategory.all_subcategory',compact('subcategory'));

    }

    public function AddSubCategory(){

        $category = Category::latest()->get();
        return view('admin.backend.category.subcategory.add_subcategory', compact('category'));
    }

    public function StoreSubCategory(Request $request){

            SubCategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            ]);


        $notification = array(
            'message' => 'Alt Kategori Başarıyla Oluşturuldu!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }
}
