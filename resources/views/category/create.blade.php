@extends('template')
@section('content')

<div class="container">
	<h1>Category Create Form</h1>
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
	<form method="post" action="{{route('category.store')}}">
          @csrf
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror">
            @error('category')
              <div class="alert text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Save">
          </div>
        </form>
</div>
@endsection