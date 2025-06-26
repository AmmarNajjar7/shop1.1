<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage-users.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-nav-fixed.css') }}">


    @stack('page-styles')


</head>
<body>
    <header>
        <nav>
            <div class="container"> 
                <ul>
                         <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.services.index') }}">Manage Services</a></li>
                        <li><a href="{{ route('admin.barbers.index') }}">Manage Barbers</a></li>
                        <li><a href="{{ route('admin.bookings.index') }}">Manage Bookings</a></li>
                        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                        <li><a href="{{ route('admin.news.index') }}">Manage News</a></li>
                        <li><a href="{{ route('admin.faqs.index') }}">Manage FAQs</a></li>
                        <li><a href="{{ route('admin.comments.index') }}">Manage Comments</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
            @yield('content') <!-- Content of individual views will be inserted here -->
    </main>

    <footer>
            <p>&copy; {{ date('Y') }} Your App Name. All rights reserved.</p>
    </footer>

    @yield('scripts') <!-- Any additional scripts specific to the view -->
</body>
</html>
