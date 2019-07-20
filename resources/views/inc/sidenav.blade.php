<ul class="list-group mt-4">
        <li class="list-group-item">
                <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('posts.index') }}">Posts</a>
                @if(count(App\Post::all()) > 0)
                        <span class="badge badge-primary badge-pill">{{ App\Post::count() }}</span>
                @endif
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('tags.index') }}">Tags</a>
                @if(count(App\Tag::all()) > 0)
                        <span class="badge badge-primary badge-pill">{{ App\Tag::count() }}</span>
                @endif
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('categories.index') }}">Categories</a>
                @if(count(App\Category::all()) > 0)
                        <span class="badge badge-primary badge-pill">{{ App\Category::count() }}</span>
                @endif
        </li>
</ul>

<ul class="list-group mt-4">
        <li class="list-group-item">
                <a href="{{ route('posts.trashed') }}">Trashed Posts</a>
        </li>
</ul>