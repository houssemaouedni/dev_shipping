
    @if(session()->has('success'))
    <div x-data="{ show: true}"
         x-init="setTimeout(() => show = false, 8000)"
         x-show="show"
         class="fixed right-3 top-20 bg-primary text-white py-2 px-4 rounded-xl mt-2">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session()->has('error'))
    <div x-data="{ show: true}"
         x-init="setTimeout(() => show = false, 10000)"
         x-show="show"
         class="fixed right-3 top-20 bg-red-500 text-white py-2 px-4 rounded-xl mt-2">
        <p>{{ session('error') }}</p>
    </div>
    @endif
