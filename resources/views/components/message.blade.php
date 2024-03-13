@props(['message'])
@if($message == '正解です')
<div class='p-4 m-2 rounded bg-blue-100'>
    {{$message}}
</div>
@elseif($message == '不正解です')
<div class='p-4 m-2 rounded bg-red-100'>
    {{$message}}
</div>
@elseif($message)
<div class='p-4 m-2 rounded bg-green-100'>
    {{$message}}
</div>

@endif