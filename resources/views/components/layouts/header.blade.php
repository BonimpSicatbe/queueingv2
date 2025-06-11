<div class="flex flex-row gap-4 items-center max-h-[75px]">
    <img class="h-full w-auto" src="{{ asset('images/dole-cavite.png') }}" alt="">
    <img class="h-full w-auto" src="{{ asset('images/bagong-pilipinas.png') }}" alt="">
    <div class="flex flex-col justify-evenly grow">
        <div class="text-2xl font-bold uppercase grow h-full w-full">{{ $headerTitle }}</div>
        <div class="text-lg uppercase grow h-full w-full">{{ $headerSubtitle }}</div>
    </div>
    <div class="flex flex-col justify-evenly text-right">
        <div class="text-2xl font-bold uppercase grow h-full w-full">{{ $date }}</div>
        <div id="current-time" class="text-lg uppercase grow h-full w-full">{{ $time }}</div>
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
