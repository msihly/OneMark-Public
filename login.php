<?php
    session_start();
    if (isset($_SESSION["uid"])) {
        header("Location: /");
        exit;
    } else if (isset($_COOKIE["authToken"])) {
        include_once("php/restricted/db-functions.php");
        $userID = validateToken($_COOKIE["authToken"]);
        if ($userID !== false) {
            $_SESSION["uid"] = $userID;
            header("Location: /");
            exit;
        }
        setcookie("authToken", "", 1);
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login - OneMark</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/ico" href="images/favicon.ico">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/login.css">
		<script src="js/login.js" type="module"></script>
	</head>
	<body>
        <div class="lg-background"></div>
        <div class="lg-wrapper">
            <div class="lg">
                <div class="lg-panel-image"></div>
                <div class="lg-panel-form pad-ctn-3" id="login-panel">
                    <h3>Log In</h3>
                    <p class="lg-text">Not a member? <span class="lg-link" id="login-switch" data-panel="login-panel" data-alt-panel="register-panel" data-listener="loginSwitch">Register now</span></p>
                    <form id="login-form" enctype="multipart/form-data">
                        <div class="form-group rev">
                            <label class="error-label invisible" id="login-username-error">Error</label>
                            <input type="text" placeholder="Username" name="username" id="login-username" class="t-input" data-listener="errorCheck" required>
                            <label for="login-username" class="lb-title">Username</label>
                        </div>
                        <div class="form-group rev">
                            <label class="error-label invisible" id="login-password-error">Error</label>
                            <input type="password" placeholder="Password" name="password" id="login-password" class="t-input" data-listener="errorCheck" required>
                            <label for="login-password" class="lb-title">Password</label>
                        </div>
                        <label class="checkbox-ctn">
                            <input type="checkbox" name="remember-me" id="login-remember">
                            <span class="checkbox"></span>
                            <label for="login-remember" class="lb-title checkbox-title">Keep me logged in</label>
                        </label>
                        <button type="submit" class="btn-hollow" id="login" name="login">LOG IN</button>
                    </form>
                </div>
                <div class="lg-panel-form pad-ctn-3 hidden-panel hidden" id="register-panel">
                    <h3>Register</h3>
                    <p class="lg-text">Already have an account? <span class="lg-link" id="register-switch" data-panel="login-panel" data-alt-panel="register-panel" data-listener="loginSwitch">Login now</a></p>
                    <form id="register-form" enctype="multipart/form-data">
                        <div class="form-group rev">
                            <label class="error-label invisible" id="register-email-error">Error</label>
                            <input type="text" placeholder="Email" name="email" id="register-email" class="t-input" data-listener="errorCheck" required>
                            <label for="register-email" class="lb-title">Email</label>
                        </div>
                        <div class="form-group rev">
                            <label class="error-label invisible" id="register-username-error">Error</label>
                            <input type="text" placeholder="Username" name="username" id="register-username" class="t-input" data-listener="errorCheck" required>
                            <label for="register-username" class="lb-title">Username</label>
                        </div>
                        <div class="form-group rev">
                            <label class="error-label invisible" id="register-password-error">Error</label>
                            <input type="password" placeholder="Password" name="password" id="register-password" class="t-input" data-listener="errorCheck" required>
                            <label for="register-password" class="lb-title">Password</label>
                        </div>
                        <div class="form-group rev">
                            <label class="error-label invisible" id="register-password-confirm-error">Error</label>
                            <input type="password" placeholder="Confirm Password" name="password-confirm" id="register-password-confirm" class="t-input" data-listener="errorCheck" required>
                            <label for="register-password-confirm" class="lb-title">Confirm Password</label>
                        </div>
                        <label class="checkbox-ctn">
                            <input type="checkbox" name="remember-me" id="register-remember">
                            <span class="checkbox"></span>
                            <label for="register-remember" class="lb-title checkbox-title">Keep me logged in</label>
                        </label>
                        <button type="submit" class="btn-hollow" id="register" name="register">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>