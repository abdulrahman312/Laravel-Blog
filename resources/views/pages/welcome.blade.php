@extends('main')

@section('title', '| Homepage')

@section('content')
     <div class="container">
         <div class="jumbotron">
             <h1>Welcome to my Blog!</h1>
             <p class="lead">ThankYou for visiting...</p>
             <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
         </div>

         <div class="row">
             <div class="col-md-8">

                 @foreach($post as $posts)
                     <div class="post">
                         <h3>{{ $posts->title }}</h3>
                         <p>
                             {{ substr($posts->body, 0, 300) }}
                             {{ strlen($posts->body) > 300 ? "..." : "" }}
                         </p>
                         <a href="{{ url('blog/'.$posts->slug) }}" class="btn btn-primary">Read More</a>
                     </div>
                     <hr>
                 @endforeach

             </div>
             <div class="col-md-3 col-md-offset-1" >
                 <h2>SideBar</h2>
             </div>
         </div>
     </div>
@endsection

