<x-layout>
    <x-settings :heading="'Add  Employee'">
        <form method="POST" action="/admin/employees" enctype="multipart/form-data">

            <x-form.input name="first name" required/>
            <x-form.input name="last name" required/>
            <x-form.input name="email" required />
            <x-form.input name="phone" required />

            <x-form.button>Create</x-form.button>

        </form>
    </x-settings>
</x-layout>
