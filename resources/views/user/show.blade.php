@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    @if ($user)
    	{{-- expr --}}
    	 <h1>{{ $user->name }}</h1>

    @else
    <h1>no user found</h1>
    @endif
@endsection
 
 		@section('content')
 @if ($user)
<div class="col-md-8">
 @if(Session::has('message'))
       @include('alert.success')
       @endif
 			
 				{{-- expr --}}
 				
 					{{-- expr --}}
 					 	
 					<div class="post_wrap">
 					
 						<div class="post_body ">
                          <div class="col-md-4">
                              
                        
 							<img class="img-responsive img-raised img-rounded" src="/{{ $user->photo? $user->photo->image: '1' }}" alt="{{ $user->name }}">
 						

 							@if (Auth::check())
 							  @if (Auth::user()->id==$user->id)
 							  	{{-- expr --}}
 							  	    <span href="" data-toggle="modal" data-target="#edituser{{ $user->id }}" class="btn btn-success" title=""><i class="fa fa-edit"></i></span>

                                    <span href="" data-toggle="modal" data-target="#deleteuser{{ $user->id }}" class="btn btn-danger" title="">Remove</span>

            
        

                                       
 							  @endif
 								{{-- expr --}}
 							@endif
                              </div>
 							<div class="col-md-4">
                            <p>email:{{ $user->email }}</p>
                           
                            </div>
 						</div>
 					</div>
 					
 				
 	<!-- deleteuser Modal Core -->
          <div class="modal fade" id="deleteuser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteuser{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deleteuser{{ $user->id }}Label">Want to remove The user?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'delete','class'=>'sm-form']) !!}
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
            <!-- edituser Modal Core -->
          <div class="modal fade" id="edituser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="edituser{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="edituser{{ $user->id }}Label">edit user </h4>
                </div>
                {!! Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'put']) !!}
                    <div class="modal-body">
                          <div class="form-group col-md-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                         {!! Form::label('title','user title', []) !!}
                          {!! Form::text('title',null, ['class'=>"form-control"]) !!}
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
 		 </div>
            @else
     <div class="col-md-8 col-md-offset-2">
 <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
    

</div>
<div class="col-md-12 text-center">
    <a href="/" class="btn btn-primary" title="">go home</a>
 </div>
            @endif
     
@endsection
 

