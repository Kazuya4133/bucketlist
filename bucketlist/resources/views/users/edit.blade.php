@extends('layout')

@section('content')
<div class="container">
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
          <form action="{{ route('users.edit', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="text-left">
                <label for="image">アイコン</label>
                <input type="file" name="image">
                <label for="name">名前</label>
                <input type="text" class="form-control" name="name" id="name"
                       value="{{ old('name') ?? $user->name }}" />
                <label for="comment">一言コメント</label><br>
                <textarea type="text" name="comment" id="comment" value="{{ old('comment') ?? $user->comment ?? '' }}"></textarea>
              
                <!-- <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->comment }}</p> -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">編集する</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection