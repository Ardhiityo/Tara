<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex gap-x-[40px] sm:px-6 lg:px-8">
            <div class="bg-white w-sm shadow-xs sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4 items-center justify-center py-[60px] text-gray-900">
                    Total Merchant
                    <span>0</span>
                </div>
            </div>
            <div class="bg-white w-sm shadow-xs sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4 items-center justify-center py-[60px] text-gray-900">
                    Status
                    <span>Active</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto flex gap-x-[40px] sm:px-6 lg:px-8">
        <x-product />
    </div>

</x-app-layout>
