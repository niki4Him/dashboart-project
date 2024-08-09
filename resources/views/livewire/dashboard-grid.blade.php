<div class="container mx-auto py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($buttons as $button)
            <div class="relative flex items-center justify-center">
                <!-- Основен бутон -->
                <button class="w-full h-32 flex items-center justify-center border border-gray-400 rounded-md"
                        style="background-color: {{ $button->color }};"
                        wire:click="handleButtonClick({{ $button->id }})">
                    <div class="flex items-center justify-center w-16 h-16 bg-white border-4 border-black rounded-full">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                    </div>
                </button>

                @if($button->url)
                    <button wire:click="deleteButtonConfiguration({{ $button->id }})"
                            class="absolute top-2 right-2 p-1 bg-red-600 hover:bg-red-700 text-white font-bold rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 transition-all text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                @endif
            </div>
        @endforeach
    </div>


    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-auto bg-smoke-light flex">
            <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
                <h2 class="text-xl mb-4">Edit Button Configuration</h2>

                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="text" id="url" wire:model="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                <label for="color" class="block text-sm font-medium text-gray-700 mt-4">Color</label>
                <input type="color" id="color" wire:model="color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                <div class="mt-6 flex justify-end space-x-3">
                    <button wire:click="saveButtonConfiguration" class="px-4 py-2 bg-green-500 text-white rounded-md">Save</button>
                    <button wire:click="$set('showModal', false)" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    @endif


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('new-tab', event => {
                window.open(event[0].url, '_blank');
            });
        });
    </script>
</div>
