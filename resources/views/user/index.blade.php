@extends('layouts.app')
@section('heading')
    {{-- expr --}}
         <div class="col-lg-12">
                <h1 class="">Upload imagee {{ $user->name }}</h1>
        </div>
@endsection

@section('content')
     <div class="col-md-8 col-md-offset-2">
       <div class="alert_wrap">
           @if ($errors->count()>0)
               @include('alert.error')
           @endif
            @if (Session::has('message'))
               @include('alert.success')
           @endif
       </div>
         {!! Form::open(['action'=>'uploadController@store','files'=>true]) !!}
           <div class="form-group col-md-6">
              {{--  {!! Form::label('title','Add a title', []) !!} --}}
               {!! Form::text('title','', ['class'=>'form-control','placeholder'=>'Add a title']) !!}
           </div>
            <div class="col-md-6">
               {!! Form::label('image[]','choose images', ['class'=>'btn btn-info']) !!}
               {!! Form::file('image[]',['class'=>'form-control','multipe'=>true]) !!}
           </div>
            <div class="form-group col-md-6">
               
               {!! Form::submit('upload',['class'=>'btn btn-success']) !!}
           </div>
         {!! Form::close() !!}
     </div>

         @if (count($images)>0)
                {{-- expr --}}
            
             <div class="images_wrap">
                 @foreach ($images as $image)
                     {{-- expr --}}
                <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                 <small class='text-muted'>{{ $image->title }}</small>
                    <a class="thumbnail" href="#">
                        <img class="img-responsive" src="storage/upload/{{$image->path}}" alt="">
                    </a>
               
                    <form action="{{ url('/delete',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                       
                </div>
                 @endforeach
       

        </div>
        <center>{{$images->links()}}</center>
          @endif 

       @stop

         
   