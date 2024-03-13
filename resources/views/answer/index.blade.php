<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
            個別表示
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    @foreach ($answers as $answer )
                        {{$answer->user_choice}}
                    @endforeach
                  
                </h1>
               
                <hr class="w-full">
               
                <div class=" flex space-x-7">
               
                </div>
                <p class="mt-4 whitespace-pre-line">
                </p>
                
                <div class="text-sm font-semibold flex flex-row-reverse">
                </div>
            </div>
        </div>
        
           

            

        
       
       
    </div>
</x-app-layout>
