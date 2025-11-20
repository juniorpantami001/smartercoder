<?php
include 'connect.php';
$stmt = $pdo->prepare("SELECT * FROM appname LIMIT 1");
$stmt->execute();
$appdata = $stmt->fetch();
$appname = $appdata['name'];
$logo = $appdata['logo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $appname;?> - Log In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: #2a2a2a;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .phone-container {
            width: 393px;
            height: 820px;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            position: relative;
        }

        .content-wrapper {
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #ffffff;
        }

        /* Top red section with angled cut at right corner */
        .header-section {
            background: #C41E3A;
            padding: 50px 40px 0;
            height: 200px;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 100% 60%, 90% 100%, 0 100%);
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-section h1 {
            color: white;
            font-size: 46px;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .header-section p {
            color: rgba(255, 255, 255, 1);
            font-size: 16px;
            font-weight: 400;
        }

        /* Main form section */
        .main-content {
            flex: 1;
            padding: 80px 40px 40px;
            background: white;
            display: flex;
            flex-direction: column;
        }

        /* Form group */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            position: absolute;
            top: -10px;
            left: 20px;
            background: white;
            padding: 0 8px;
            font-size: 12px;
            font-weight: 600;
            color: #C41E3A;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 1;
        }

        .form-input {
            width: 100%;
            padding: 18px 20px;
            border: 2px solid #C41E3A;
            border-radius: 12px;
            font-size: 16px;
            color: #333;
            background: white;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: #A01828;
            box-shadow: 0 0 0 4px rgba(196, 30, 58, 0.1);
        }

        .form-input::placeholder {
            color: #ccc;
        }

        /* Password field with eye icon */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            color: #999;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #C41E3A;
        }

        /* Remember me and Forgot password row */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .custom-checkbox {
            width: 50px;
            height: 26px;
            background: #C41E3A;
            border-radius: 13px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .custom-checkbox::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: transform 0.3s ease;
        }

        .checkbox-input {
            display: none;
        }

        .checkbox-input:checked + .custom-checkbox::after {
            transform: translateX(24px);
        }

        .remember-text {
            font-size: 15px;
            color: #333;
            font-weight: 500;
        }

        .forgot-link {
            color: #C41E3A;
            text-decoration: underline;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #A01828;
        }

        /* Login button */
        .btn-login {
            width: 100%;
            padding: 18px 32px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            background: #C41E3A;
            color: white;
            box-shadow: 0 4px 16px rgba(196, 30, 58, 0.3);
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .btn-login:hover {
            background: #A01828;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(196, 30, 58, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Sign up section */
        .signup-section {
            text-align: center;
            margin-top: auto;
            margin-bottom: 30px;
        }

        .signup-text {
            font-size: 15px;
            color: #666;
        }

        .signup-link {
            color: #C41E3A;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .signup-link:hover {
            color: #A01828;
            text-decoration: underline;
        }

        /* Footer */
        .footer-text {
            text-align: center;
            font-size: 13px;
            color: #C41E3A;
            font-weight: 500;
            padding-bottom: 20px;
        }

        @media (max-width: 450px) {
            .phone-container {
                width: 100%;
                height: 100vh;
            }
        }
    </style>
</head>
<body>
    <div class="phone-container">
        <div class="content-wrapper">
            <!-- Header section -->
            <div class="header-section">
                <div class="header-content">
                    <h1>Log In</h1>
                    <p>Please enter your login credentials</p>
                </div>
            </div>

            <!-- Main form content -->
            <div class="main-content">
                <form onsubmit="handleSubmit(event)">
                    <!-- Email field -->
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            placeholder="sanisabulu@gmail.com"
                            required
                        >
                    </div>

                    <!-- Password field -->
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                class="form-input" 
                                id="passwordField"
                                placeholder="******************"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                👁️
                            </button>
                        </div>
                    </div>

                    <!-- Remember me and Forgot password -->
                    <div class="options-row">
                        <label class="remember-me">
                            <input type="checkbox" class="checkbox-input" id="rememberMe">
                            <div class="custom-checkbox"></div>
                            <span class="remember-text">Remember Me</span>
                        </label>
                        <a class="forgot-link" onclick="handleForgotPassword()">
                            Forget<br>Password ?
                        </a>
                    </div>

                    <!-- Login button -->
                    <button type="submit" class="btn-login">Log In</button>
                </form>

                <!-- Sign up section -->
                <div class="signup-section">
                    <span class="signup-text">Don't have An Account? </span>
                    <a class="signup-link" onclick="handleSignUp()">Sign Up</a>
                </div>

                <!-- Footer -->
                <div class="footer-text">Powered by GearonePlus</div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('passwordField');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        }

        function handleSubmit(event) {
            event.preventDefault();
            const email = event.target[0].value;
            const password = event.target[1].value;
            console.log('Login attempt:', { email, password });
            alert('Login functionality would be implemented here');
        }

        function handleForgotPassword() {
            console.log('Forgot password clicked');
            alert('Forgot password functionality would be implemented here');
        }

        function handleSignUp() {
            console.log('Sign up clicked');
            // alert('Sign up functionality would be implemented here');
            window.location.href = 'register.php';
        }

        // Smooth focus animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>