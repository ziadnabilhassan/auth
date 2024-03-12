@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">ALL TAG</h1>
         <a  class="btn btn btn-success" href="{{route('tag.create')}}">Create Tag</a>

          </div>
      </div>

    </div>
    <div class="row">
        @if($tag->count()>0)
        <div class="col">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($tag as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->tag}}</td>

                    <td>
                        <a href="{{route('tag.edit',['id'=>$item->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <a href="{{route('tag.destroy',['id'=>$item->id])}}"><i class="fa-regular fa-trash-can" style="color: red"></i></a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        @else
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">not tag</h4>
          <p></p>
          <p class="mb-0"></p>
        </div>
        @endif

    </div>
  </div>
@endsection
