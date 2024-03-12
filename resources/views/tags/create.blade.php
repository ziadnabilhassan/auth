@extends('layouts.app')
@section('content')

<div class="container">
<div class="jumbotron">
    <h1 class="display-4">CREATE TAG</h1>
    <a  class="btn btn btn-success" href="{{route('tags')}}">All Tags</a>

  </div>
</div>

    </div>
    <div class="container">
    <form action="{{route('tag.store')}}" method="POST" enctype="multipart/form-data" >
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
          <label for="exampleFormControlInput1">Tag </label>
          <input type="text" name="tag" class="form-control" >
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Save</button>
          </div>

      </form>
    </div>


@endsection
