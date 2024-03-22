@if(session()->has('success'))
    <div class="border rounded border-green-400 bg-green-100">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="border rounded border-red-400 bg-red-100 p-4 mb-4">
        {{ session('error') }}
    </div>
@endif
