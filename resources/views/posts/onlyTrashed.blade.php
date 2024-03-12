@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Trashed POST</h1>
         <a  class="btn btn btn-success" href="{{route('post.create')}}">Create post</a>
         <a  class="btn btn btn-success" href="{{route('posts')}}">All posts</a>

          </div>

      </div>

    </div>
    <div class="row">
        @if($posts->count()>0)
        <div class="col">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">HardDelete</th>
                    <th scope="col">Restore</th>

                  </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($posts as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->User->name}}</td>
                    <td><img src="{{URL::asset($item->photo)}}"alt="{{$item->photo}}" class="img-tumbnail" width="70px" height="100"></td>

                    <td>
                        <a href="{{route('post.hdelete',['id'=>$item->id])}}"><i class="fa-regular fa-trash-can" style="color: red"></i></a>
                    </td>
                    <td>
                        <a href="{{route('post.restore',['id'=>$item->id])}}"><i class="fa fa-window-restore" aria-hidden="true" style="color: rgb(22, 153, 48)"></i>
                        </a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        @else
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">not post</h4>
          <p></p>
          <p class="mb-0"></p>
        </div>
        @endif

    </div>
  </div>
@endsection
