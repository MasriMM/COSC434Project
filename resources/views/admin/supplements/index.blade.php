<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Supplements (AJAX)</h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <button id="addNew" class="mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Add New Supplement
            </button>

            <!-- Supplement Form -->
            <div id="supplementForm" class="hidden mb-4">
                <h3 id="formTitle" class="text-lg font-semibold mb-2">Add Supplement</h3>
                <form id="ajaxSupplementForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="supplementId">

                    <input type="text" name="name" id="name" placeholder="Name" class="w-full mb-2 p-2 border rounded">
                    <input type="number" name="price" id="price" placeholder="Price" class="w-full mb-2 p-2 border rounded">
                    <input type="number" name="quantity" id="quantity" placeholder="Quantity" class="w-full mb-2 p-2 border rounded">
                    <input type="file" name="image" id="image" class="w-full mb-2 p-2 border rounded">

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>

            <table class="min-w-full text-left border rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Image</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody id="supplementsTable">
                    @foreach ($supplements as $supplement)
                        <tr data-id="{{ $supplement->id }}" class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">
                                @if($supplement->image)
                                    <img src="{{  $supplement->image }}" class="w-12 h-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $supplement->name }}</td>
                            <td class="px-4 py-2">${{ number_format($supplement->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $supplement->quantity }}</td>
                            <td class="px-4 py-2">
                                <button class="editBtn text-yellow-600 hover:underline">Edit</button>
                                <button class="deleteBtn text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#addNew').on('click', function () {
            $('#ajaxSupplementForm')[0].reset();
            $('#supplementId').val('');
            $('#formTitle').text('Add Supplement');
            $('#supplementForm').removeClass('hidden');
        });

        // Submit form
        $('#ajaxSupplementForm').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let id = $('#supplementId').val();
            let method = id ? 'POST' : 'POST';
            let url = id ? `/Admin/supplements/${id}` : `/Admin/supplements`;

            if (id) formData.append('_method', 'PATCH');

            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    alert('Saved successfully');
                    location.reload();
                },
                error: function () {
                    alert('Error saving data.');
                }
            });
        });

        // Edit button click
        $('.editBtn').on('click', function () {
            let row = $(this).closest('tr');
            let id = row.data('id');
            let name = row.find('td:eq(1)').text().trim();
            let price = row.find('td:eq(2)').text().replace('$', '').trim();
            let quantity = row.find('td:eq(3)').text().trim();

            $('#formTitle').text('Edit Supplement');
            $('#supplementId').val(id);
            $('#name').val(name);
            $('#price').val(price);
            $('#quantity').val(quantity);
            $('#supplementForm').removeClass('hidden');
        });

        // Delete button click
        $('.deleteBtn').on('click', function () {
            if (!confirm('Are you sure?')) return;

            let id = $(this).closest('tr').data('id');

            $.ajax({
                url: `/Admin/supplements/${id}`,
                type: 'DELETE',
                success: function () {
                    alert('Deleted successfully');
                    location.reload();
                },
                error: function () {
                    alert('Error deleting data.');
                }
            });
        });
    </script>
</x-app-layout>
