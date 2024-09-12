<div class="p-6 shadow-lg rounded-lg bg-white">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Billing for {{ $patient->name }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-center">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Service</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-center">
                @foreach($bills as $bill)
                <tr>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $bill->service }}</td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $bill->amount }}</td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">{{ $bill->billingDate }}</td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">
                        @if ($bill->status === 'paid')
                            <p class="inline-block rounded border border-green-600 bg-green-600 px-4 py-1 text-sm font-medium text-white">PAID</p>
                        @else
                            <p class="inline-block rounded border border-gray-600 bg-gray-600 px-4 py-1 text-sm font-medium text-white">PENDING</p>
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-4 py-4 font-medium text-gray-900">
                        @if($bill->status == 'pending')
                        <form method="POST" action="{{ route('billing.updateStatus', [$patient->id, $bill->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex px-4 py-1 bg-indigo-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mark as Paid
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>