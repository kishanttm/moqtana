<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('admin.service-orders.create') }}" class="btn btn-primary mb-3">Create New</a>

                    @if (session('status'))
                        <div class="mb-4 text-green-600">{{ session('status') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Service Type</th>
                                <th>Delivery Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($serviceOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client->name ?? '-' }}</td>
                                <td>{{ ucfirst($order->service_type) }}</td>
                                <td>{{ $order->delivery_date ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('service-orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('service-orders.edit', $order) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('service-orders.destroy', $order) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="mt-4">
                        {{ $serviceOrders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
