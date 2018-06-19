$(document).ready(function(){
    $('#api-key-btn').click(function(event){
        // user confirms if they want to generate the key
        var confirm_key =confirm("You are about to generate a new API key");
        if(!confirm_key){
            return;
        }
        $.ajax({
            url: "apikey.php",
            type: "post",
            success: function (data) {
                if(data['success'] == 1){
                    // Everything is fine
                    // Set the key into the text area
                    $('#api_key').val(data['message']);
                }else{
                    alert("Spmething went wrong. Please try again");
                }
            }
        });
    });
});