<div class="footer grid grid-cols-3 mx-24 pt-24 pb-8">
    <div class="col-span-1">
        <div class="text-sm text-center">
            <a class="!text-gray-300" href="/{{ session('locale') ?? 'en' }}/privacy-policy">Privacy</a>
        </div>
    </div>
    <div class="col-span-1">
        <div class="text-gray-300 text-sm text-center">
            ©{{ date('Y') }} The Weaver School
        </div>
    </div>
    <div class="col-span-1">
        <div class="text-sm text-center">
            <a class="!text-gray-300" href="/{{ session('locale') ?? 'en' }}/general-terms">Terms</a>
        </div>
    </div>
</div>
