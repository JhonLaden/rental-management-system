$(document).ready(function(){
    // Select the form element within the edit item modal
    const form = $('.edit-item-modal form');

    // Select the submit button within the form
    const continueBtn = form.find('input[name="edit-item-submit"]');

    // Select the error text within the same form (scoped to the edit item modal)
    const errorText = form.find('.error-text');

    // Prevent the default form submission behavior
    form.submit(function(e){
        e.preventDefault(); // prevent default form submission
    });

    // Bind a click event handler to the submit button for editing an item
    form.submit(function(){
        console.log('btn clicked');
        let xhr = new XMLHttpRequest(); 
        xhr.open("POST", "../../backend/tools/edititem_tool.php", true); // Send to the appropriate PHP file for editing

        xhr.onload = ()=> {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data == 'success'){
                        location.href = "../manage/manage.php"; // Redirect after successful update
                    } else {
                        errorText.text(data); // Set the text content to the error
                        errorText.css('display', 'block'); // Show the error text
                        console.log(data);
                    }
                }
            }
        }
        // Send the form data through AJAX to the PHP file
        let formData = new FormData(form[0]);
        xhr.send(formData);
    });
});
