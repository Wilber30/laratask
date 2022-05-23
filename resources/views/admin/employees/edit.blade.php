<x-layout>
    <x-settings :heading="'Edit employee: ' . $employee->first_name">
        <form method="POST" action="/admin/employees/{{ $employee->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="first name" :value="old('first_name', $employee->first_name)" required/>
            <x-form.input name="last name" :value="old('last_name', $employee->last_name)" required />
            <x-form.input name="email" :value="old('email', $employee->email)" required />
            <x-form.input name="phone" :value="old('phone', $employee->phone)" required />
            <x-form.button>Update</x-form.button>
        </form>
    </x-settings>
</x-layout>
