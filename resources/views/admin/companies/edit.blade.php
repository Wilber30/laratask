<x-layout>
    <x-settings :heading="'Edit Company: ' . $company->name">
        <form method="POST" action="/admin/companies/{{ $company->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $company->name)" required />
            <x-form.input name="email" :value="old('email', $company->email)" required />
            <x-form.input name="website" :value="old('website', $company->website)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="logo" type="file" :value="old('logo', $company->logo)" />
                </div>

                {{-- <img src="/storage/logos/{{ $company->logo }}" alt="company logo" class="rounded-xl ml-6" width="100" height="100"> --}}
                <img src="{{ asset('/storage/' . $company->logo) }}" alt="" class="rounded-xl ml-6"  width="100" height="100">
            </div>

            <x-form.field>
            <x-form.label name="employee" />

            <select name="employee_id" id="employee_id">
              @foreach (\App\Models\Employee::all() as $employee)
                <option
                {{ old('employee_id', $company->employee_id) == $employee->id ? 'selected' : '' }}
                      >{{ ucwords($employee->first_name) }}</option>
              @endforeach
            </select>
            <x-form.error name="employee" />
          </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-settings>
</x-layout>
