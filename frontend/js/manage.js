$(document).ready(function() {
    // Select the search input field and button
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
                                    <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i> </button>
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
});
