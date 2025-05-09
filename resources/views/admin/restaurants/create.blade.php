@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Restaurant</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.restaurants.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_info" class="form-label">Contact Information</label>
                            <input type="text" class="form-control @error('contact_info') is-invalid @enderror" id="contact_info" name="contact_info" value="{{ old('contact_info') }}" required>
                            @error('contact_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image URL (Optional)</label>
                            <input type="url" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                            <div class="form-text">Enter a valid URL for the restaurant cover image.</div>
                            @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Restaurant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
