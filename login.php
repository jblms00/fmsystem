<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css" type="text/css">
    <title>11 Nevada Management Group - Login</title>
</head>


<body>
    <div class="wrapper">
        <div class="form-container sign-up">
            <form id="formLogin">
                <h2>login</h2>
                <div class="form-group">
                    <input type="text" name="email" required>
                    <label for="">Email</label>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" required>
                    <label for="">password</label>
                    <i class="fas fa-lock"></i>
                </div>
                <button type="submit" class="btn">login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="#" class="signin-link">Sign up</a></p>
                </div>
            </form>
        </div>
        <!-- login 1st part -->
        <div class="form-container sign-in">
            <form action="#">
                <img src="assets/images/11Nevada_LOGO1.png" class="logo">
                <h2>Franchisee Management System</h2>
                <div class="link2">
                    <button type="submit" class="login-btn2">Start</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>