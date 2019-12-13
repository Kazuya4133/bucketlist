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
          <form action="#" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          <input type="file" name="profile_image"></div>
          <div class="text-center">
            <p>{{ Auth::user()->name }}</p>
            <a href="#">編集する</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection