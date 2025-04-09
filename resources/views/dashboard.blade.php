<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gold-500 leading-tight flex items-center">
            <i class="fas fa-gem ml-2"></i>
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black bg-opacity-80 rounded-lg shadow-lg border border-gold-500 border-opacity-30 overflow-hidden backdrop-blur-sm">
                <div class="p-6 text-gold-300">
                    <div class="flex items-center justify-center gap-4">
                        <i class="fas fa-check-circle text-2xl text-gold-500"></i>
                        <span class="text-lg">{{ __("تم تسجيل الدخول بنجاح!") }}</span>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>