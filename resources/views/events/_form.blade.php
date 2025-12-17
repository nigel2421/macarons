<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $event->name ?? '') }}" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required>{{ old('description', $event->description ?? '') }}</textarea>
        </div>
    </div>
    <div>
        <div class="mb-6">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
            <input type="datetime-local" name="date" id="date" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date', isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="mb-6">
            <label for="image_url" class="block text-gray-700 text-sm font-bold mb-2">Image URL</label>
            <input type="text" name="image_url" id="image_url" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('image_url', $event->image_url ?? '') }}">
        </div>
    </div>
</div>

<div class="mt-8 flex justify-end">
    <button type="submit" class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold hover:bg-pink-600 transition-colors">{{ $submitButtonText ?? 'Submit' }}</button>
</div>
