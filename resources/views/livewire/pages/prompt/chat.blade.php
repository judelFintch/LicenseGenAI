<div>
   
    
  
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Submit a Document</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="file" class="block text-gray-700">Upload File:</label>
                <input type="file" name="file" id="file" class="mt-1 block w-full border rounded-md p-2">
            </div>
            @error('file')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>
   

</div>
