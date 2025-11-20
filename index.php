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
    <link rel="shortcut icon" href="<?php echo $logo;?>" type="image/x-icon">
    <title><?php echo $appname;?></title>
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
            height: 780px;
            background: #ffffff;
            border-radius: 0;
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

        /* Main content - white section */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 60px 40px 40px;
            background: white;
        }

        /* Logo section */
        .logo-container {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 40px;
        }

        .logo-wrapper {
            position: relative;
            width: 160px;
            height: 110px;
            margin: 0 auto 20px;
        }

        .circle {
            position: absolute;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 11px solid;
        }

        .circle.red {
            border-color: #C41E3A;
            left: 0;
            top: 0;
            z-index: 2;
        }

        .circle.black {
            border-color: #1a1a1a;
            right: 0;
            top: 25px;
            z-index: 1;
        }

        .logo-letter {
            position: absolute;
            right: 35px;
            top: 42px;
            font-size: 48px;
            font-weight: 900;
            color: #C41E3A;
            z-index: 3;
            font-family: 'Arial Black', sans-serif;
        }

        .brand-name {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 3px;
            letter-spacing: -0.5px;
        }

        .brand-name .plus {
            color: #C41E3A;
        }

        .brand-tagline {
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }

        /* Button section */
        .button-group {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 18px 32px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #C41E3A;
            color: white;
            box-shadow: 0 2px 8px rgba(196, 30, 58, 0.25);
        }

        .btn:hover {
            background: #A01828;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(196, 30, 58, 0.35);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Bottom red section with curved top-right corner */
        .footer-section {
            background: #C41E3A;
            padding: 50px 40px 35px;
            position: relative;
            height: 130px;
        }

        .footer-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: #C41E3A;
            border-radius: 0 80px 0 0;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.95);
            font-size: 13px;
            text-align: center;
            position: relative;
            z-index: 2;
            font-weight: 500;
        }

        @media (max-width: 450px) {
            .phone-container {
                width: 100%;
                height: 100vh;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="phone-container">
        <div class="content-wrapper">
            <!-- Top section with curved corner -->
            <div class="header-section">
                <div class="header-content">
                    <h1>Welcome</h1>
                    <p>Best data application</p>
                </div>
            </div>

            <!-- White middle section -->
            <div class="main-content">
                <!-- Logo -->
                <div class="logo-container">
                    <img src="<?php echo $logo;?>" alt="logo" class="logo-wrapper">
                    <!-- <div class="brand-name">GearOne <span class="plus">plus+</span></div>
                    <div class="brand-tagline">Smart. Secure. Seamless.</div> -->
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button class="btn" onclick="handleLogin()">Log In Now</button>
                    <button class="btn" onclick="handleCreateAccount()">Create Account</button>
                </div>
            </div>

            <!-- Bottom section with curved corner -->
            <div class="footer-section">
                <div class="footer-text">Powered by GearonePlus</div>
            </div>
        </div>
    </div>

    <script>
        function handleLogin() {
            const btn = event.target;
            btn.style.transform = 'scale(0.98)';
            setTimeout(() => {
                btn.style.transform = '';
                // console.log('Navigating to login...');
                window.location.href = 'login.php';
            }, 150);
        }

        function handleCreateAccount() {
            const btn = event.target;
            btn.style.transform = 'scale(0.98)';
            setTimeout(() => {
                btn.style.transform = '';
                // console.log('Navigating to create account...');
                window.location.href = 'register.php';
            }, 150);
        }

        // Smooth hover effects
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>