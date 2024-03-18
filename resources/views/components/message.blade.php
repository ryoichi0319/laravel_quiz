@props(['message'])
@if($message == '正解です')
<div class='p-4 m-2 rounded bg-blue-200 text-blue-600 font-bold'>
    {{$message}}
</div>
@elseif($message == '不正解です')
<div class='p-4 m-2 rounded bg-red-200 text-red-500 font-bold'>
    {{$message}}
</div>
@elseif($message == '送信しました')
<div class='p-4 m-2 rounded bg-green-200 text-green-600 font-bold'>
    {{$message}}
</div>
@elseif($message == '削除しました')
<div class='p-4 m-2 rounded bg-red-200 text-red-500 font-bold'>
    {{$message}}
</div>

@endif