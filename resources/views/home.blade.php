<x-layout>
    <main class="max-w-lg mx-auto mt-10">
        <x-panel>
            <div class="flex mt-2 justify-center text-center">
                @auth
                <p>Please use the dropdown menu to<br> create, edit or delete a company/ employee record.</p>
              @else
                <h1>Welcome</h1>
                @endauth
    </main>
    </x-panel>
    </div>

</x-layout>
