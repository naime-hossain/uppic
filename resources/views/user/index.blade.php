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
               {!! Form::file('image[]',['class'=>'form-control','multiple'=>true]) !!}
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
                        <img class="img-responsive" src="/storage/upload/{{$image->path}}" alt="">
                    </a>
               
                   
                     <span href="" data-toggle="modal" data-target="#editimage{{ $image->id }}" class="btn btn-success edit-icon" title=""><i class="fa fa-edit"></i></span>

                      <span href="" data-toggle="modal" data-target="#deleteimage{{ $image->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>

            
    
                </div>

                {{-- all models --}}
                <!-- deleteimage Modal Core -->
          <div class="modal fade" id="deleteimage{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteimage{{ $image->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deleteimage{{ $image->id }}Label">Want to remove The image?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['uploadController@destroy',$image->id],'method'=>'delete','class'=>'sm-form']) !!}
                    {!! Form::button("Yes",
                     [
                     'class'=>'btn btn-danger',
                   
                     'type'=>'submit'
                     ]) !!}
                    

            
                        

                  {!! Form::close() !!}
              </div>
                </div>
            
              </div>
            </div>
          </div>
       {{-- model end --}}                        
            <!-- editimage Modal Core -->
          <div class="modal fade" id="editimage{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="editimage{{ $image->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="editimage{{ $image->id }}Label">edit image </h4>
                </div>
                {!! Form::model($image,['action'=>['uploadController@update',$image->id],'method'=>'put','files'=>true]) !!}
                    <div class="modal-body">
              <div class="form-group col-md-12">
              {{--  {!! Form::label('title','Add a title', []) !!} --}}
               {!! Form::text('title',null, ['class'=>'form-control']) !!}
           </div>
            <div class="col-md-6">
               {!! Form::label('image','choose images', ['class'=>'btn btn-info']) !!}
               {!! Form::file('image',['class'=>'form-control']) !!}
           </div>
                    

                       
                    </div>
                    <div class="modal-footer">
                      <div class="form-group col-md-12">
                       {!! Form::submit('update', ['class'=>'btn btn-primary']) !!}
                      {{--  <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button> --}}
                     </div>

                    </div>
            
             

           {!! Form::close() !!}
            
              </div>
            </div>
          </div>
    {{-- model end --}}
                       
                 @endforeach
       

        </div>
        <center>{{$images->links()}}</center>
          @endif 


       @stop

         
   