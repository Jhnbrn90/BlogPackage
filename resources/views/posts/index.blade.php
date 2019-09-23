<h1>Showing all Posts</h1>

@forelse ($posts as $post)
    <li>{{ $post->title }}</li>
@empty
    <p> 'No posts yet' </p>
@endforelse
