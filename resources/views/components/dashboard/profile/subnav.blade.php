<header class="border-b border-white/5">
    <!-- Secondary navigation -->
    <nav class="flex overflow-x-auto py-4">
        <ul role="list" class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-400 sm:px-6 lg:px-8">
            <li>
                <a href="{{ route('account.index', ['locale' => session('locale', 'en')])}}" class="{{ request()->routeIs('account*') ? 'text-teal-600' : '' }} hover:text-teal-600">Account</a>
            </li>
            <li>
                <a href="/billing" class="{{ request()->routeIs('billing') ? 'text-teal-600' : '' }} hover:text-teal-600">Billing</a>
            </li>
            <li>
                <a href="{{ route('api-keys.create', ['locale' => session('locale', 'en')]) }}" class="{{ request()->routeIs('api-keys*') ? 'text-teal-600' : '' }} hover:text-teal-600">API Keys</a>
            </li>                
            <li>
                <a href="{{ route('referrals.index', ['locale' => session('locale', 'en')]) }}" class="{{ request()->routeIs('referrals*') ? 'text-teal-600' : '' }} hover:text-teal-600">Referrals</a>
            </li>            
            <li>
                <a href="{{ route('communications.index', ['locale' => session('locale', 'en')]) }}" class="{{ request()->routeIs('communications*') ? 'text-teal-600' : '' }} hover:text-teal-600">Communications</a>
            </li>
        </ul>
    </nav>
</header>
