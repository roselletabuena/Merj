$(document).ready(function(){
    $("#login").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "../model/login.php",
            type: "POST",
            data: $("#login").serialize(),
            success: function(data){
                if(data == true) {
                    Swal.fire({
                        type: 'success',
                        title: 'Login success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    setTimeout(locate, 3000)
                } else {
                    alert("wrong username or password");
                }
            }
        })
    })
});

function locate() {
    window.location.href = "../admin/nav_bar.php";
}