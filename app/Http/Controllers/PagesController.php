<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules;





class PagesController extends Controller
{
    public function welcome()
    {
        $data = [
            'name' => 'Aarnov Adhikari',
            'age' => 16
        ];
        return view("welcome")->with($data);
    }

    public function nextPage()
    {
        return view('next-page');
    }

    public function profile($id, $second)
    {
        $data = [
            'id' => $id,
            'second' => $second
        ];
        return view('profile')->with($data);
    }

    public function create()
    {
        return view('create');
    }

    public function storeage(Request $request)
    {
        $students = new Student();
        $students->name = $request->name;
        $students->address = $request->address;
        $students->dob = $request->dob;

        //image
        $filenamewithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        $img = Image::make($request->file('image'));
        $img->save('storage/image' . $filenameToStore);
        $students->image = 'storage/image' . $filenameToStore;

        $students->save();

        return redirect('/list');

    }

    public function storage_categories(Request $request){
        $categories = new Category();
        $categories->name = $request->xyz;
        $categories->save();
        return back();

    }
    public function list()
    {
//        Mail::to("aarnovadhikari123@gmail.com")->send(new Register());
        $students = Student::get();
        return view("list")->with('students', $students);
    }

    public function edit($id){
        $student=student::find($id);
        return view('update')->with('student',$student);
    }

    public function update(Request $request){
        $students = student::where('id',$request->id)->first();
        $students->name = $request->name;
        $students->address = $request->address;
        $students->dob = $request->dob;

        if($request->hasFile('image')){
            if(File::exists('storage/image'.$students->image)){
                File::delete('storage/image'.$students->image);
            }
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            $img = Image::make($request->file('image'));
            $img->save('storage/image' . $filenameToStore);
            $students->image = 'storage/image' . $filenameToStore;
        }

        $students->save();
        return redirect('/list');
    }

    public function delete($id){
        $student=student::where('id',$id)->first();
        if(File::exists('storage/image'.$student->image)){
            FIle::delete('storage/image'.$student->image);
        }
        $student->delete();
        return redirect('list');

}
    public function category_list(){
        $categories = Category::get();
        return view('Admin.category_list')->with('categories', $categories);
    }

    public function delete_category($id){
        $category=Category::where('id',$id)->first();
        $category->delete();
        return redirect('category_list');

    }

    public function delete_cart($id){
        $cart=Cart::where('id',$id)->first();
        $cart->delete();
        return redirect('store');

    }

public function signup(){
        return view("signup");
}

    public function login(){
        return view("login");
    }

    public function signupForm(Request $request){
        $request->validate([

            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],

            'password' => ['required',  Rules\Password::defaults()],
        ]);


        $user = new User();
        $user->name="A";
        $user->email = $request->email;
        $user->password =Hash::make($request->password) ;
        $user->save();
        return view("login");

    }

    public function loginForm(Request $request){


        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(($request->email=='admin@gmail.com')&&($request->password=="adminhero")){
            return  redirect('/category_list');

        }

        if(Auth::attempt($credentials)){
            return redirect('/store');

        }else{
            return 'wrong credentials';
        }


    }

    public function logout() {
        Auth::logout();
        return view('login');
    }

    public function blank(){
        return view("blank");
    }
    public function checkout(){
        return view("checkout");
    }
    public function index(){
        return view("index");
    }
    public function product($id){
        $user_id=Auth::id();
        $product=product::where('id',$id)->first();

        $carts=cart::where('user_id',$user_id)->get();

        $data = [
            'carts'=>$carts,
            'product' => $product
        ];

        return view('product')->with($data);


    }
    public function store(){
        $categories = category::get();
        $products=product::get();
        $id=Auth::id();
        $carts=cart::where('user_id',$id)->get();


        $data = [
            'categories' => $categories,
            'products' => $products,
            'carts'=>$carts
        ];

        return view("store")->with($data);
    }

    public function add_to_cart(Request $request){
        $carts = new cart();
        $carts->user_id = Auth::id();
       $carts->product_id = $request->product_id;
       $carts->quantity = $request->quantity;
$carts->save();
        return redirect()->back()->with('Product added successfully to cart...');

    }

    public function categories(){
        return view("categories");
    }

    public function edit_category($id){
        $category=category::find($id);
        return view('Admin.category_edit')->with('category',$category);
    }

    public function update_category(Request $request){
        $categories = category::where('id',$request->id)->first();
        $categories->name = $request->name;

        $categories->save();
        return redirect('/category_list');
    }
    public function product_add(){
        $categories = category::get();
        $products=product::get();
        $data = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('Admin.product_add')->with($data);
    }

    public function storage_product(Request $request){
        $products = new Product();
        $products->name = $request->name;
        $products->category = $request->category;
        $products->description = $request->description;
        $products->price = $request->price;

        if($request->hasFile('image')){
            if(File::exists('storage/image'.$products->image)){
                File::delete('storage/image'.$products->image);
            }
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            $img = Image::make($request->file('image'));
            $img->save('storage/image' . $filenameToStore);
            $products->image = 'storage/image' . $filenameToStore;
        }

        $products->save();
        return back();

    }

    public function edit_product($id){
        $product=product::find($id);
        $category=category::get();


        $data = [
            'categories' => $category,
            'product' => $product
        ];

        return view('Admin.product_edit')->with($data);
    }


    public function update_product(Request $request){
        $products= product::where('id',$request->id)->first();
        $products->name = $request->name;
        $products->category = $request->category;
        $products->price = $request->price;
        $products->description = $request->description;

        if($request->hasFile('image')){
            if(File::exists('storage/image'.$products->image)){
                File::delete('storage/image'.$products->image);
            }
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            $img = Image::make($request->file('image'));
            $img->save('storage/image' . $filenameToStore);
            $products->image = 'storage/image' . $filenameToStore;
        }


        $products->save();
        return redirect('/product_add');
    }
    public function delete_product($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return redirect('product_add');

    }



}
