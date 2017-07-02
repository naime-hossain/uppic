@extends('layouts.app')
@section('heading')
    {{-- expr --}}
         <div class="col-lg-12">
                <h1 class="">Thumbnail Gallery</h1>
        </div>
@endsection

@section('content')

         @if (count($images)>0)
                {{-- expr --}}
            
             <div class="images_wrap">
                 @foreach ($images as $image)
                     {{-- expr --}}
                <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                 {{-- <small class='text-muted'>{{ $image->title }}</small> --}}
                    <a class="" href="#">
                        <img class="img-responsive img-raised img-rounded" src="storage/upload/{{$image->path}}" alt="">
                    </a>
                 
                       
                </div>
                 @endforeach
       

        </div>
        <center>{{$images->links()}}</center>
        
          @endif 
       

       @stop

         
   