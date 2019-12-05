<div class="panel panel-default">
  <div class="panel-heading">あなたのBucket List</div>
  <div class="panel-body">
    <div class="text-right">
      <a href="#" class="btn btn-default btn-block">
        Bucket Listを追加する
      </a>
    </div>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>タイトル</th>
      <th>状態</th>
      <th>期限</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>{{ $task->title }}</td>
          <td>
            <span class="label">{{ $task->status }}</span>
          </td>
          <td>{{ $task->due_date }}</td>
          <td><a href="#">編集</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>