<div class="absolute w-full p-7 z-20" :class="alertType === 'success' ? 'bg-green-200' : 'bg-red-200'">
    <div class="flex justify-between">
        <div class="flex justify-start">
            <span class="mr-3" x-show="alertType === 'success'">✅</span>
            <span class="mr-3" x-show="alertType === 'failed'">❌</span>
            <div class="flex flex-col">
                <span class="font-bold" :class="alertType === 'success' ? 'text-green-800' : 'text-red-800'" x-text="alertType === 'success' ? 'Success' : 'Failed'"></span>
                <span x-text="alertMessage" class="font-medium" :class="alertType === 'success' ? 'text-green-700' : 'text-red-700'"></span>
            </div>
        </div>
        <div>
            <button type="button" @click="close"
                class="rounded-full transition-colors duration-300" :class="alertType === 'success' ? 'text-green-600 hover:text-green-700' : 'text-red-600 hover:text-red-700'">
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
