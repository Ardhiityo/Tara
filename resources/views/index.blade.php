@props(['services' => []])

<x-main>
    <section class="bg-gray-50 py-12 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-10 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-0 items-center justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                        Services
                    </h2>
                </div>
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" method="GET" action="{{ route('main') }}">
                        <label for="keyword" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="keyword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" name="keyword">
                        </div>
                        <button type="submit"
                            class="text-white ml-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Search
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-4 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($services as $service)
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="{{ route('main.show', ['service' => $service->slug]) }}">
                            <div class="h-56 w-full">
                                <img class="mx-auto h-full dark:hidden" src="{{ Storage::url($service->photo) }}"
                                    alt="{{ $service->title }}" />
                            </div>
                            <div class="pt-6">
                                <span
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $service->title }}</span>
                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-tags"></i>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            {{ $service->type }}
                                        </p>
                                    </li>
                                </ul>

                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                        {{ Number::currency($service->price) }}</p>
                                    <button type="button"
                                        class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="w-full text-center">
                {{ $services->links() }}
            </div>
        </div>
    </section>
</x-main>
