<ul>
    @foreach ($results as $r)
        <li class="search-result-item">
            <a href="{{ route('home.searchResult', ['nama' => Str::slug($r->nama_perseroan)]) }}">
                {{ e($r->nama_perseroan) }}
            </a>
        </li>
    @endforeach
</ul>
