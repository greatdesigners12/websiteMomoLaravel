@extends('template')

@section('content')
    <form action="{{route('sendEmailTo')}}" style="margin-top: 250px;" method="POST">
        @csrf
        <input type="text" class="form-control" placeholder="Subject">
        <textarea type="text" class="form-control" placeholder="Content" ></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection