<form action="{{ route('dashboard.logout') }}" method="POST">
    @csrf
    <button
        type="submit"
        class="{{ $class ?? 'menu-item flex flex-row gap-3 items-center justify-start text-sm w-full' }}"
    >
        <i class="fa-solid fa-right-from-bracket {{ $iconClass ?? 'fa-xl' }}"></i>
        خروج
    </button>
</form>
