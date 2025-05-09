@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Restaurants</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @forelse ($restaurants as $restaurant)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    @if ($restaurant->cover_image)
                                        <img src="{{ $restaurant->cover_image }}" class="card-img-top" alt="{{ $restaurant->name }}">
                                    @else
                                        <div class="card-img-top bg-secondary text-white text-center py-5">
                                            <i class="fas fa-utensils fa-3x"></i>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($restaurant->description, 100) }}</p>
                                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $restaurant->location }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('customer.restaurants.show', $restaurant->id) }}" class="btn btn-primary">View Menu</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No restaurants found.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $restaurants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
