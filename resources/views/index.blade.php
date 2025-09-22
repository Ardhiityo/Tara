@props(['services' => []])

<x-main>
    <section class="bg-gray-50 py-6 rounded-lg antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-10 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="items-center justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                        Services
                    </h2>
                </div>
                <div class="w-full md:w-1/2">
                    <form class="flex flex-col md:flex-row items-center justify-end" method="GET" action="{{ route('main') }}">
                        <div class="mr-3 w-full justify-center md:justify-end flex gap-2 md:w-auto">
                            <input type="text" id="keyword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 w-1/2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search..." name="keyword">
                            <select id="category"
                                class="bg-gray-50 text-xs border border-gray-300 text-gray-900 w-1/3 md:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="category">
                                <option selected value="">Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}"
                                        {{ old('category', $category->slug) === request('category') ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center md:mt-0 mt-5 justify-center md:justify-end flex-row md:gap-1 gap-3 w-full md:w-auto">
                            <button type="submit"
                                class="text-white order-2 md:order-1 md:w-auto w-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                             <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <a href="{{ route('main') }}"
                                class="text-white text-center bg-blue-700 md:w-auto w-1/3 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 order-1 md:order-2 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mb-4 mt-8 grid gap-6 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
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
                                <ul class="mt-2 flex items-center">
                                    <li class="flex items-center">
                                        <a href="{{ route('main', ['category' => $service->category->slug]) }}"
                                            class="flex gap-2 items-center hover:underline">
                                            <i class="fa-solid fa-tags"></i>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                {{ $service->category->name }}
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="mt-4 flex items-center justify-between gap-4">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                        {{ Number::currency($service->price) }}</p>
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
