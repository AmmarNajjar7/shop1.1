@extends('layouts.admin')

@section('content')

<div class="dashboard-container">
    <!-- Welcome Header -->
    <div class="welcome-header">
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <p class="welcome-message">Welcome back! Here's what's happening with your barbershop today.</p>
        <div class="current-time" id="currentTime"></div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📊</div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalBookings ?? 0 }}</h3>
                <p class="stat-label">Total Bookings</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">✂️</div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalServices ?? 0 }}</h3>
                <p class="stat-label">Services</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">👨‍💼</div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalBarbers ?? 0 }}</h3>
                <p class="stat-label">Barbers</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-content">
                <h3 class="stat-number">{{ $totalUsers ?? 0 }}</h3>
                <p class="stat-label">Users</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2 class="section-title">Quick Actions</h2>
        <div class="action-buttons">
            <a href="{{ route('admin.bookings.create') }}" class="action-btn primary">
                <div class="btn-icon">📅</div>
                <span>New Booking</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="action-btn secondary">
                <div class="btn-icon">➕</div>
                <span>Add Service</span>
            </a>
            <a href="{{ route('admin.barbers.create') }}" class="action-btn tertiary">
                <div class="btn-icon">👤</div>
                <span>Add Barber</span>
            </a>
        </div>
    </div>

    <!-- Management Cards -->
    <div class="management-section">
        <h2 class="section-title">Management Center</h2>
        <div class="dashboard-links">
            <div class="dashboard-card services">
                <a href="{{ route('admin.services.index') }}">
                    <div class="card-header">
                        <div class="card-icon">✂️</div>
                        <div class="card-badge">{{ $totalServices ?? 0 }}</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage Services</h3>
                        <p>View, add, and update available services and their pricing.</p>
                        <div class="card-features">
                            <span class="feature">💰 Pricing</span>
                            <span class="feature">📝 Descriptions</span>
                            <span class="feature">⏱️ Duration</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>

            <div class="dashboard-card barbers">
                <a href="{{ route('admin.barbers.index') }}">
                    <div class="card-header">
                        <div class="card-icon">👨‍💼</div>
                        <div class="card-badge">{{ $totalBarbers ?? 0 }}</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage Barbers</h3>
                        <p>View, add, or edit barber profiles and their availability.</p>
                        <div class="card-features">
                            <span class="feature">👤 Profiles</span>
                            <span class="feature">📅 Schedule</span>
                            <span class="feature">⭐ Ratings</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>

            <div class="dashboard-card bookings">
                <a href="{{ route('admin.bookings.index') }}">
                    <div class="card-header">
                        <div class="card-icon">📋</div>
                        <div class="card-badge">{{ $totalBookings ?? 0 }}</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage Bookings</h3>
                        <p>View and update customer appointments and schedules.</p>
                        <div class="card-features">
                            <span class="feature">📅 Calendar</span>
                            <span class="feature">🔄 Status</span>
                            <span class="feature">📞 Contact</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>

            <div class="dashboard-card users">
                <a href="{{ route('admin.users.index') }}">
                    <div class="card-header">
                        <div class="card-icon">👥</div>
                        <div class="card-badge">{{ $totalUsers ?? 0 }}</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage Users</h3>
                        <p>View and manage customer accounts and user roles.</p>
                        <div class="card-features">
                            <span class="feature">👤 Accounts</span>
                            <span class="feature">🔐 Roles</span>
                            <span class="feature">📊 Activity</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>

            <div class="dashboard-card news">
                <a href="{{ route('admin.news.index') }}">
                    <div class="card-header">
                        <div class="card-icon">📰</div>
                        <div class="card-badge">New</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage News</h3>
                        <p>Create and manage news articles and announcements.</p>
                        <div class="card-features">
                            <span class="feature">📝 Articles</span>
                            <span class="feature">📢 Announcements</span>
                            <span class="feature">📅 Schedule</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>

            <div class="dashboard-card faqs">
                <a href="{{ route('admin.faqs.index') }}">
                    <div class="card-header">
                        <div class="card-icon">❓</div>
                        <div class="card-badge">Help</div>
                    </div>
                    <div class="card-content">
                        <h3>Manage FAQs</h3>
                        <p>Create and organize frequently asked questions.</p>
                        <div class="card-features">
                            <span class="feature">❓ Questions</span>
                            <span class="feature">💬 Answers</span>
                            <span class="feature">📂 Categories</span>
                        </div>
                    </div>
                    <div class="card-arrow">→</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="recent-activity">
        <h2 class="section-title">Recent Activity</h2>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon">📅</div>
                <div class="activity-content">
                    <p class="activity-text">New booking created</p>
                    <span class="activity-time">2 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">👤</div>
                <div class="activity-content">
                    <p class="activity-text">New user registered</p>
                    <span class="activity-time">15 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">✂️</div>
                <div class="activity-content">
                    <p class="activity-text">Service updated</p>
                    <span class="activity-time">1 hour ago</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Real-time clock
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    document.getElementById('currentTime').textContent = timeString;
}

// Update time every second
setInterval(updateTime, 1000);
updateTime(); // Initial call

// Add some interactive animations
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.dashboard-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>
@endsection