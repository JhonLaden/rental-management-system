$(document).ready(function() {
    // Select the search input field and error text
    const searchInput = $('#searchInput');
    const errorText = $('.error-text');

   


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

   
});


