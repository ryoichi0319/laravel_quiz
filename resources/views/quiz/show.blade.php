<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @auth
            <h1>{{ Auth::user()->name }}のクイズ</h1>
            @endauth
        </h2>

    </x-slot>
        <div class="mt-4 p-8 bg-white w-full rounded-2xl max-w-4xl mx-auto ">
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

                @if (session('message') && (session('message')['content'])
                 && $quiz->id == session('quiz_id'))
                {{-- {{ session('message')['content'] }} --}}
                   <x-message :message="session('message')['content']" />
                @endif
                
                @if (session('message') && (session('message')['type_correct'])
                 && $quiz->answer_number == session('user_choice') && $quiz->id == session('quiz_id'))

                    {{-- 回答が正しい場合のメッセージ表示 --}}
                    <x-message :message="session('message')['type_correct']" />
                    {{-- {{session('message')['type_correct']}} --}}

                @elseif (session('message') && (session('message')['type_incorrect'])
                 && $quiz->answer_number != session('user_choice') && $quiz->id == session('quiz_id'))

                     <x-message :message="session('message')['type_incorrect']" />

                @endif

                @auth
                    <div class="font-bold  space-x-6">
                        <p class="mb-3">選択肢</p>
                    </div>
                @endauth


                @foreach($quiz->choices ?? [] as $key => $choice)
                <div class="pr-8 pb-10">
                    <label class="block">
                        <input type="radio" name="user_choice" value="{{ $key }}">
                        {{ $choice }}
                    </label>
                </div>
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                
                @endforeach

                
                <div class=" mt-3 text-right mr-18">
                    <div class=" mt-3 text-right mr-18">
                        @php
                        
                        $disabled = session()->has('quiz_id') && session('quiz_id') == $quiz->id;
                        @endphp
                      
                    </div>

                <x-input-error :messages="$errors->get('user_choice')" class="p-3"/>
                <x-primary-button :disabled="$disabled">
                    回答する
                </x-primary-button>
                </div>
                <div>
                正解数:
                <span class=" font-bold">
                {{$correct_user_choice}}
                </span>
                </div>

            </form>
           





            @if ($next_quiz &&  session('quiz_id') == $quiz->id)
            <a href="{{ route('quiz.show', $next_quiz) }}">
            <div class=" mt-3 text-right mr-18">
                <x-secondary-button>次へ</x-secondary-button>
               
            </div>
            </a>
            <form method="post" action="{{route('answer.destroy', $quiz)}}" class="">
                @csrf
                @method('delete')
                <div class=" mt-3 text-right mr-18">
            <x-danger-button>削除</x-danger-button>
                </div>
            </form>
           
            @elseif(!$next_quiz && session('quiz_id') == $quiz->id)
            <form method="post" action="{{route('answer.destroy', $quiz)}}" class="">
                @csrf
                @method('delete')
                <div class=" mt-3 text-right mr-18">
            <x-danger-button>削除</x-danger-button>
                </div>
            </form>
          
            <a href="{{ route('result') }}">
                <div class=" mt-3 text-right mr-18">
                    <x-secondary-button>結果</x-secondary-button>
                </div>
                </a>
            @endif

            
        </div>
</x-app-layout>
