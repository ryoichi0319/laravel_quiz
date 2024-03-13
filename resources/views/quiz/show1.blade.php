<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>{{Auth::user()->name}}のクイズ</h1>
        </h2>

    </x-slot>
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                問題:
                <a href='{{ route('quiz.show', $quiz) }}' class="text-blue-600">
                    {{ $quiz->question }}
                </a>
            </h1>
            <hr class="w-full">

            <br />

            <form method="POST" action="{{ route('answer.store') }}">
                @csrf

                @if (session('message') && isset(session('message')['content'])
                 && $quiz->id == session('quiz_id'))
                {{-- {{ session('message')['content'] }} --}}
                   <x-message :message="session('message')['content']" />
                @endif
                
                @if (session('message') && isset(session('message')['type_correct'])
                 && $quiz->answer_number == session('user_choice') && $quiz->id == session('quiz_id'))

                    {{-- 回答が正しい場合のメッセージ表示 --}}
                    <x-message :message="session('message')['type_correct']" />
                    {{-- {{session('message')['type_correct']}} --}}

                @elseif (session('message') && isset(session('message')['type_incorrect'])
                 && $quiz->answer_number != session('user_choice') && $quiz->id == session('quiz_id'))

                     <x-message :message="session('message')['type_incorrect']" />

                @endif

                @auth
                    <div class="font-bold  space-x-6">
                        <p class="mb-3">選択肢</p>
                    </div>
                @endauth


                @foreach($quiz->choices ?? [] as $key => $choice)
                <div class="">
                    <label class="block">
                        <input type="radio" name="user_choice" value="{{ $key }}">
                        {{ $choice }}
                    </label>
                </div>
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                
                @endforeach

                <x-primary-button class="mt-4">
                    回答する
                </x-primary-button>
            </form>
        </div>
</x-app-layout>
