<h2>My FAQs</h2>
<a href="{{ route('user.faqs.create') }}">Add New FAQ</a>
<ul>
    @foreach($faqs as $faq)
        <li>
            <strong>{{ $faq->question }}</strong>
            <p>{{ $faq->answer }}</p>
            <a href="{{ route('user.faqs.edit', $faq->id) }}">Edit</a>
            <form method="POST" action="{{ route('user.faqs.destroy', $faq->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
