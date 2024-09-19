$(document).ready(function(){
    


    // Bind a click event handler to the continue button
    form.submit(function(){
        let xhr = new XMLHttpRequest(); 
        xhr.open("POST", "../../backend/tools/additem_tool.php", true);

        xhr.onload = ()=> {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data == 'success'){
                        location.href = "../manage/manage.php";
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
