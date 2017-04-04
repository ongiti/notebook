@extends('layouts.base')
@section('content')
 <div class="container">
    <h1 class="text-info">Create Notebooks</h1>
    <form action="/notebooks" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Notebook Name</label>
            <input  class="form-control" type="text" name="name" placeholder="name ">

        </div>
        <button class="btn btn-info">submit</button>

    </form>
 </div>
    @endsection