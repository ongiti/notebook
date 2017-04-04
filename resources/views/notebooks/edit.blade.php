@extends('layouts.base')
@section('content')
    <div class="container">
        <h1 class="text-info">Edit Notebooks</h1>
        <form action="/notebooks/{{$notebook->id}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">{{$notebook->name}}</label>
                <input  class="form-control" type="text" name="name" placeholder="name ">

            </div>
            <button class="btn btn-info">Update</button>

        </form>
    </div>
@endsection