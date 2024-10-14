$(document).ready(function() {
    // Select the search input field and error text
    const searchInput = $('#searchInput');
    const errorText = $('.error-text');

    // Bind an input event handler to the search input field
    searchInput.on('input', function() {
        let query = searchInput.val();

        // Perform search whether the query is empty or not
        $.ajax({
            type: 'POST',
            url: '../../backend/tools/search_tool.php',
            data: { query: query },
            dataType: 'json',
            success: function(data) {
                // Process the response from search_tool.php
                console.log(data); // For debugging
                // Update the table with search results
                $('tbody').empty(); // Clear the existing table rows
                if (data.length > 0) {
                    data.forEach((item, index) => {
                        $('tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.name}</td>
                                <td>₱ ${item.rental_cost}</td>
                                <td>₱ ${item.deposit_cost}</td>
                                <td>${item.quantity}</td>
                                <td class="text-center d-flex justify-content-center gap-2">
                                    <button class="btn btn-primary btn-sm edit-item-btn" data-id="${item.item_id}" data-name="${item.name}" data-type="${item.type}" data-size="${item.size}" data-deposit-cost="${item.deposit_cost}" data-rental-cost="${item.rental_cost}"><i class="bi bi-pencil-square"></i> </button>
                                    <button class="btn btn-danger delete-item-btn" data-id="${item.item_id}"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $('tbody').append('<tr><td colspan="6" class="text-center">No results found</td></tr>');
                }
            },
            error: function() {
                // Handle error response
                errorText.text('An error occurred while processing the request.');
                errorText.css('display', 'block');
            }
        });
    });


    // Event delegation for edit buttons
    $(document).on('click', '.edit-item-btn', function() {
        const itemId = $(this).data('id');
        const itemName = $(this).data('name');
        const itemType = $(this).data('type');
        const itemSize = $(this).data('size');
        const itemDepositCost = $(this).data('deposit-cost');
        const itemRentalCost = $(this).data('rental-cost');

        console.log(itemId, itemName, itemType, itemSize, itemDepositCost, itemRentalCost);

        // Set values in the edit modal fields
        $('#editItemId').val(itemId);
        $('#editName').val(itemName);
        $('#editType').val(itemType);
        $('#editSize').val(itemSize);
        $('#editDepositCost').val(itemDepositCost);
        $('#editRentalCost').val(itemRentalCost);

        // Open the edit modal
        $('.edit-item-modal').modal('show');
    });

    // Event delegation for delete buttons
    $(document).on('click', '.delete-item-btn', function() {
        const itemId = $(this).data('id');
        // Handle item deletion logic
        console.log('Delete item with ID:', itemId);
        // You can add your delete functionality here
    });

    // Trigger the delete confirmation modal
    // Event delegation: Bind click event to delete buttons dynamically within the table body
    $('tbody').on('click', '.delete-item-btn', function() {
        const itemId = $(this).data('id');
        const itemName = $(this).closest('tr').find('td:nth-child(2)').text(); // Get item name from the second td

        // Set the item name and ID in the modal
        $('#deleteItemName').text(itemName);
        $('#deleteItemId').val(itemId);

        // Show the modal
        $('#deleteItemModal').modal('show');
    });

    // Confirm delete button click event
    $('#confirmDeleteBtn').on('click', function() {
        const itemId = $('#deleteItemId').val();

        // Make an AJAX request to delete the item
        $.ajax({
            type: 'POST',
            url: '../../backend/tools/deleteitem_tool.php',
            data: { item_id: itemId },
            success: function(response) {
                if (response === 'success') {
                    // Hide the modal
                    $('#deleteItemModal').modal('hide');
                    // Optionally, you can reload the page or remove the row
                    location.reload();
                } else {
                    alert('Failed to delete the item.');
                }
            },
            error: function() {
                alert('An error occurred while deleting the item.');
            }
        });
    });
});
