$(document).ready(function(){

    $(document).on("submit","#updNameForm", function(event) {
        event.preventDefault();
        if ($("#updName").val() != "") {
            var id = $(".submit_name").attr("id");
            var btn_action = "update_name";
            var updName = $("#updName").val();
            $.ajax({
                url:"../merj/user/upd_user.php",
                method:"POST",
                data:{id:id,
                    btn_action:btn_action,
                    updName, updName},
                success:function(data)
                {
                    $("#exampleModalCenter").modal('hide');
                    $(".displayName").val(data);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please provide a name',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

    $(document).on("submit","#editAddress", function(event) {
        event.preventDefault();
        if ($("#updAddress").val() != "") {
            var id = $(".submit_name").attr("id");
            var btn_action = "update_add";
            var updAdd = $("#updAddress").val();
            $.ajax({
                url:"../merj/user/upd_user.php",
                method:"POST",
                data:{id:id,
                    btn_action:btn_action,
                    updAdd, updAdd},
                success:function(data)
                {
                    $("#editAddress").modal('hide');
                    $("#address").val(data);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please provide a address',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

    $(document).on("submit","#changePass", function(event) {
        event.preventDefault();
        if ($("#oldPass").val() != "" && $("#newPass").val() != "" && $("#conPass").val() != "") {
            if ($("#newPass").val() != $("#conPass").val()) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'Mismatch password',
                    showConfirmButton: false,
                    timer: 1500
                  })
            } else {
                if ($("#newPass").val().length < 8) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'error',
                        title: 'Password must be greater than 8 characters',
                        showConfirmButton: false,
                        timer: 1500
                      })
                } else {
                    var id = $(".submit_name").attr("id");
                    var btn_action = "update_pass";
                    var oldPass = $("#oldPass").val();
                    var newPass = $("#newPass").val();
                    $.ajax({
                        url:"../merj/user/upd_user.php",
                        method:"POST",
                        data:{id:id,
                            btn_action:btn_action,
                            newPass, newPass,
                            oldPass, oldPass},
                        success:function(data)
                        {
                            if (data == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    type: 'success',
                                    title: 'Updated successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    type: 'error',
                                    title: 'Wrong password',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    });
                }
            }
            
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please complete the form',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

    $(document).on("submit","#emailAddForm", function(event) {
        event.preventDefault();
        if ($("#emailAdd").val() != "") {
            var id = $(".submit_name").attr("id");
            var btn_action = "update_email";
            var emailAdd = $("#emailAdd").val();
            $.ajax({
                url:"../merj/user/upd_user.php",
                method:"POST",
                data:{id:id,
                    btn_action:btn_action,
                    emailAdd, emailAdd},
                success:function(data)
                {
                    $("#editEmail").modal('hide');
                    $(".displayEmail").val(data);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please provide a email',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

    $(document).on("submit","#usernameForm", function(event) {
        event.preventDefault();
        if ($("#username").val() != "") {
            var id = $(".submit_name").attr("id");
            var btn_action = "update_username";
            var username = $("#username").val();
            $.ajax({
                url:"../merj/user/upd_user.php",
                method:"POST",
                data:{id:id,
                    btn_action:btn_action,
                    username, username},
                success:function(data)
                {
                    $("#editUsername").modal('hide');
                    $(".displayUsername").val(data);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Please provide a username',
                showConfirmButton: false,
                timer: 1500
              })
        }
    })
})