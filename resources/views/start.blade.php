<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @auth
            <h1>{{ Auth::user()->name }}のクイズページ</h1>
            @endauth
        </h2>
    </x-slot>
    <div class="mt-4 p-8 bg-white w-full rounded-2xl max-w-4xl mx-auto ">

   
    <div class="  flex justify-center"> 
        <a href="{{ route('quiz.show', ['quiz' => 1]) }}">

        <x-primary-button>
        スタート
      </x-primary-button>
    </a>
    </a>
        
    </div>
    </div>
</x-app-layout>           
