<div class="flex flex-row gap-4 items-center max-h-[75px]">
    <a href="{{ route('homepage') }}" class="h-full w-auto">
        <img class="h-full w-auto" src="{{ asset('images/dole-cavite.png') }}" alt="">
    </a>
    <img class="h-full w-auto" src="{{ asset('images/bagong-pilipinas.png') }}" alt="">
    <div class="flex flex-col justify-evenly grow">
        <div class="text-2xl font-bold uppercase grow h-full w-full">{{ $headerTitle }}</div>
        <div class="text-lg uppercase grow h-full w-full">{{ $headerSubtitle }}</div>
    </div>
    <div class="flex flex-col justify-evenly text-right">
        {{-- logout button --}}
        @if (Auth::check())
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="text-2xl font-bold uppercase grow h-full w-full">
                    {{ $date }}</div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                    @if (Auth::user()->hasRole('admin'))
                        <li><a href="{{ route('admin.users') }}"><i
                                    class="min-w-[20px] text-center fa-solid fa-users"></i> Users</a></li>
                    @endif
                    <li><a href="{{ route('profile.edit') }}"><i class="min-w-[20px] text-center fa-solid fa-user"></i>
                            Account</a></li>
                    <form action="{{ route('logout') }}" method="post">@csrf
                        <li>
                            <button type="submit"><i
                                    class="min-w-[20px] text-center fa-solid fa-right-from-bracket"></i> Logout</button>
                        </li>
                    </form>
                </ul>
            </div>

            <div id="current-time" class="text-lg uppercase grow h-full w-full group">{{ $time }}</div>
        @else
            <a href="{{ route('login') }}"
                class="text-2xl font-bold uppercase grow h-full w-full">{{ $date }}</a>
            <div id="current-time" class="text-lg uppercase grow h-full w-full">{{ $time }}</div>
        @endif
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const options = {
            timeZone: 'Asia/Manila',
            hour12: true,
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        const timeString = now.toLocaleTimeString('en-US', options);
        document.getElementById('current-time').textContent = timeString;
    }
    setInterval(updateTime, 1000);
    updateTime();
</script>
