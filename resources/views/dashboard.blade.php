<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('admin')
        <div class="flex gap-6">
            <div class="bg-white w-sm shadow-xs sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4 items-center justify-center py-[50px] text-gray-900">
                    <h3>Total Merchant</h3>
                    <span>0</span>
                </div>
            </div>
        </div>
    @endrole

    @role('merchant')
        <div class="flex gap-6">
            <div class="bg-white flex-col w-sm shadow-xs sm:rounded-lg">
                <div class="p-6 flex flex-col gap-4 items-center justify-center py-[50px] text-gray-900">
                    <h3>Total Services</h3>
                    <span>0</span>
                </div>
            </div>
            <div class="bg-white flex-col w-sm shadow-xs sm:rounded-lg">
                <div class="p-6 flex flex-col gap-3 items-center justify-center py-[50px] text-gray-900">
                    <h3>Status</h3>
                    <span>Active</span>
                </div>
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
