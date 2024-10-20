@props(['category'])

<details>
    <summary> {{ $category->title }} ({{ $category->id }})
        <a href=""> edit </a>
        <button onclick="confirmDelete({{ $category->id }} , '{{ $category->title }}')"> delete
        </button>
    </summary>
    <div>


    </div>
    <ul class="">
        @foreach ($category->children as $child)
            <x-category :category="$child"></x-category>
        @endforeach
    </ul>
</details>



<script>
    function confirmDelete(id, title) {
        if (confirm("Are you sure you want to delete " + title + " ?")) {
            console.log(id);
            fetch('{{ route('delete_category', ':id') }}'.replace(':id', id), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            console.log("success");
        }
    }
    // Close the modal dialog
</script>
