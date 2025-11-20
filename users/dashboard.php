<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearOne Plus+ - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .phone-container {
            width: 393px;
            height: 740px;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        /* Top Navigation Bar */
        .top-nav {
            background: #C41E3A;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 100;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-small {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo-p {
            font-size: 24px;
            font-weight: 900;
            color: #C41E3A;
        }

        .welcome-text {
            color: white;
        }

        .welcome-text h3 {
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 2px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .welcome-text h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .menu-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .menu-icon:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .menu-icon span {
            width: 24px;
            height: 3px;
            background: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .menu-icon.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-icon.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-icon.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            position: absolute;
            top: 75px;
            right: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 99;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.2s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #333;
            font-size: 15px;
            font-weight: 500;
            border-bottom: 1px solid #f0f0f0;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            border-radius: 0 0 12px 12px;
        }

        .dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }

        .dropdown-item:hover {
            background: #f8f8f8;
        }

        .dropdown-item.logout {
            color: #C41E3A;
            font-weight: 600;
        }

        .dropdown-item.logout:hover {
            background: #fff5f6;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            overflow-y: auto;
            background: #f5f5f5;
        }

        /* Balance Card */
        .balance-card {
            background: white;
            margin: 20px;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .balance-amount {
            font-size: 42px;
            font-weight: 700;
            color: #C41E3A;
            margin-bottom: 15px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .action-btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #C41E3A;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #A01828;
            transform: translateY(-2px);
        }

        /* Quick Actions */
        .quick-actions {
            padding: 0 20px 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #C41E3A;
            margin-bottom: 15px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .action-card {
            background: white;
            padding: 20px 15px;
            border-radius: 12px;
            border: 2px solid #C41E3A;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(196, 30, 58, 0.2);
        }

        .action-icon {
            font-size: 32px;
            margin-bottom: 8px;
            color: #C41E3A;
        }

        .action-label {
            font-size: 13px;
            font-weight: 600;
            color: #C41E3A;
        }

        /* Transaction History */
        .transaction-section {
            padding: 0 20px 20px;
        }

        .transaction-btn {
            width: 100%;
            padding: 18px;
            background: white;
            border: 2px solid #C41E3A;
            border-radius: 12px;
            color: #C41E3A;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .transaction-btn:hover {
            background: #C41E3A;
            color: white;
        }

        /* Banner Carousel */
        .banner-carousel {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding-bottom: 10px;
            scroll-behavior: smooth;
        }

        .banner-carousel::-webkit-scrollbar {
            height: 4px;
        }

        .banner-carousel::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .banner-carousel::-webkit-scrollbar-thumb {
            background: #C41E3A;
            border-radius: 10px;
        }

        .banner-item {
            min-width: 280px;
            height: 140px;
            border-radius: 12px;
            overflow: hidden;
        }

        .banner-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Bottom Navigation */
        .bottom-nav {
            background: #C41E3A;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 15px 0;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 5px 15px;
            border-radius: 8px;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .nav-icon {
            font-size: 24px;
            color: white;
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
        <!-- Top Navigation -->
        <div class="top-nav">
            <div class="nav-left">
                <div class="logo-small">
                    <span class="logo-p">P</span>
                </div>
                <div class="welcome-text">
                    <h3>Welcome 😊</h3>
                    <h2>Ahdullahi Ahmad</h2>
                </div>
            </div>
            <button class="menu-icon" id="menuBtn" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Dropdown Menu -->
        <div class="dropdown-menu" id="dropdownMenu">
            <div class="dropdown-item" onclick="handleProfile()">
                <span><i class="bi bi-person"></i></span> Profile
            </div>
            <div class="dropdown-item" onclick="handleSettings()">
                <span><i class="bi bi-gear"></i></span> Settings
            </div>
            <div class="dropdown-item" onclick="handleHelp()">
                <span><i class="bi bi-question-lg"></i></span> Help & Support
            </div>
            <div class="dropdown-item logout" onclick="handleLogout()">
                <span><i class="bi bi-box-arrow-right"></i></span> Logout
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Balance Card -->
            <div class="balance-card">
                <div class="balance-amount">₦23,457</div>
                <div class="action-buttons">
                    <button class="action-btn" onclick="handleAddMoney()">
                        <span><i class="bi bi-plus-circle"></i></span> Add money
                    </button>
                    <button class="action-btn" onclick="handleSendMoney()">
                        <span><i class="bi bi-send-plus"></i></span> Send money
                    </button>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h3 class="section-title">Quick Actions</h3>
                <div class="actions-grid">
                    <div class="action-card" onclick="handleAction('data')">
                        <div class="action-icon"><i class="bi bi-globe"></i></div>
                        <div class="action-label">Data</div>
                    </div>
                    <div class="action-card" onclick="handleAction('airtime')">
                        <div class="action-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div class="action-label">Airtime</div>
                    </div>
                    <div class="action-card" onclick="handleAction('cable')">
                        <div class="action-icon"><i class="bi bi-tv"></i></div>
                        <div class="action-label">Cable</div>
                    </div>
                    <div class="action-card" onclick="handleAction('electricity')">
                        <div class="action-icon"><i class="bi bi-fire"></i></div>
                        <div class="action-label">Electricity</div>
                    </div>
                    <div class="action-card" onclick="handleAction('airtime-to-cash')">
                        <div class="action-icon"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="action-label">Airtime to Cash</div>
                    </div>
                    <div class="action-card" onclick="handleAction('education')">
                        <div class="action-icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <div class="action-label">Education</div>
                    </div>
                    <div class="action-card" onclick="handleAction('api-docs')">
                        <div class="action-icon"><i class="bi bi-envelope-paper"></i></div>
                        <div class="action-label">API Docs</div>
                    </div>
                    <div class="action-card" onclick="handleAction('nimc')">
                        <div class="action-icon"><i class="bi bi-person-vcard"></i></div>
                        <div class="action-label">NIMC</div>
                    </div>
                    <div class="action-card" onclick="handleAction('bvn')">
                        <div class="action-icon"><i class="bi bi-person-badge"></i></div>
                        <div class="action-label">BVN</div>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="transaction-section">
                <button class="transaction-btn" onclick="handleTransactionHistory()">
                    Transaction History
                </button>

                <!-- Banner Carousel -->
                <div class="banner-carousel">
                    <div class="banner-item">
                        <img src="image.png" alt="Banner 1">
                    </div>
                    <div class="banner-item">
                        <img src="../banner1.jpg" alt="Banner 2">
                    </div>
                    <div class="banner-item">
                        <img src="image.png" alt="Banner 3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="bottom-nav">
            <div class="nav-item active" onclick="handleNav('home')">
                <span class="nav-icon"><i class="bi bi-house-fill"></i></span>
            </div>
            <div class="nav-item" onclick="handleNav('history')">
                <span class="nav-icon"><i class="bi bi-clock-history"></i></span>
            </div>
            <div class="nav-item" onclick="handleNav('support')">
                <span class="nav-icon"><i class="bi bi-headset"></i></span>
            </div>
            <div class="nav-item" onclick="handleNav('more')">
                <span class="nav-icon"><i class="bi bi-three-dots"></i></span>
            </div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            const menuBtn = document.getElementById('menuBtn');
            const dropdown = document.getElementById('dropdownMenu');
            
            menuBtn.classList.toggle('active');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const menuBtn = document.getElementById('menuBtn');
            const dropdown = document.getElementById('dropdownMenu');
            
            if (!menuBtn.contains(event.target) && !dropdown.contains(event.target)) {
                menuBtn.classList.remove('active');
                dropdown.classList.remove('show');
            }
        });

        function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                console.log('Logging out...');
                alert('Logout successful!');
                // Redirect to login page
            }
        }

        function handleProfile() {
            console.log('Navigate to profile');
            toggleMenu();
        }

        function handleSettings() {
            console.log('Navigate to settings');
            toggleMenu();
        }

        function handleHelp() {
            console.log('Navigate to help');
            toggleMenu();
        }

        function handleAddMoney() {
            console.log('Add money clicked');
            alert('Add money feature');
        }

        function handleSendMoney() {
            console.log('Send money clicked');
            alert('Send money feature');
        }

        function handleAction(action) {
            console.log('Action clicked:', action);
            alert(`${action} feature`);
        }

        function handleTransactionHistory() {
            console.log('Transaction history clicked');
            alert('Transaction history feature');
        }

        function handleNav(section) {
            console.log('Navigate to:', section);
            
            // Remove active class from all nav items
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked item
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>