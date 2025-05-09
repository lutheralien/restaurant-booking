@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Menu Items - {{ $restaurant->name }}</h4>
                    <div>
                        <a href="{{ route('admin.restaurants.food-items.create', $restaurant->id) }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Food Item
                        </a>
                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Restaurants
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($foodItems->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price (GHS)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($foodItems as $foodItem)
                                        <tr>
                                            <td>{{ $foodItem->id }}</td>
                                            <td>
                                                @if($foodItem->image_url)
                                                    <img src="{{ $foodItem->image_url }}" alt="{{ $foodItem->name }}"
                                                         style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                                @else
                                                    <div class="bg-secondary text-white rounded text-center"
                                                         style="width: 50px; height: 50px; line-height: 50px;">
                                                        <i class="fas fa-utensils"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $foodItem->name }}</td>
                                            <td>{{ $foodItem->category }}</td>
                                            <td>{{ number_format($foodItem->price, 2) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.restaurants.food-items.edit', [$restaurant->id, $foodItem->id]) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.restaurants.food-items.destroy', [$restaurant->id, $foodItem->id]) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this food item?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $foodItems->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            No food items added yet. <a href="{{ route('admin.restaurants.food-items.create', $restaurant->id) }}">Add your first food item</a>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
