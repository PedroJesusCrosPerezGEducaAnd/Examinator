$(document).ready(function(){
    $('#loginForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'login.php',
            type: 'post',
            data: $('#loginForm').serialize(),
            success: function(response){
                alert(response);
            }
        });
    });
});
