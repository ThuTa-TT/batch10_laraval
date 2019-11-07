@extends('template')

@section('content')

<div class="container">
	<h1>Post Create Form</h1>
  <!-- error sitt -->
  
  <!-- form ka data htal yan -->
	<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
              <div class="alert text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror"></textarea>
            @error('content')
              <div class="alert text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Photo:</label><span class="text-danger">[support file type jpg,png]</span>
            <input type="file" name="photo" class="@error('photo') is-invalid @enderror">
            @error('photo')
              <div class="alert text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Categories:</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" >
              <option value="">Choose Category:</option>
               {--Accept data and Loop--}
              @foreach($categories as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach

            </select>
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