@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $restaurant->name }}</h4>
                    <a href="{{ route('customer.restaurants.index') }}" class="btn btn-secondary btn-sm">
                        Back to Restaurants
                    </a>
                </div>

                <div class="card-body">
                    @if ($restaurant->cover_image)
                        <div class="text-center mb-4">
                            <img src="{{ $restaurant->cover_image }}" alt="{{ $restaurant->name }}" class="img-fluid rounded" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h5>Description</h5>
                            <p>{{ $restaurant->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Contact Information</h5>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $restaurant->location }}</p>
                            <p><i class="fas fa-phone"></i> {{ $restaurant->contact_info }}</p>
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <a href="{{ route('customer.bookings.create', $restaurant->id) }}" class="btn btn-primary">
                            Book a Table
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Menu</h4>
                </div>

                <div class="card-body">
                    @if ($foodItems->count() > 0)
                        <ul class="nav nav-tabs mb-4" id="menuTabs" role="tablist">
                            @foreach($foodItems as $category => $items)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            id="{{ Str::slug($category) }}-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#{{ Str::slug($category) }}"
                                            type="button"
                                            role="tab"
                                            aria-controls="{{ Str::slug($category) }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ $category }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="menuTabContent">
                            @foreach($foodItems as $category => $items)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                     id="{{ Str::slug($category) }}"
                                     role="tabpanel"
                                     aria-labelledby="{{ Str::slug($category) }}-tab">

                                    <div class="row">
                                        @foreach($items as $item)
                                            <div class="col-md-6 mb-4">
                                                <div class="card h-100">
                                                    <div class="row g-0">
                                                        @if ($item->image_url)
                                                            <div class="col-md-4">
                                                                <img src="{{ $item->image_url }}" class="img-fluid rounded-start h-100" alt="{{ $item->name }}">
                                                            </div>
                                                        @endif
                                                        <div class="{{ $item->image_url ? 'col-md-8' : 'col-md-12' }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                                <p class="card-text">{{ $item->description }}</p>
                                                                <p class="card-text"><strong>GHS {{ number_format($item->price, 2) }}</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            No menu items available for this restaurant.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
