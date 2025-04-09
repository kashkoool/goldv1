<nav x-data="{ open: false }" class="bg-black bg-opacity-95 border-b border-gold-500/30 backdrop-filter backdrop-blur-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- لوحة التحكم المعدلة -->
            <div class="flex items-center">
                <x-nav-link 
                    :href="Auth::user()->role === 'store_owner' ? route('store_owner.dashboard') : route('customer.dashboard')" 
                    :active="request()->routeIs('store_owner.dashboard') || request()->routeIs('customer.dashboard')"
                    class="relative group ml-4">
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <div class="relative">
                            <span class="text-gold-500 font-bold text-xl px-4 py-2 rounded-full bg-black bg-opacity-70 border-2 border-gold-500/50 group-hover:border-gold-500 transition-all duration-300 shadow-lg shadow-gold-500/20">
                                لوحة التحكم
                            </span>
                            <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-3/4 h-1 bg-gold-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-center"></span>
                        </div>
                        <i class="fas fa-chart-pie text-2xl text-gold-400 group-hover:text-gold-300 transition-all duration-300 transform group-hover:rotate-12"></i>
                    </div>
                </x-nav-link>
            </div>

            <!-- الشعار على اليمين -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center space-x-2 space-x-reverse">
                    <span class="text-2xl font-bold text-gold-500 font-[Tajawal] tracking-wide">مجوهرات نذار</span>
                    <i class="fas fa-gem text-3xl text-gold-500 animate-[pulse_3s_infinite]"></i>
                </div>
            </div>

            <!-- إعدادات المستخدم -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 space-x-reverse px-4 py-2 rounded-full bg-black bg-opacity-60 border border-gold-500/40 hover:border-gold-500 transition-all duration-300 shadow-md shadow-gold-500/10">
                            <i class="fas fa-user-circle text-xl text-gold-400"></i>
                            <span class="text-gold-300 font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm text-gold-400 transition-transform duration-300 transform group-hover:rotate-180"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="mt-2 border border-gold-500/30 bg-black bg-opacity-90 backdrop-blur-lg rounded-xl shadow-xl shadow-gold-500/10">
                        <x-dropdown-link :href="route('profile.edit')" class="px-4 py-3 text-gold-300 hover:bg-gold-500 hover:text-black transition-all duration-300">
                            <i class="fas fa-user-edit ml-2"></i>
                            <span>الملف الشخصي</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="px-4 py-3 text-gold-300 hover:bg-red-600 hover:text-white transition-all duration-300">
                                <i class="fas fa-sign-out-alt ml-2"></i>
                                <span>تسجيل الخروج</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- زر القائمة على الجوال -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-full bg-black bg-opacity-60 border border-gold-500/40 hover:border-gold-500 text-gold-400 focus:outline-none transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" :class="{'hidden': open, 'inline-flex': !open}" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" :class="{'hidden': !open, 'inline-flex': open}" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- القائمة المنسدلة للجوال -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-black bg-opacity-95 border-t border-gold-500/30">
        <div class="pt-4 pb-2">
            <div class="flex items-center justify-center px-4 py-3 border-b border-gold-500/20">
                <i class="fas fa-user-circle text-2xl text-gold-400 ml-2"></i>
                <div class="text-gold-300 font-medium">{{ Auth::user()->name }}</div>
            </div>

            <x-responsive-nav-link :href="Auth::user()->role === 'store_owner' ? route('store_owner.dashboard') : route('customer.dashboard')" 
                :active="request()->routeIs('store_owner.dashboard') || request()->routeIs('customer.dashboard')"
                class="flex items-center justify-between px-6 py-4 text-lg text-gold-300 hover:bg-gold-500 hover:text-black transition-all duration-300">
                <span>لوحة التحكم</span>
                <i class="fas fa-chart-pie text-xl"></i>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile.edit')" 
                class="flex items-center justify-between px-6 py-4 text-lg text-gold-300 hover:bg-gold-500 hover:text-black transition-all duration-300">
                <span>الملف الشخصي</span>
                <i class="fas fa-user-edit text-xl"></i>
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="flex items-center justify-between px-6 py-4 text-lg text-gold-300 hover:bg-red-600 hover:text-white transition-all duration-300">
                    <span>تسجيل الخروج</span>
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>