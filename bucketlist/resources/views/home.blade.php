@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">
            あなただけのBucket Listを作成しましょう！
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href=" {{ route('tasks.create', Auth::id()) }} " class="btn btn-primary">
                タスク作成ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection