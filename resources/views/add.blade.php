<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @if (!empty($status) && $status === 'failed')
        <p class="danger"> failed to create category </p>
    @endif
    @if (!empty($errors))
        @foreach ($errors as $error)
            <div>
                <p> {{ $error->message }} </p>
            </div>
        @endforeach
    @endif
    <form action="{{ route('create') }}" method="post">
        @csrf
        @method('POST')
        <div class="relative isolate overflow-hidden bg-gray-900 py-16 sm:py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                    <div class="max-w-xl lg:max-w-lg">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Create Category.
                        </h2>
                        <div class="mt-6 flex max-w-md gap-x-4">
                            <label for="title" class="sr-only">Title</label>
                            <input id="title" name="title" type="text" autocomplete="title" required
                                class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                                placeholder="Enter Category">
                            <button type="submit"
                                class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                Create </button>
                        </div>
                    </div>
                    <label for="parent" class="sr-only"> Select Parent </label>
                    <select name="parent_id" id="parent_id">
                        <option value=""> none </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                <ul class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                    tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                    aria-activedescendant="listbox-option-3">

                                    <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                                        id="listbox-option-0" role="option">

                                        <div class="flex items-center">
                                            <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                                            <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                            <span class="ml-3 block truncate font-normal"> {{ $category->title }}
                                            </span>
                                        </div>

                                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </li>

                                    <!-- More items... -->
                                </ul>
                            </option>
                        @endforeach
                    </select>
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                        <div>
                            <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assigned
                                to</label>
                            <div class="relative mt-2">





                            </div>
                        </div>

                    </dl>
                </div>
            </div>
            <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6" aria-hidden="true">
                <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </form>

</body>

</html>
