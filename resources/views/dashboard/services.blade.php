<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Services') }}
    </x-slot>
    <x-slot name="button">
        <a href="{{ route('services.create') }}" class="admin-btn">Add New Service</a>
    </x-slot>

    <div class="dashboard">

        @include('components.alerts')

        <table id="dataTablesR">
            <thead>
                <tr>
                    <th class="w-6">#</th>
                    <td>Title</td>
                    <td class="w-28">Status</td>
                    <td class="w-40">Created at</td>
                    <td class="w-20">Extra</td>
                    <td class="w-20">Action</td>
                </tr>
            </thead>
            <tbody>
                @if (count($services))
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                            <td>{{ $service->created_at }}</td>
                            <td>
                                <ul class="actions">
                                    <li><a title="Edit Prices" href="{{ route('services.prices', $service->id) }}"><i class="fa-solid fa-circle-dollar"></i></a></li>
                                    <li><a title="Edit Details" href="{{ route('services.details', $service->id) }}"><i class="fa-solid fa-circle-info"></i></a></li>
                                </ul>
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><a title="Edit Service" href="{{ route('services.edit', $service->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a></li>
                                    <li>
                                        <form title="Delete Service" class="deleteForm" action="{{ route('services.destroy', $service->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</x-app-layout>
