$(function(){
    function formValidation() {
		var forms = document.getElementsByClassName('needs-validation');
		var validation = Array.prototype.filter.call(forms, function (form) {
			form.addEventListener('submit', function (event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
                    event.stopPropagation();
                    $(form).addClass('is-invalid');
				} else {
                    event.preventDefault();
                    event.stopPropagation();
                    $(form).addClass('is-valid');
                    $.ajax({
                        url: "user/insert_user.php",
                        method: "POST",
                        data: $('#signupForm').serialize(),
                        success:function(data){
                            if (data == true) {
                                $("#signup").modal('hide');
                                $("#signupForm")[0].reset();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Registration Success',
                                    text: "You can now login",
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            } else {
                                $("#signup").modal('hide');
                                swal.fire ( "Oops" ,  "Something went wrong!",  "error")
                            }
                        }
                    });
				}
				form.classList.add('was-validated');
			}, false);
		});
    }


    $(window).on("scroll", function() {
        if($(window).scrollTop()) {
              $('nav').addClass('black');
        }

        else {
              $('nav').removeClass('black');
        }
  })
    
    $(document).ready(function(){
        AOS.init();
        function checkScroll(){
            var startY = $('.navbar').height() * 2; //The point where the navbar changes in px
        
            if($(window).scrollTop() > startY){
                $('.navbar').addClass("scrolled");
            }else{
                $('.navbar').removeClass("scrolled");
            }
        }
        
        if($('.navbar').length > 0){
            $(window).on("scroll load resize", function(){
                checkScroll();
            });
        }
   
        $('.your-class').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false
                }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
            ]
        });

        formValidation();
        $(".sub-b").click(function(){
            $('#signupForm').removeClass("was-validated is-invalid");
            $('#signupForm')[0].reset();
        })

        $(".sub-l").click(function(){
            $('#loginform').removeClass("was-validated is-invalid");
            $('#loginform')[0].reset();
        })


        $("#aboutus").click(function() {
            $('html,body').animate({
                scrollTop: $(".aboutus").offset().top},
                'slow');
        });

        $("#contactus").click(function() {
            $('html,body').animate({
                scrollTop: $(".contactus").offset().top},
                'slow');
        });

        $(document).on('submit','#loginform', function(event){ 
            event.preventDefault();
            if ($("#loginname").val() == 0 && $("#loginpass").val() == 0) {
                $('#loginform').addClass('was-validated is-invalid');
            } else {
                $.ajax({
                    url: "user/login.php",
                    type: "POST",
                    data: $("#loginform").serialize(),
                    success: function(data){
                        if(data == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Login success',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            setTimeout(reload, 3000);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops',
                                text: "Wrong Email / Phone / Username or Password",
                                showConfirmButton: true
                            })
                        }
                    }
                })
            }
        })

        // display_data();
        // function display_data(){
        //     var action = "fetch";
        //     $.ajax({
        //         url: "user/featured_products.php",
        //         method: "POST",
        //         data: {action:action},
        //         success: function(data) {

        //             $("#content").html(data);
        //         }
        //     })
        // }
    })
})

function reload() {
    $("#login").modal('hide');
    location.reload();
    location.reload();
}