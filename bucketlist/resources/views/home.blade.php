@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading text-center">
            あなただけのBucket Listを作成しましょう！
          </div>
          <div class="panel-body 1">
            <div class="text-center">
              <a href=" {{ route('tasks.create', Auth::id()) }} " class="btn btn-primary">
                Bucket Listを作る
              </a>
            </div>
            <div class="panel-body 2">
              <div class="text-center">
                <a href=" {{ route('tasks.index', Auth::id()) }} " class="btn btn-primary">
                My pageへ
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection