<x-layout>
    <section>
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <form class="mt-10" action="/login" method="POST">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
