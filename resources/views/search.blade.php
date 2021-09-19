<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Search results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="mb-4 text-xl font-semibold tracking-wide text-gray-800 uppercase">Search results</h2>
                    <div class="mb-4 overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @if(count($results) > 0)
                                @foreach($results as $result)
                                    <tr class="bg-white">
                                        <td {{ class_basename($result) == "Company" ? 'colspan=2' : '' }} class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <span class="font-semibold">{{ class_basename($result) == "User" ? 'User' : 'Company' }} name:</span> {{ $result->name }}
                                        </td>
                                        @if(class_basename($result) == "User")
                                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                <span class="font-semibold">User email:</span> {{ $result->email }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm font-bold leading-5 text-center text-gray-900 uppercase whitespace-no-wrap">
                                        Nothing found
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    {!! $results->withQueryString()->links() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
