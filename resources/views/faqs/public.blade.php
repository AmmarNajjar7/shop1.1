@extends('layouts.app')

@section('content')
<div class="container faq-container">
    <h1 class="faq-title">Questions & Answers</h1>

    <div class="faq-wrapper">
        <!-- Sidebar for Categories -->
        <aside class="faq-categories">
            <h3>Categories</h3>
            <ul id="faq-categories">
                @foreach($categories as $category)
                    <li>
                        <a href="#" class="category-link" data-category-id="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- FAQ Content -->
        <div class="faq-content" id="faq-content">
            <p>Select a category to view related FAQs.</p>
        </div>
    </div>
</div>

<!-- Comments Section -->
<div class="container comment-section">
    @auth
        @if(auth()->user()->role === 'admin')
            <!-- Admin View: Manage Comments -->
            <div class="admin-manage-comments">
                <h2>Manage Comments</h2>
                <p>Click below to manage all user comments.</p>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-primary">Manage Comments</a>
            </div>
        @else
            <!-- User View: Add/Edit/Delete Comments -->
            <h2>Community Comments</h2>
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <textarea name="content" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>

            <!-- Display User Comments -->
            <div class="user-comments mt-4">
                <h3>Your Comments</h3>
                @foreach($userComments as $comment)
                    <div class="comment-item">
                        <p><strong>{{ $comment->faq->question }}</strong></p>
                        <p>{{ $comment->content }}</p>
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <!-- Guest View -->
        <p><a href="{{ route('login') }}">Log in</a> to join the discussion.</p>
    @endauth
</div>
@endsection
