<style>
    .marquee-container {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
    }

    .marquee-text {
        display: inline-block;
        animation: marquee 15s linear infinite;
        text-transform: uppercase;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-300%);
        }
    }

    /* Pause animation on hover */
    .marquee-container:hover .marquee-text {
        animation-play-state: paused;
    }
</style>

<div class="w-full py-1 sm:py-2 text-xs sm:text-sm lg:text-base text-gray-600 overflow-hidden">
    <div class="marquee-container space-x-8">
        @for ($i = 0; $i < 6; $i++)
            <div class="marquee-text">
                Department of Labor and Employment Region IV-A Cavite Provincial Office
            </div>
        @endfor
    </div>
</div>
