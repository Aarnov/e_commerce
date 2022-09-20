<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function store(Request $request)
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

    }

    public function list()
    {
        $students = Student::get();

        return view("list")->with('students', $students);
    }
}
