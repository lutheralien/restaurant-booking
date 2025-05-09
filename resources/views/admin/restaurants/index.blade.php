@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Restaurants</h4>
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Restaurant
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Contact</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->id }}</td>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>{{ $restaurant->location }}</td>
                                        <td>{{ $restaurant->contact_info }}</td>
                                        <td>{{ $restaurant->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.restaurants.food-items.index', $restaurant->id) }}" class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-utensils"></i> Menu
                                                </a>
                                                <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this restaurant?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No restaurants found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
