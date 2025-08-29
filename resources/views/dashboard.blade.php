<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('admin')
        <div class="bg-white w-sm shadow-xs sm:rounded-lg">
            <div class="p-6 flex flex-col gap-4 items-center justify-center py-[60px] text-gray-900">
                Total Merchant
                <span>0</span>
            </div>
        </div>
    @endrole

    @role('merchant')
        <div class="bg-white w-sm shadow-xs sm:rounded-lg">
            <div class="p-6 flex flex-col gap-4 items-center justify-center py-[60px] text-gray-900">
                Total Services
                <span>0</span>
            </div>
        </div>
        <div class="bg-white w-sm shadow-xs sm:rounded-lg">
            <div class="p-6 flex flex-col gap-4 items-center justify-center py-[60px] text-gray-900">
                Status
                <span>Active</span>
            </div>
        </div>
    @endrole

    @role('merchant')
        <x-service />
    @endrole
    @role('admin')
        <x-merchant />
    @endrole
</x-app-layout>
