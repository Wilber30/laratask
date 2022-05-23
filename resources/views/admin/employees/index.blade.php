<x-layout>

    <x-settings heading="Manage Employees">
        <table class="table p-4 mb-6 bg-white shadow rounded-lg">
            <tbody>
              @foreach ($employees as $employee)

                <tr class="text-gray-700 border-b-2 dark:border-dark-5">

                    <td class="p-4">
                      {{ $employee->first_name }}
                    </td>

                    <td class="p-4">
                      {{ $employee->last_name }}
                    </td>

                    <td class="p-4">
                      {{ $employee->email }}
                    </td>

                    <td class="p-4">
                      {{ $employee->phone }}
                    </td>

                    <td class="p-4">
                        <a href="/admin/employees/{{ $employee->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td>
                    <form method="POST" action="/admin/employees/{{ $employee->id }}">
                      @csrf
                      @method('DELETE')

                      <button class="text-xs text-gray-400 mr-2">Delete</button>
                    </form>
                  </td>

                </tr>

              @endforeach
            </tbody>
        </table>

        {{ $employees->links() }}

    </x-settings>
</x-layout>
