<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
  <form method="POST" action="/image" enctype="multipart/form-data">
    @csrf
      
    <input type="file" id="file" name="file" class="form-control">

   
    
    <button type="submit">アップロード</button>
  </form>

  