<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Submit a Document</h2>

    @if ($error)
        <div class="text-red-500 mb-4">{{ $error }}</div>
    @endif

    <form wire:submit.prevent="processFile" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label for="file" class="block text-gray-700">Upload File:</label>
            <input type="file" wire:model="file" id="file" class="mt-1 block w-full border rounded-md p-2">
            @error('file')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit
        </button>
    </form>

    @if ($output)
        <div class="mt-6">
            <h3 class="text-lg font-bold mb-2">Processed Output:</h3>
            <pre class="bg-gray-100 p-4 rounded">{{ json_encode($output, JSON_PRETTY_PRINT) }}</pre>
        </div>
    @endif
</div>