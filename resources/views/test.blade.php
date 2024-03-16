こんにちは
<body class="antialisased">
  @auth
    @for($i = 0; $i < 10; $i++)
    {{ $i }}
    @endfor

    <p>
        {{ Auth::user()->name }}さん、こんにちは
    </p>
 @endauth
  
/
 

 @guest
     a
 @endguest
 
</body>