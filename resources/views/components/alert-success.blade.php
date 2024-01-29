@props(['message' => ''])

<div class="absolute w-full top-0 inset-x-0 p-7 z-20 bg-green-200" x-data="{ show: true }" x-transition:enter.duration.200ms x-transition:leave.duration.200ms
    x-init="setTimeout(() => show = false, 5000)" x-show="show">
    <div class="flex justify-between">
        <div class="flex justify-start">
            <span class="mr-3">✅</span>
            <div class="flex flex-col">
                <span class="font-bold text-green-800">Success</span>
                <span class="font-medium text-green-700">{{ $message }}</span>
            </div>
        </div>
        <div>
            <button type="button"
                @click="show = false"
                class="rounded-full transition-colors duration-300 text-green-600 hover:text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x w-7 h-7"
                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M10 10l4 4m0 -4l-4 4" />
                </svg>
            </button>
        </div>
    </div>
</div>
