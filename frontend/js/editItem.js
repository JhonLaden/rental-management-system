$(document).ready(function() {
    // Add click event to edit buttons
    $('.edit-item-btn').on('click', function() {
        // Get data from the clicked button
        const itemId = $(this).data('id');
        const itemName = $(this).data('name');
        const itemType = $(this).data('type');
        const itemSize = $(this).data('size');
        const itemDepositCost = $(this).data('deposit-cost');
        const itemRentalCost = $(this).data('rental-cost');

        console.log(itemId, itemName, itemType, itemSize, itemDepositCost, itemRentalCost);

        // Set values in the Edit Item Modal fields
        $('#editItemId').val(itemId);
        $('#editName').val(itemName);
        $('#editType').val(itemType);
        $('#editSize').val(itemSize);
        $('#editDepositCost').val(itemDepositCost);
        $('#editRentalCost').val(itemRentalCost);

        // Show the Edit Item Modal
        $('#editItemModal').modal('show');
    });
});
