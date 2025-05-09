@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $restaurant->name }}</h4>
                    <div>
                        <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.restaurants.food-items.index', $restaurant->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-utensils"></i> Manage Menu
                        </a>
                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @if ($restaurant->cover_image)
                            <div class="col-md-12 mb-4">
                                <img src="{{ $restaurant->cover_image }}" alt="{{ $restaurant->name }}" class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        @endif

                        <div class="col-md-6">
                            <h5>Description</h5>
                            <p>{{ $restaurant->description }}</p>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Restaurant Details</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Location:</strong> {{ $restaurant->location }}</li>
                                        <li class="list-group-item"><strong>Contact:</strong> {{ $restaurant->contact_info }}</li>
                                        <li class="list-group-item"><strong>Created:</strong> {{ $restaurant->created_at->format('F j, Y') }}</li>
                                        <li class="list-group-item"><strong>Last Updated:</strong> {{ $restaurant->updated_at->format('F j, Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
