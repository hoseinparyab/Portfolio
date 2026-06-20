@if (session('success'))
    <div class="mb-4 flex items-center gap-3 p-4 text-sm rounded-lg border bg-green-50 text-green-800 border-green-300">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mb-4 flex items-center gap-3 p-4 text-sm rounded-lg border bg-red-50 text-red-800 border-red-300">
        <span>⛔</span>
        <span>{{ session('error') }}</span>
    </div>
@endif

@if (session('warning'))
    <div class="mb-4 flex items-center gap-3 p-4 text-sm rounded-lg border bg-yellow-50 text-yellow-800 border-yellow-300">
        <span>⚠️</span>
        <span>{{ session('warning') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 flex flex-col gap-2 p-4 text-sm rounded-lg border bg-red-50 text-red-800 border-red-300">
        @foreach ($errors->all() as $error)
            <div class="flex items-center gap-3">
                <span>⛔</span>
                <span>{{ $error }}</span>
            </div>
        @endforeach
    </div>
@endif
