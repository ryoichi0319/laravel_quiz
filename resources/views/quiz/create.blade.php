<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @auth
            <h1>{{ Auth::user()->name }}のクイズ結果</h1>
            @endauth
        </h2>
    </x-slot>
    <div class="mt-4 p-8 bg-white w-full rounded-2xl max-w-4xl mx-auto ">

   
    <h1>クイズ結果</h1>
    <div class="  flex justify-center"> 
        <p class=" p-3">
        正解数は...
       </p>
        <p class=" p-3">
        {{ $user_correct_choices }}/{{$total_quiz}}問でした！
        </p>
    </div>
    </div>
</x-app-layout>