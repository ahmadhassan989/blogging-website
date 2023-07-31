<nav class="md:flex md:justify-between md:items-center">
    <div class="main-logo ">
        <a href="/" >
            <img src="https://lavishride.com/assets_new/img/lavishride_original_logo.png" alt="Lavish Ride Logo" class="h-10 w-20">
        </a>
    </div>
    <div class="flex md:mt-0 mt-8 text-center">
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    <button @click="show = !show" class="text-xs font-bold uppercase">Welcome Mr,
                        {{ auth()->user()->name }}</button>
                </x-slot>
                <x-dropdown-item href="" title="Dashbord" />
                <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create') ?? false" title="New Posts" />
                <x-dropdown-item href="#" title="Logout"
                    @click.prevent="document.querySelector('#logout-form').submit()" />
                <form id="logout-form" action="/logout" method="POST"
                    class="font-bold font-semibold px-2.5 text-blue-700 text-xs hidden">
                    @csrf
                </form>
            </x-dropdown>
        @else
            <a href="/register" class="font-bold py-3 text-xs uppercase">Register</a>
            <a href="/login" class="font-bold py-3 ml-4 text-xs uppercase">login</a>
        @endauth
        <a href="#newsletter"
            class="ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5" style="background:#ae2227">
            Subscribe for Updates
        </a>
    </div>
</nav>
