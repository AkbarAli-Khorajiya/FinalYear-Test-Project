$(document).ready(async function () {
    //akbar@gmail.com // akbar123
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        let email = $("#loginForm #email").val();
        let password = $("#loginForm #password").val();
        if (password.trim() == "" || email.trim() == "") {
            $("#loginForm .alert").text("Fill all field");
            $("#loginForm .alert").addClass('warning');
            $("#loginForm .alert").show();
            setTimeout(() => {
                $("#loginForm .alert").fadeOut();
            }, 1500);
        }
        else {
            const data = $("#loginForm").serialize();
            $.ajax({
                type: "POST",
                url: "include/operation.php?ch=27",
                data: data,
                encode: true,
                success: function (response) {
                    console.log(response)
                    if (response == 1) {
                        window.location.href = "admin.php";
                    }
                    else {
                        if (response == 2) {
                            $("#loginForm .alert").text("Your Account De-Activated By Admin");
                            $("#loginForm .alert").addClass('warning');
                            $("#loginForm .alert").show();
                            setTimeout(() => {
                                $("#loginForm .alert").fadeOut();
                            }, 1500);
                        }
                        else {
                            $("#loginForm .alert").text("Invalid email or password");
                            $("#loginForm .alert").addClass('warning');
                            $("#loginForm .alert").show();
                            setTimeout(() => {
                                $("#loginForm .alert").fadeOut();
                            }, 1500);
                        }

                    }
                }
            });
        }
    })
});

