<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>学参レコメンド！</title>
</head>
<body>
	<header>
		<nav class="flex items-center justify-between flex-wrap bg-gray-900 p-4">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
			<a href="#" class="font-semibold text-xl tracking-tight">学参レコメンド！</span>
		</div>
				<div>
				<a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">ログイン</a>
				<a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">新規登録</a>
				</div>
		</div>
		</nav>
	</header>

	<div>
		@foreach($posts as $post)
			{{ $post->id }}
			{{ $post->user_id }}
			{{ $post->title }}
			{{ $post->category_id }}
			{{ $post->comment }}
			{{ $post->stars }}
		@endforeach
	</div>

<footer class="flex items-center justify-between flex-wrap bg-gray-900 p-4">
	<div class="flex items-center flex-shrink-0 text-white">Copyright <a href="#">学参レコメンド！</a>. All Rights Reserved.</div>
</footer>
</body>
</html>