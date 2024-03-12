@extends('layouts.app')
@section('content')

<div class="container">
<div class="jumbotron">
    <h1 class="display-4">EDIT TAGS</h1>
    <a  class="btn btn btn-success" href="{{route('tags')}}">All Tags</a>

  </div>
</div>

    </div>
    <div class="container">
    <form action="{{route('tag.update',['id'=>$tag->id])}}" method="POST" >
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
          <label for="exampleFormControlInput1">TAG </label>
          <input type="text" name="tag" value="{{$tag->tag}}" class="form-control" >
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-danger">Update</button>
          </div>

      </form>
    </div>


@endsection
