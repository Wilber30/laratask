<x-layout>
    <x-settings :heading="'Add Company'">
        <form method="POST" action="/admin/companies" enctype="multipart/form-data">

            <x-form.input name="name" required />
            <x-form.input name="email" required />
            <x-form.input name="website" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="logo" type="file" />
                </div>

                {{-- <img src="{{ asset('storage/' . $company->logo) }}" alt="" class="rounded-xl ml-6" width="100"> --}}
            </div>

            {{-- <x-admin.form name="website" required>{{ old('excerpt', $company->website) }}</x-admin.form> --}}

          <x-form.field>
          <x-form.label name="employee" />

            <select name="employee_id" id="employee_id">
              @foreach (\App\Models\Employee::all() as $employee)
                <option
                  value="{{ $employee->id }}">{{ ucwords($employee->first_name) }}</option>
              @endforeach
            </select>

              <x-form.error name="employee" />
        </x-form.field>

            <x-form.button>Create</x-form.button>

        </form>
    </x-settings>
</x-layout>
