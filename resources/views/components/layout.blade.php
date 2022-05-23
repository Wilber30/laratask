<!doctype html>

<title>Laratask</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center border-gray-400 border-b-2 pb-4">
            <div>
                <a href="/">
                    <h1>Laratask</h1>
                </a>
            </div>

            <div class="flex gap-x-6">
                @auth
                  <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}!</button>
                    </x-slot>

                  <x-dropdown-item href="/admin/companies" :active="request()->is('admin/companies')">Companies</x-dropdown-item>
                  <x-dropdown-item href="/admin/employees" :active="request()->is('admin/employees')">Employees</x-dropdown-item>
                  <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                  <form id="logout-form" method="POST" action="/logout" class="hidden">
                          @csrf
                    </form>
                  </x-dropdown>

                @else
                <a href="/login">Login</a>
                {{-- <a href="/register">Register</a> --}}
                @endauth
            </div>

        </nav>

        {{ $slot }}

    </section>
    <x-flash />
</body>
