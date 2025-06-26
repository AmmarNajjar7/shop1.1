@extends('layouts.admin')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('css/manage-users.css') }}">
@endpush

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Users</h1>
        <!-- Add New User Button -->
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg">Add New User</a>
    </div>

    <!-- Success or Error Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Users Table -->
    <div class="users-table-container">
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td data-label="#">{{ $user->id }}</td>
                        <td data-label="Name">
                            <div class="user-info">
                                <div class="user-avatar">{{ substr($user->name, 0, 1) }}</div>
                                <div class="user-details">
                                    <div class="user-name">{{ $user->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td data-label="Email">{{ $user->email }}</td>
                        <td data-label="Role">
                            <span class="role-badge role-{{ strtolower($user->role) }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td data-label="Actions">
                            <div class="action-buttons">
                                <!-- Promote/Demote Actions -->
                                @if ($user->role === 'user')
                                    <form method="POST" action="{{ route('admin.users.promote', $user->id) }}" class="inline-form">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            Promote to Admin
                                        </button>
                                    </form>
                                @elseif ($user->role === 'admin')
                                    <form method="POST" action="{{ route('admin.users.demote', $user->id) }}" class="inline-form">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            Demote to User
                                        </button>
                                    </form>
                                @endif

                                <!-- Edit User -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <!-- Delete User -->
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection