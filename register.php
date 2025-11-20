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
    <title><?php echo $appname;?> - Sign Up</title>
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
            height: 850px;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            /* overflow-y: auto;
            overflow-x: hidden; */
            position: relative;
        }

        .content-wrapper {
            min-height: 100%;
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

        /* Terms and conditions checkbox */
        .terms-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 40px;
        }

        .custom-checkbox-square {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border: 2px solid #C41E3A;
            border-radius: 6px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .custom-checkbox-square::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .checkbox-input {
            display: none;
        }

        .checkbox-input:checked + .custom-checkbox-square {
            background: #C41E3A;
        }

        .checkbox-input:checked + .custom-checkbox-square::after {
            transform: translate(-50%, -50%) scale(1);
        }

        .terms-text {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .terms-link {
            color: #C41E3A;
            font-weight: 600;
            text-decoration: underline;
            cursor: pointer;
        }

        .terms-link:hover {
            color: #A01828;
        }

        /* Sign Up button */
        .btn-signup {
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

        .btn-signup:hover {
            background: #A01828;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(196, 30, 58, 0.4);
        }

        .btn-signup:active {
            transform: translateY(0);
        }

        /* Sign in section */
        .signin-section {
            text-align: center;
            margin-top: auto;
            margin-bottom: 30px;
        }

        .signin-text {
            font-size: 15px;
            color: #666;
        }

        .signin-link {
            color: #C41E3A;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .signin-link:hover {
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
                    <h1>Sign Up</h1>
                    <p>Create your account to get started</p>
                </div>
            </div>

            <!-- Main form content -->
            <div class="main-content">
                <form onsubmit="handleSubmit(event)">
                    <!-- Full Name field -->
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input 
                            type="text" 
                            class="form-input" 
                            placeholder="Umar Faooq"
                            required
                        >
                    </div>

                    <!-- Email field -->
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            placeholder="umarfarooq@gmail.com"
                            required
                        >
                    </div>

                    <!-- Phone Number field -->
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input 
                            type="tel" 
                            class="form-input" 
                            placeholder="+234 800 000 0000"
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
                            <button type="button" class="toggle-password" onclick="togglePassword('passwordField')">
                                👁️
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password field -->
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                class="form-input" 
                                id="confirmPasswordField"
                                placeholder="******************"
                                required
                            >
                            <button type="button" class="toggle-password" onclick="togglePassword('confirmPasswordField')">
                                👁️
                            </button>
                        </div>
                    </div>

                    <!-- Terms and conditions -->
                    <label class="terms-row">
                        <input type="checkbox" class="checkbox-input" id="agreeTerms" required>
                        <div class="custom-checkbox-square"></div>
                        <span class="terms-text">
                            I agree to the <a class="terms-link" onclick="handleTerms()">Terms and Conditions</a> and <a class="terms-link" onclick="handlePrivacy()">Privacy Policy</a>
                        </span>
                    </label>

                    <!-- Sign Up button -->
                    <button type="submit" class="btn-signup">Sign Up</button>
                </form>

                <!-- Sign in section -->
                <div class="signin-section">
                    <span class="signin-text">Already have An Account? </span>
                    <a class="signin-link" onclick="handleSignIn()">Sign In</a>
                </div>

                <!-- Footer -->
                <div class="footer-text">Powered by GearonePlus</div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        }

        function handleSubmit(event) {
            event.preventDefault();
            const fullName = event.target[0].value;
            const email = event.target[1].value;
            const phone = event.target[2].value;
            const password = event.target[3].value;
            const confirmPassword = event.target[4].value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            console.log('Sign up attempt:', { fullName, email, phone, password });
            alert('Sign up functionality would be implemented here');
        }

        function handleTerms() {
            console.log('Terms and Conditions clicked');
            alert('Terms and Conditions would be displayed here');
        }

        function handlePrivacy() {
            console.log('Privacy Policy clicked');
            alert('Privacy Policy would be displayed here');
        }

        function handleSignIn() {
            console.log('Sign In clicked');
            // alert('Navigate to Sign In page');
            window.location.href = 'login.php';
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