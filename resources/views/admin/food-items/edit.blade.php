@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Food Item - {{ $restaurant->name }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.restaurants.food-items.update', [$restaurant->id, $foodItem->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name', $foodItem->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3" required>{{ old('description', $foodItem->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (GHS)</label>
                            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror"
                                   id="price" name="price" value="{{ old('price', $foodItem->price) }}" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror"
                                    id="category" name="category" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ old('category', $foodItem->category) == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image URL (Optional)</label>
                            <input type="url" class="form-control @error('image_url') is-invalid @enderror"
                                   id="image_url" name="image_url" value="{{ old('image_url', $foodItem->image_url) }}">
                            <div class="form-text">Enter a valid URL for the food item image.</div>
                            @error('image_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if($foodItem->image_url)
                            <div class="mb-3">
                                <label class="form-label">Current Image</label>
                                <div>
                                    <img src="{{ $foodItem->image_url }}" alt="{{ $foodItem->name }}"
                                         class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.restaurants.food-items.index', $restaurant->id) }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">Update Food Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
