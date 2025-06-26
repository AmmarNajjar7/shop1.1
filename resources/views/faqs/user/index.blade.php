@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/faq-styles.css') }}">
@endpush

@section('content')
<div class="container faq-container">
    <h1 class="faq-title">Veelgestelde Vragen</h1>

    <div class="faq-wrapper">
        <!-- Sidebar for Categories -->
        <aside class="faq-categories">
            <h3>Categorieën</h3>
            <ul id="faq-categories">
                <li>
                    <a href="#all-faqs" class="category-link active" data-category="all">
                        Alle FAQs
                    </a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="#category-{{ $category->id }}" class="category-link" data-category="{{ $category->id }}">
                            {{ $category->name }}
                            <span class="faq-count">({{ $category->faqs_count ?? $category->faqs->count() }})</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- FAQ Content -->
        <div class="faq-content">
            <!-- All FAQs Section -->
            <div id="all-faqs" class="category-section active">
                <h2>Alle Veelgestelde Vragen</h2>
                <p class="category-description">Hier vind je alle FAQs overzichtelijk gegroepeerd per categorie.</p>
                
                @foreach($categories as $category)
                    @if($category->faqs->count() > 0)
                        <div class="category-group">
                            <h3 class="category-group-title">
                                <i class="category-icon">📂</i>
                                {{ $category->name }}
                                <span class="category-badge">{{ $category->faqs->count() }} {{ $category->faqs->count() == 1 ? 'vraag' : 'vragen' }}</span>
                            </h3>
                            
                            @foreach($category->faqs as $faq)
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <h4>{{ $faq->question }}</h4>
                                    </div>
                                    <div class="faq-answer">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                    <div class="faq-meta">
                                        <span class="faq-author">
                                            <strong>Toegevoegd door:</strong> {{ $faq->user->name ?? 'Onbekend' }}
                                        </span>
                                        <span class="faq-date">
                                            <strong>Op:</strong> {{ $faq->created_at->format('d M Y, H:i') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Individual Category Sections -->
            @foreach($categories as $category)
                <div id="category-{{ $category->id }}" class="category-section" style="display: none;">
                    <h2>{{ $category->name }}</h2>
                    
                    @if($category->description)
                        <p class="category-description">{{ $category->description }}</p>
                    @endif
                    
                    @if($category->faqs->count() > 0)
                        @foreach($category->faqs as $faq)
                            <div class="faq-item">
                                <div class="faq-question">
                                    <h4>{{ $faq->question }}</h4>
                                </div>
                                <div class="faq-answer">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                                <div class="faq-meta">
                                    <span class="faq-author">
                                        <strong>Toegevoegd door:</strong> {{ $faq->user->name ?? 'Onbekend' }}
                                    </span>
                                    <span class="faq-date">
                                        <strong>Op:</strong> {{ $faq->created_at->format('d M Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-faqs">
                            <p>Er zijn nog geen vragen in deze categorie.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('.category-link');
    const categorySections = document.querySelectorAll('.category-section');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            categoryLinks.forEach(l => l.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Hide all sections
            categorySections.forEach(section => {
                section.style.display = 'none';
                section.classList.remove('active');
            });
            
            // Show selected section
            const categoryId = this.getAttribute('data-category');
            const targetSection = categoryId === 'all' 
                ? document.getElementById('all-faqs')
                : document.getElementById('category-' + categoryId);
                
            if (targetSection) {
                targetSection.style.display = 'block';
                targetSection.classList.add('active');
            }
        });
    });
});
</script>
@endsection