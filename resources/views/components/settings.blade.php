@props(['heading'])


<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Options</h4>

            @if (stripos($_SERVER['REQUEST_URI'], 'companies' )!==false)
            <ul class="mr-6">

                <li>
                    <a href="/admin/companies" class="{{ request()->is('admin/companies') ? 'text-blue-500' : '' }}">Companies</a>
                </li>

                <li>
                    <a href="/admin/companies/create" class="{{ request()->is('admin/companies/create') ? 'text-blue-500' : '' }}">Create</a>
                </li>
            </ul>

            @else
            <ul class="mr-6">

                <li>
                    <a href="/admin/employees" class="{{ request()->is('admin/employees') ? 'text-blue-500' : '' }}">Employees</a>
                </li>

                <li>
                    <a href="/admin/employees/create" class="{{ request()->is('admin/employees/create') ? 'text-blue-500' : '' }}">Create</a>
                </li>
            </ul>

            @endif

        </aside>

        <main class="flex-1">
            <x-panel class="mx-auto">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
