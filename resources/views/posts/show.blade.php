@extends('layouts.app')
@section('content')

</div>
    </div>
    <div class="container">
        <div class="card" style="width:50%; margin-left:25%">
            <img src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}" class="card-img-top" >
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->content}}</p>
              <p class="card-text">created_at:{{$post->created_at}}</p>
              <p class="card-text">updated_at:{{$post->updated_at}}</p>
              <a  class="btn btn btn-success" href="{{route('posts')}}">All posts</a>

            </div>
          </div>
    </div>



@endsection
