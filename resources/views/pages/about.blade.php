@extends('main')

@section('title', 'About')


@section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1>About Me</h1>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
             </div>
         </div>
     </div>
    {{ "My name is" . $data['fullname'] . "and mu email is " . $data['email']}}
@endsection


