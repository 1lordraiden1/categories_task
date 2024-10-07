@props(['category'])

<div>
    {{ $category->title }} ({{ $category->id }})

    @foreach ($category->children as $child)
        <div>
            <x-category :category="$child"></x-category>
        </div>
    @endforeach
</div>