<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <a href="{{ route('view_create') }}"> + </a>
            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route('view_create') }}" class="text-sm font-semibold leading-6 text-gray-900">Create<span
                        aria-hidden="true"></span></a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->

    </header>

    {{-- <dialog id="myDialog">
        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-blue text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-blue px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <x-category :category="$category"></x-category>
                            <i id="closeDialog">X</i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </dialog>
    <button id="openDialog">
        <div class="min-w-0 flex-auto">
            <p class="text-sm font-semibold leading-6 text-gray-900"> {{ $category->title }}
            </p>
        </div>
    </button> --}}


    <ul role="list" class="divide-y divide-gray-100">
        @if (!empty($categories))
            @foreach ($categories as $category)
                <x-category :category="$category"></x-category>
            @endforeach
        @else
            <h1> No items </h1>
        @endif
    </ul>
</body>
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
                body: JSON.stringify({
                    id: id
                })
            }).then(
                location.reload(true)
            )

            console.log("success");
        }
    }
</script>

</html>
