<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @auth
            {{ Auth::user()->name }}のクイズ

            @endauth
        </h2>
    </x-slot>

    @foreach($quizzes as $key => $quiz)
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
                    <x-message :message="session('message')['content']" />
                @endif

                @if (session('message') && isset(session('message')['type_correct'])
                 && $quiz->answer_number == session('user_choice') && $quiz->id == session('quiz_id'))
                    <x-message :message="session('message')['type_correct']" />

                @elseif (session('message') && isset(session('message')['type_incorrect'])
                 && $quiz->answer_number != session('user_choice') && $quiz->id == session('quiz_id'))
                    <x-message :message="session('message')['type_incorrect']" />
                @endif

                @auth
                    <div class="font-bold  space-x-6">
                        <p class="mb-3">選択肢</p>
                    </div>
                @endauth

                @foreach($quiz->choices ?? [] as $key_choice => $choice)
                <div class="pr-8 pb-10">
                    <label class="block" for="choice{{ $key_choice }}_{{ $quiz->id }}">
                        <input type="radio" id="choice{{ $key_choice }}_{{ $quiz->id }}"
                         name="user_choice" value="{{ $key_choice }}" class="">
                        {{ $choice }}
                    </label>
                </div>
            @endforeach

                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

                <x-primary-button>
                    回答する
                </x-primary-button>
              
                
        
        </form>
        </div>
        @if ( session('quiz_id') == $quiz->id)
        @php
           $currentIndex = $key; // 現在のクイズのインデックスを取得
           $nextIndex = $currentIndex + 1; // 次のクイズのインデックスを計算
           $nextQuiz = $quizzes->get($nextIndex); // 次のクイズの情報を取得
        @endphp
        @if ($nextQuiz) <!-- 次のクイズが存在する場合のみ、次へのリンクを表示 -->
            <a href='{{ route('quiz.show', $nextQuiz) }}'>
                <x-primary-button>次へ</x-primary-button>
            </a>
        @endif
    @endif
    @endforeach
   
</x-app-layout>
