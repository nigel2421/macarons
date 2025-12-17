<div class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">{{ old('description', $product->description ?? '') }}</textarea>
    </div>
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Price (in Ksh) for a single piece</label>
        <input type="text" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
    </div>
    <div>
        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
        <input type="file" name="images[]" id="images" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
    </div>

    <div class="space-y-2">
        <h3 class="text-lg font-medium text-gray-800">Variants</h3>
        @for ($i = 0; $i < 3; $i++)
            <div class="flex space-x-2">
                <input type="text" name="variants[{{ $i }}][name]" placeholder="Variant Name (e.g., Box of 6)" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('variants.'.$i.'.name', $product->variants[$i]['name'] ?? '') }}">
                <input type="text" name="variants[{{ $i }}][price]" placeholder="Price" class="w-32 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('variants.'.$i.'.price', $product->variants[$i]['price'] ?? '') }}">
            </div>
        @endfor
    </div>
</div>

<div class="mt-8 flex justify-end">
    <button type="submit" class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-pink-600 transition-colors">Save Product</button>
</div>
