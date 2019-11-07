@extends('template')

@section('content')

<div class="container">
	<h1>Post Edit Form</h1>
  <!-- error sitt -->
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <!-- form ka data htal yan -->
	<form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
          @csrf

          <!-- for update method-->
          @method('PUT')
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
          </div>

          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
          </div>
        </form>
</div>
@endsection