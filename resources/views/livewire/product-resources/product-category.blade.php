<ul class="flex gap-3 cursor-grab">
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('home', ['category' => $category->id]) }}">
                <div class="py-2 px-4 text-white font-medium rounded-lg bg-opacity-90 transition-transform transform hover:scale-105"
                     style="background-color: {{ request('category') == $category->id ? '#218838' : '#28A745' }}">
                    {{ $category->name }}
                </div>
            </a>
        </li>
    @endforeach
</ul>

