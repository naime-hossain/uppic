<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Upload;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $images=$user->upload()->paginate(9);
        return view('user.index',compact('images','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::findOrFail($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user=User::findOrFail($id);
         $input=$request->all();
         if ($input) {
                if ($request->hasFile('image')) {
          if ($user->pro_pic) {
            Storage::delete('public/user/'.$user->pro_pic);
          }
            $filename=$user->name.$request->image->getClientOriginalName();
            $request->image->storeAs('public/user',$filename);
            $input['pro_pic']=$filename;
            
            // $input['user_id']=$user->id;
            unset($input['image']);
          $user->update($input);
            return back()->with(['message'=>'User info updated successfully']);
          }
     

         else{
           $user->update($input);
            return back()->with(['message'=>'User info updated successfully']);
            

    
            }
    }else{
         return back()->with(['message'=>'Nothing is updated']);
         }
       
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
         if ($user->pro_pic) {
            Storage::delete('public/user/'.$user->pro_pic);
          }
          $user->delete();
    }


}
