<x-layout>

    <x-settings heading="Manage Companies">
        <table class="table p-4 mb-6 bg-white shadow rounded-lg">
            <tbody>
              @foreach ($companies as $company)

                <tr class="text-gray-700 border-b-2 p-4 dark:border-dark-5">

                    <td class="p-4">
                        {{ $company->name }}
                    </td>

                    <td class="p-4">
                      {{ $company->email }}
                    </td>

                    <td class="p-4">
                      {{ $company->website }}
                    </td>

                    <td class="p-4">
                        <a href="/admin/companies/{{ $company->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td>
                    <form method="POST" action="/admin/companies/{{ $company->id }}">
                      @csrf
                      @method('DELETE')

                      <button class="text-xs text-gray-400 mr-4">Delete</button>
                    </form>
                  </td>

                </tr>

              @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}

    </x-settings>
</x-layout>
