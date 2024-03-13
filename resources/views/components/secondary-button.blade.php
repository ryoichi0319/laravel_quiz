<button {{ $attributes->merge(['type' => 'button',
 'class' => 'inline-flex items-center
  px-6 py-3 bg-blue-500 hover:bg-blue-400
   border border-gray-300 rounded-md font-semibold
    text-xs text-white uppercase tracking-widest shadow-sm
      focus:outline-none focus:ring-2
      focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25
       transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
