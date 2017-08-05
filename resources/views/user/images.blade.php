@extends('layouts.app')
@section('heading')
    {{-- expr --}}
         <div class="col-lg-12">
                <h1 class="">all photo of {{ $user->name  }}</h1>
                
        </div>
@endsection

@section('content')
    @php
        $i=0;
    @endphp
         @if (count($images)>0)
                {{-- expr --}}
            
             <div class="images_wrap">
              @if (Session::has('message'))
               @include('alert.success')
               @endif
              <div class="grid">
                     @foreach ($images as $image)
                         {{-- expr --}}
                  
                        <div class="col-md-4 col-sm-6">
                            
                       
                        <figure class=" @php
                          switch ($i) {
                              case 0:
                                  echo 'effect-apollo';
                                  break;
                                 case 1:
                                  echo 'effect-jazz';
                                  break;
                                   case 2:
                                  echo 'effect-ming';
                                  break;
                                 case 3:
                                  echo 'effect-milo';
                                  break;
                                   case 4:
                                  echo 'effect-duke';
                                  break;
                                   case 5:
                                  echo 'effect-moses';
                                  break;
                                  case 6:
                                  echo 'effect-ruby';
                                  break;
                                  
                              
                                  case 7:
                                  echo 'effect-bubba';
                                  break;
                                  case 8:
                                  echo 'effect-marley';
                                  break;
                                  // case 11:
                                  // echo 'effect-julia';
                                  // break;
                                  // case 12:
                                  // echo 'effect-ruby';
                                  // break;
                                  // case 13:
                                  // echo 'effect-roxy';
                                  // break;
                                  // case 14:
                                  // echo 'effect-bubba';
                                  // break;
                              
                              default:
                                  # code...
                                  break;
                          }
                          $i++;
                          if ($i==9) {
                             $i=0;
                          }
                          @endphp 


                        img-raised img-rounded">
                        
                            <img data-action="zoom" class="img-responsive img-raised img-rounded" src="{{$image->thumb()}}" alt="{{ $image->title }}"/>
                                     
                                   

                              <figcaption>
                                <div>
                                  {!! Form::open(['action'=>['FavouriteController@store',$image->id],'method'=>'post']) !!}
                                    <h2>
                                    {{count($image->favourites) .' '}}
                                   {{--  <span>
                                      <i class="fa fa-heart text-danger"></i> </span> --}}
                            {!! Form::button("<i class='fa fa-heart'></i>",
                           [
                           'class'=>'text-danger',
                         
                           'type'=>'submit'
                           ]) !!}
                   
                    
                                    </h2>
                                    {!! Form::close() !!}
                                   
                                    <p class="">By <span>
                                      <a href="{{ route('user.uploads',$image->user->name) }}" title="">{{ $image->user->name }}</a>
                                    </span><br>{{ $image->title }}<br>
                                     
                                       <a class="btn btn-primary btn-info" href="{{ $image->cover() }}" data-lightbox="trip" data-title="{{ $image->title }}"><i class="fa fa-search-plus"></i> </a>
                                   


                   
                         
                   
                                    </p>
                                      
                                    
                                </div>
                       
                            </figcaption>
                        
                        </figure>
                  </div>
                        
                    
                       
                           
                  
                     @endforeach
                  </div>
       

        </div>
        <center>{{$images->links()}}</center>
         @else
         <h2>nothing uploaded</h2>
          @endif 
       

       @stop

         
   