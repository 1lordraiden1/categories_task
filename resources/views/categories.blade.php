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
    <dialog id="deleteDialog">
        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        Deactivate account</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your
                                            account? All of your data will be permanently removed. This action cannot be
                                            undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button id="confirmDelete" type="button"
                                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
                            <button id="cancelDelete" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

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
                                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                <x-category :category="$category"></x-category>
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
                            <button id="openDelete" href=""> delete </button>
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
    const confirmDelete = document.getElementById('confirmDelete');
    const cancelDelete = document.getElementById('cancelDelete');

    const itemListContainer = document.getElementById('itemList');

    // Show the modal dialog
    openButton.addEventListener('click', () => {
        myDialog.showModal();
    });

    openDelete.addEventListener('click', () => {
        deleteDialog.showModal();
    });

    cancelDelete.addEventListener('click', () => {
        deleteDialog.close();
    });

    // Close the modal dialog
    closeButton.addEventListener('click', () => {
        myDialog.close();
    });
</script>

</html>
