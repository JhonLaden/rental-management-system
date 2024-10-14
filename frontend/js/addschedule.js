$(document).ready(function(){
    // Select the form element within the login modal
    const form = $('.modal form');


    // Select the submit button within the form
    const continueBtn = form.find('input[name="book-item-submit"]');

    // Select the error text within the same form (scoped to the login modal)
    const errorText = form.find('.error-text');

    // Prevent the default form submission behavior
    form.submit(function(e){
        e.preventDefault(); // prevent submission
    });



    // Bind a click event handler to the continue button
    form.submit(function(){
        let xhr = new XMLHttpRequest(); 
        xhr.open("POST", "../../backend/tools/addschedule_tool.php", true);

        xhr.onload = ()=> {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data == 'success'){
                        location.href = "../view/view.php";
                    } else {
                        errorText.text(data); // Set the text content
                        errorText.css('display', 'block'); // Show the error text
                    }
                }
            }
        }
        // send the form data through ajax to php
        let formData = new FormData(form[0]);
        xhr.send(formData);
    });
});
