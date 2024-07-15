$(document).ready(function () {
    $(document).on("click", ".login-btn2", function () {
        $(".wrapper")
            .addClass("animated-signin")
            .removeClass("animated-signup");
    });

    $(document).on("click", ".signin-link", function () {
        $(".wrapper")
            .addClass("animated-signup")
            .removeClass("animated-signin");
    });

    userLogin();
});

function userLogin() {
    $(document).on("submit", "#formLogin", function (event) {
        event.preventDefault();
        var form = $(this);
        var userEmail = form.find("#email").val();
        var userPassword = form.find("#password").val();
        form.find(".success-message, .error-message").remove();

        $.ajax({
            method: "POST",
            url: "phpscripts/user-login.php",
            data: { userEmail, userPassword },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    var successMessage = $(
                        "<div class='alert alert-success p-2 text-center m-0 mt-4 success-message'>Login Successfully!</div>"
                    );

                    form.append(successMessage);
                    $("button, input").prop("disabled", true);
                    $("a")
                        .addClass("disabled")
                        .on("click", function (e) {
                            e.preventDefault();
                        });

                    if (response.user_type === "user") {
                        successMessage.fadeOut(3000, function () {
                            window.location.href = "dashboard";
                        });
                    } else {
                        var errorMessage = $(
                            "<div class='alert alert-danger p-2 text-center m-0 mt-4 error-message'>Account not found</div>"
                        );
                        form.append(errorMessage);
                        errorMessage.fadeOut(3500);
                    }
                } else {
                    var errorMessage = $(
                        "<div class='alert alert-danger p-2 text-center m-0 mt-4 error-message'>" +
                            response.message +
                            "</div>"
                    );

                    form.append(errorMessage);
                    errorMessage.fadeOut(4000);
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = $(
                    "<div class='alert alert-danger p-2 text-center m-0 mt-4 error-message'>An error occurred. Please try again later.</div>"
                );
                form.append(errorMessage);
                errorMessage.fadeOut(4000);
                console.log("AJAX Error:", error);
            },
        });
    });
}
