@extends('layouts.app')
@section('content')

<div class="container">
<div class="jumbotron">
    <h1 class="display-4">EDIT POST</h1>
    <a  class="btn btn btn-success" href="{{route('posts')}}">All posts</a>

  </div>
</div>

    </div>
    <div class="container">
    <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data" >
       @csrf
        @if(count($errors)){
            <ul>
                @foreach($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        }
        @endif
        <div class="form-group">
          <label for="exampleFormControlInput1">Title </label>
          <input type="text" name="title" value="{{$post->title}}" class="form-control" >
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" value="" name="content" rows="3">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Photo </label>
            <input type="file" name="photo" class="form-control" >
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Update</button>
          </div>

      </form>
    </div>


@endsection
