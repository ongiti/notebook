@extends('layouts.base')
@section('content')
    <div class="container">
        <h1 class="text-info">Create Note</h1>
        <form action="{{route('notes.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Note Title</label>
                <input  class="form-control" type="text" name="title" placeholder="title ">

            </div>
            <div class="form-group">
                <label for="body">Note Description</label>
                <textarea  class="form-control" rows="10" type="text" name="body" placeholder="Note Description "></textarea>

            </div>

            <input type="hidden" name="notebook_id" value="{{$id}}">

            <button class="btn btn-info">submit</button>

        </form>
    </div>
@endsection