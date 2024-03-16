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
        <div class="flex justify-center"> 
            <p class="p-3 pt-5">正解数は...</p>
            <p class="p-3 font-bold text-3xl text-red-500">{{ $user_correct_choices }}
            <p class="p-3 pt-5 font-bold text-xl">
                /{{ $total_quiz }}問でした！</p>
            </p>
            @if ($user_correct_choices == $total_quiz)
                <p class="p-3 text-yellow-500">おめでとうございます。満点です！！</p>
            @endif

            <form method="POST" action="{{ route('all_answer.destroy') }}" class="">
                @csrf
                @method('delete')
                <div class="mt-3 text-right mr-18">
                    <x-danger-button>削除</x-danger-button>
                </div>
            </form>

            <form method="POST" action="{{ route('send_mail') }}" class="">
                @csrf
                <input type="hidden" name="user_correct_choices" value="{{ $user_correct_choices }}">
                <input type="hidden" name="total_quiz" value="{{ $total_quiz }}">
                <x-primary-button  color='blue' type="submit" class="ml-3">送信</x-primary-button>
                {{-- @if(session('message'))
                    <div>{{ session('message') }}</div>
                @endif --}}
            </form>

       
            <x-message :message="session('message')" />
        </div>
    
        <a href="{{ route('start') }}" class="mt-3 p-3 block text-right">
            <x-primary-button>スタートへ</x-primary-button>
        </a>
    </div>
</x-app-layout>
