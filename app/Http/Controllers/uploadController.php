<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Upload;
use App\User;
class uploadController extends Controller
{


    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        // show all the files in storage/app/public folder
        


        // return Storage::files('public'); //return an arrray of files in this folder

        


        // return Storage::allFiles('public');//return all files and files of subfolder too


        

        //make a directory
          // Storage::makeDirectory('public/naime2');//return boolean

       



        //make a directory
          // Storage::deleteDirectory('public/naime2');//return boolean

        



        //show the url of a file
        // $url1=Storage::url('naime.jpeg');
        // $url2=Storage::url('naime/8lFiueiNYNeOwafOUhfYE7nvIsXcXNXQSUt0yEgo.jpeg');
        //  echo "<img src='".$url1."' >";
        // echo Storage::url('naime.jpeg');




        //show the size of the file
        // return Storage::size('public/77naime.jpeg');





        //show the lastModified time
        // return Storage::lastModified('public/77naime.jpeg');




              //copy a file and move it another folder,return boolean
        // echo Storage::copy('public/77naime.jpeg','public/naime/77naime.jpeg');





              //move a file and place it another folder,return boolean
        // echo Storage::move('public/77naime.jpeg','public/naime/77naime.jpeg');




        // //get the raw data of a image
        //  $rawData=Storage::get('public/naime.jpeg');

        //  //move the raw data as a image with a name.return boolean
        //   echo Storage::put('newImage.png',$rawData);

        //delete a file give boolean,it can delete multiple image as second param
        // echo Storage::delete('newImage.png');


        $images=Upload::paginate(9);
        return view('welcome',compact('images'));


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
    // return $request->all();

        $user=Auth::user();
        $this->validate($request,[
           'image'=>'required',
           'title'=>'required|unique:uploads',
            ]);
        //provide the temporary path
        // return $request->file('image');

        // store the file in public folder(storage/app/public),auto rename
        // return $request->image->store('public');
        
        //protect and error handling
        if ($request->hasFile('image')) {
            // return $request->image->store('public');

            // // get the path of the file
            // return $request->image->path();

            // get the extension of the file
            // return $request->image->extension();

            // //another method to upload file Storage::putFile($foldername,$file),we can create subfolder using public/new
            // return Storage::putFile('public',$request->file('image'));
            // return Storage::putFile('public/naime',$request->file('image'));

            // give a custom name while uploading
            // return $request->image->storeAs('public',random_int(3,time()).'naime.'.$request->image->extension());
            foreach ($request->image as $file) {
                  $input=[];
            // $input=$request->all();
            $filename=random_int(0,time()).$file->getClientOriginalName();
            $filesize=$file->getClientSize();
            $file->storeAs('public/upload',$filename);
            $input['path']=$filename;
            $input['size']=$filesize;
            $input['title']=$request->title;
            // $input['user_id']=$user->id;
            unset($input['image']);
            $upload=$user->upload()->create($input);
            }
           
            return back()->with(['message'=>'File uploaded successfully']);


               


        }else{
            return back()->withErrors('no file selected');
        }
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
        //
        $user=Auth::user();
        $file=Upload::findOrFail($id);
        $this->validate($request,[
          
           'title'=>'required|unique:uploads',
            ]);
        $input=$request->all();
        if ($request->hasFile('image')) {
            
            
          if (Storage::delete('public/upload/'.$file->path)) {
            $filename=random_int(0,time()).$request->image->getClientOriginalName();
            $filesize=$request->image->getClientSize();
            $request->image->storeAs('public/upload',$filename);
            $input['path']=$filename;
            $input['size']=$filesize;
            
            // $input['user_id']=$user->id;
            unset($input['image']);
          $upload=$file->update($input);
            return back()->with(['message'=>'File updated successfully']);
          }
     

        }else{
            $upload=$file->update($input);
            return back()->with(['message'=>'Title updated successfully']);
            
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
 $file=Upload::findOrFail($id);
  if (Storage::delete('public/upload/'.$file->path)) {
    $file->delete();
 return back()->with(['message'=>'File deleted successfully']);
 }

 
    }
}
