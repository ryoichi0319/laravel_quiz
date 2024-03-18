<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
  <form method="POST" action="/image" enctype="multipart/form-data">
    @csrf
      
    <input type="file" id="file" name="file" class="form-control">

    {{-- 複数
    <input type="file" id="file" name="file[]" class="form-control" multiple> --}}
    <button type="submit">アップロード</button>

    {{--/storage/app/pubicにある--}}
    <a href="/storage/3.jpg">アップロードファイル</a>
    
    <a href="/download">profile</a>

  </form>