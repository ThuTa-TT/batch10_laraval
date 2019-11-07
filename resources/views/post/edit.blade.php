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
	<form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
          @csrf

          <!-- for update method-->
          @method('PUT')
          <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control">{{$post->body}}</textarea>
          </div>
          <div class="form-group">
            <label>Photo:</label><span class="text-danger">[support file type jpg,png]</span>
            <input type="file" name="photo">
            <img src="{{asset($post->image)}}" style="width: 200px; height: 150px;" class="img-fluid">
            <input type="hidden" name="oldphoto" value="{{$post->image}}">
          </div>
          <div class="form-group">
            <label>Categories:</label>
            <select name="category">
               {--Accept data and Loop--}
              @foreach($categories as $row)
              <option value="{{$row->id}}" @if($row->id==$post->category_id)
                {{'selected'}}@endif>{{$row->name}}</option>
              @endforeach

            </select>
          </div>

          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
          </div>
        </form>
</div>
@endsection