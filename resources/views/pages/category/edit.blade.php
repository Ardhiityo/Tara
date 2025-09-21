<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 mb-8">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Back
                </a>
            </div>
            <h2 class="mt-12 mb-8 text-xl font-bold text-gray-900 dark:text-white">Add Category</h2>
            <form action="{{ route('category.update', ['category' => $category->slug]) }}" method="POST">
                @csrf
                @method('PATCH')
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <ul class="px-4">
                            @foreach ($errors->all() as $error)
                                <li class="list-disc">
                                    <span class="font-medium">{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Category
                        </label>
                        <input type="text" name="name" id="name" name="name"
                            value="{{ old('name', $category->name) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " required>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-4">
                    <button type="submit"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
