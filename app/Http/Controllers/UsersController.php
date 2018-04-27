<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Applicant;
class UsersController extends Controller
{
    public function index(){
        $user = new User;
        $users = $user::with('categories')->get();
        return $users;
    }
    public function destroy($id){
        $user = new User;
        $users = $user::destroy($id);
        return "Deleted";
    }
    public function create(Request $r){
        //return $r;
        $user = new User;

        $user->name= $r->name;
        $user->email= $r->email;
        $user->password =bcrypt('secret');
        $user->save();
    }

    public function update(Request $request)
    {
        
        // $request->validate(
        //     [
        //         'name'=>'required|min:2|regex:/^[\pL\s]+$/u',
        //         'email'=>'required|email|unique:users,email',
                
        //     ]);
        $u = User::find(request('id'));
        $u->name = request('name');
        $u->email = request('email');
        $u->save();

        return response()->json('Updated successfully');
        
    }

    public function showApplicant()
    {
        return view('applicant');
    }

    public function showapplicant1()
    {
        $applicant = new Applicant;
        $applicants = $applicant::all();
        return $applicants;
    }


    public function fileUpload(Request $request)
    {
       
        $u = UserImage::find(request('id'));
       return $u;
        // $u->file = request('file');
        // $u->save();
        // return response()->json('Uploaded successfully');
    }

    public function showimage()
    {
        return view('image');
    }


    /*public function showmap()
    {
        return view('mapview');
    }*/
    public function showimages1()
    {
            $image = new Image;
            $images = $image::all();
            return $images;
    }

    public function findLocation()
    {

    }



}
