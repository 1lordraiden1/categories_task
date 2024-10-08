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


    <ul role="list" class="divide-y divide-gray-100">
        @if (!empty($categories))
            @foreach ($categories as $category)
                <li class="flex justify-between gap-x-6 p-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <dialog id="myDialog">
                            <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog"
                                aria-modal="true">

                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                    aria-hidden="true"></div>

                                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                    <div
                                        class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
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
                        </button>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <div>
                            <a href=""> edit </a>
                            <button onclick="confirmDelete( {{ $category->id }} , '{{ $category->title }}' )"
                                href=""> delete </button>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <h1> No items </h1>
        @endif
    </ul>
</body>
<script>
    const openButton = document.getElementById('openDialog');
    const closeButton = document.getElementById('closeDialog');
    const myDialog = document.getElementById('myDialog');
    const openDelete = document.getElementById('openDelete');
    const deleteDialog = document.getElementById('deleteDialog');
    const cancelDelete = document.getElementById('cancelDelete');

    const itemListContainer = document.getElementById('itemList');

    // Show the modal dialog
    openButton.addEventListener('click', () => {
        myDialog.showModal();
    });

    function confirmDelete(id, title) {
        const isConfirmed = confirm("Are you sure you want to delete " + title + " ?");

        if (isConfirmed) {
            const json = {}
            console.log("success");

        } else {
            console.log("failure");
        }

    }
    // Close the modal dialog
    closeButton.addEventListener('click', () => {
        myDialog.close();
    });
</script>

</html>
