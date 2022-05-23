<x-layout>
    <section>
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <form class="mt-10" action="/register" method="POST">
                    @csrf

                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />

                    <x-form.button>Submit</x-form.button>

                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
