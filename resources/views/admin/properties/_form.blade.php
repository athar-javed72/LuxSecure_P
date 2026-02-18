<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Title *</label>
        <input type="text" name="title" value="{{ old('title', $property?->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Location *</label>
        <input type="text" name="location" value="{{ old('location', $property?->location) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        @error('location')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Type *</label>
        <select name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            @foreach($types as $t)
                <option value="{{ $t }}" {{ old('type', $property?->type) == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Price (PKR) *</label>
        <input type="number" name="price" value="{{ old('price', $property?->price) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        @error('price')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $property?->description) }}</textarea>
        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
            <input type="number" name="bedrooms" value="{{ old('bedrooms', $property?->bedrooms) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
            <input type="number" name="bathrooms" value="{{ old('bathrooms', $property?->bathrooms) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Featured image</label>
        <input type="file" name="featured_image" accept="image/*" class="mt-1 block w-full">
        @error('featured_image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">More images</label>
        <input type="file" name="images[]" accept="image/*" multiple class="mt-1 block w-full">
        @error('images.*')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    @if($property)
    <div>
        <label class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $property->is_active) ? 'checked' : '' }} class="rounded border-gray-300">
            <span class="ml-2 text-sm text-gray-700">Active (visible on site)</span>
        </label>
    </div>
    @else
    <div>
        <label class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300">
            <span class="ml-2 text-sm text-gray-700">Active (visible on site)</span>
        </label>
    </div>
    @endif
</div>
