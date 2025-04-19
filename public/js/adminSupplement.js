$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

// Open form to add a new supplement
$('#addNew').on('click', function () {
    $('#ajaxSupplementForm')[0].reset();
    $('#supplementId').val('');
    $('#formTitle').text('Add Supplement');
    $('#supplementForm').removeClass('hidden');
});

// Submit form for adding/editing supplement
$('#ajaxSupplementForm').on('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);
    let id = $('#supplementId').val();
    let method = id ? 'POST' : 'POST';  // Use 'POST' for both create and update
    let url = id ? `/Admin/supplements/${id}` : `/Admin/supplements`;

    if (id) formData.append('_method', 'PATCH');  // Add _method for PATCH on update

    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,  // Important for file upload
        contentType: false,  // Important for file upload
        success: function (response) {
            alert('Saved successfully');
            location.reload();  // Reload to show the new data
        },
        error: function (xhr) {
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                // Log and display the validation errors in the console
                console.log(xhr.responseJSON.errors);
                alert('Validation error. Check the console for details.');
            } else {
                alert('Error saving data.');
            }
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
