@extends('layout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="box1 col col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">プロフィール</div>
        <div class="panel-body">
          <div class="text-center">

              <figure>
                <img src="{{ asset($image ?? '') }}" width="150px" height="150px">
                <figcaption>現在のプロフィール画像</figcaption>
              </figure>

            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->comment }}</p>
            <a href="{{ route('users.edit', ['user' => $user ?? '']) }}">編集する</a>
          </div>
        </div>
      </div>
    </div>
    <div class="box2 col col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">あなたのBucket List</div>
        <div class="panel-body">
          <div class="text-right">
            <a href="{{ route('tasks.create', ['user' => $user ?? '']) }}" class="btn btn-default btn-block">Bucket Listを追加する
            </a>
          </div>
        </div>
        <table class="table">
        <thead>
        <tr>
          <th>タイトル</th>
          <th>状態</th>
          <th>達成日付</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
        </thead>
        <tbody>
          @foreach($tasks as $task)
            <tr>
              <td>{{ $task->title }}</td>
              <td>
                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
              </td>
              <td>{{ $task->achieved_date }}</td>
              <td>
                <a href="{{ route('tasks.edit', ['user' => $user ?? '', 'task' => $task->id]) }}">編集</a>
              </td>
              <td>
                <a href="{{ route('tasks.delete', ['user' => $user ?? '', 'task' => $task->id]) }}">削除</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
