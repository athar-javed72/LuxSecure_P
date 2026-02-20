<div class="space-y-5">
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Title *</label>
        <input type="text" name="title" value="{{ old('title', $property?->title) }}" placeholder="e.g. Modern Villa in DHA" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Location *</label>
        <input type="text" name="location" value="{{ old('location', $property?->location) }}" placeholder="e.g. DHA Phase 6, Karachi" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        @error('location')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Type *</label>
        <select name="type" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            @foreach($types as $t)
                <option value="{{ $t }}" {{ old('type', $property?->type) == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Price (PKR) *</label>
        <input type="number" name="price" value="{{ old('price', $property?->price) }}" min="0" placeholder="e.g. 50000000" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        @error('price')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
        <textarea name="description" rows="3" placeholder="Brief description of the property..." class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $property?->description) }}</textarea>
        @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Bedrooms</label>
            <input type="number" name="bedrooms" value="{{ old('bedrooms', $property?->bedrooms) }}" min="0" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Bathrooms</label>
            <input type="number" name="bathrooms" value="{{ old('bathrooms', $property?->bathrooms) }}" min="0" class="mt-1 block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Featured image</label>
        <input type="file" name="featured_image" accept="image/*" class="mt-1 block w-full text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 file:font-medium">
        @error('featured_image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">More images</label>
        <input type="file" name="images[]" accept="image/*" multiple class="mt-1 block w-full text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-slate-100 file:text-slate-700 file:font-medium">
        @error('images.*')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    @if($property)
    <div>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $property->is_active) ? 'checked' : '' }} class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
            <span class="text-sm text-slate-700">Active (visible on site)</span>
        </label>
    </div>
    @else
    <div>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
            <span class="text-sm text-slate-700">Active (visible on site)</span>
        </label>
    </div>
    @endif
</div>
