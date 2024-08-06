<header x-data="{ showMobileMenu: false }">
    <nav class="bg-gray-900 mx-auto flex items-center justify-between px-6 py-2 lg:px-8" aria-label="Global">
        <div class="flex items-center">
            <a class="ml-4 p-1.5" href="/{{session('locale')}}">
                <img src="{{config('app.logo_dark')}}" width="165" height="165" class="d-inline-block align-top mt-1 mr-4"
                     alt="The Weaver School logo">
            </a>
        </div>
    </nav>
</header>
