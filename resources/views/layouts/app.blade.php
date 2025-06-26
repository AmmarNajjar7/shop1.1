<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Barber Shop</title>

    {{-- Core styles --}}
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manage-users.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-nav-fixed.css') }}">
        <link rel="stylesheet" href="{{ asset('css/faq-create.css') }}">



    

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Page-specific styles pushed from child views --}}
    @stack('styles')
</head>
<body>
    <header>
        <nav>
            <ul>
                {{-- ---------------- Guest menu ---------------- --}}
                @guest
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                    <li><a href="{{ route('bookings.index') }}">Appointments</a></li>
                    <li><a href="{{ route('barbers.index') }}">Barbers</a></li>
                    <li><a href="{{ route('faqs.public') }}">FAQs</a></li>
                    <li><a href="{{ route('news.index') }}">News</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest

                {{-- ---------------- Authenticated menu ---------------- --}}
                @auth
                    {{-- ----- Admin links ----- --}}
                    @if(auth()->user()->isAdmin())
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.services.index') }}">Manage Services</a></li>
                        <li><a href="{{ route('admin.barbers.index') }}">Manage Barbers</a></li>
                        <li><a href="{{ route('admin.bookings.index') }}">Manage Bookings</a></li>
                        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                        <li><a href="{{ route('admin.news.index') }}">Manage News</a></li>
                        <li><a href="{{ route('admin.faqs.index') }}">Manage FAQs</a></li>
                        <li><a href="{{ route('admin.comments.index') }}">Manage Comments</a></li>

                    {{-- ----- Regular-user links ----- --}}
                    @else
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('barbers.index') }}">Barbers</a></li>
                        <li><a href="{{ route('user.services.index') }}">Services</a></li>
                        <li><a href="{{ route('bookings.index') }}">Appointments</a></li>
                        <li><a href="{{ route('user.faqs.index') }}">FAQs</a></li>
                        <li><a href="{{ route('news.index') }}">News</a></li>                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                        <li><a href="{{ route('profile.show', auth()->id()) }}">Profile</a></li>
                    @endif

                    {{-- Logout (visible to every authenticated user) --}}
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Barber Shop. All rights reserved.</p>
    </footer>
</body>
</html>
