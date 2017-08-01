@extends('layouts.app')
@section('heading')
    {{-- expr --}}
         <div class="col-lg-12">
                <h1 class="">welcome to Uppic</h1>
                <p>share your photo memory with us</p>
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
                                    <h2>{{count($image->favourites)}} times loved
                    
                                    </h2>
                                     {!! Form::open(['action'=>['FavouriteController@store',$image->id],'method'=>'post']) !!}
                                    <p class="">By <span>
                                      <a href="{{ route('user.uploads',$image->user->name) }}" title="">{{ $image->user->name }}</a>
                                    </span><br>{{ $image->title }}<br>
                                     
                                       <a class="btn btn-primary btn-info" href="{{ $image->cover() }}" data-lightbox="trip" data-title="{{ $image->title }}"><i class="fa fa-search-plus"></i> </a>
                                     {{--   <a class="btn btn-primary" href="{{ route('') }}" data-lightbox="trip" data-title="{{ $image->title }}"><i class="fa fa-search-plus"></i> </a> --}}


                   
                          {!! Form::button("<i class='fa fa-heart'></i>",
                           [
                           'class'=>'btn btn-simple btn-danger',
                         
                           'type'=>'submit'
                           ]) !!}
                   
                   
                                    </p>
                                      {!! Form::close() !!}
                                    
                                </div>
                       
                            </figcaption>
                        
                        </figure>
                  </div>
                        
                    
                       
                           
                  
                     @endforeach
                  </div>
       

        </div>
        <center>{{$images->links()}}</center>
        
          @endif 
       

       @stop

         
   