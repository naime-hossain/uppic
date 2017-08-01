<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use App\Favourite;
class FavouriteController extends Controller
{
  
 



    public function store(Request $request, $id)
    {
       $upload=Upload::findOrFail($id);
       $favourites=$upload->favourites;
       foreach ($favourites as $favourite) {
           if ($favourite->ip_address==$request->ip()) {
           return back()->with('message','you already loved this image');
       }
       }
       
       $upload->favourites()->create([
        'ip_address'=>$request->ip()
        ]);
       return back();

    }

   
}
