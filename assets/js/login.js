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
                    $("a").addClass("disabled").on("click", function (e) {
                        e.preventDefault();
                    });
                
                    successMessage.fadeOut(3000, function () {
                        switch (response.user_type) {
                            case "admin":
                                window.location.href = "dashboard";
                                break;
                            case "sales":
                                window.location.href = "dashboard-sales";
                                break;
                            case "inventory":
                                window.location.href = "dashboard-inventory";
                                break;
                            case "business_development":
                                window.location.href = "dashboard-contract";
                                break;
                            case "manpower":
                                window.location.href = "dashboard-manpower";
                                break;    
                            default:
                                window.location.href = "dashboard"; // Default redirect
                                break;
                        }
                    });
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
