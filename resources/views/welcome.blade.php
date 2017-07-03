@extends('layouts.app')
@section('heading')
    {{-- expr --}}
         <div class="col-lg-12">
                <h1 class="">Thumbnail Gallery</h1>
        </div>
@endsection

@section('content')
    @php
        $i=0;
    @endphp
         @if (count($images)>0)
                {{-- expr --}}
            
             <div class="images_wrap">
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
                         <a class="" href="storage/upload/{{ $image->path }}" data-lightbox="trip" data-title="{{ $image->title }}">
                            <img data-action="zoom" class="img-responsive img-raised img-rounded" src="storage/upload/{{$image->path}}" alt="{{ $image->title }}"/>
                            <figcaption>
                                <div>
                                    <h2>By <span>{{ $image->user->name }}</span></h2>
                                    <p>{{ $image->title }}
                                     
                                      
                                    </p>
                                </div>
                       
                            </figcaption> 
                            </a>          
                        </figure>
                  </div>
                        
                    
                       
                           
                  
                     @endforeach
                  </div>
       

        </div>
        <center>{{$images->links()}}</center>
        
          @endif 
       

       @stop

         
   