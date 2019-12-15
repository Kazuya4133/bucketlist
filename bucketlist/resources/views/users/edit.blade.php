@extends('layout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">プロフィール編集画面</div>
        <div class="panel-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ message }}</p>
              @endforeach
            </div>
          @endif
          <form action="{{ route('users.edit', ['user_id] => $user_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" name="image">
              <input type="text" class="form-control" name="name" id="name"
                       value="{{ old('name', $user->name) }}" />
            </div>
            <div class="text-center">
              <p>{{ Auth::user()->name }}</p>
              <p>{{ Auth::user()->comment }}</p>
              <a href="/user/{user_id}/tasks">編集する</a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection