<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearOne Plus+ - Airtime Purchase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: #f5f5f5;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            min-height: 100vh;
            padding: 20px;
        }

        .phone-container {
            width: 493px;
            height: auto;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: #C41E3A;
            padding: 30px 25px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            color: white;
            font-size: 24px;
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            /* overflow-y: auto; */
            background: #f8f8f8;
            padding: 25px;
        }

        /* Balance Display */
        .balance-display {
            text-align: center;
            margin-bottom: 30px;
        }

        .balance-amount {
            font-size: 42px;
            font-weight: 700;
            color: #C41E3A;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            position: absolute;
            top: -10px;
            left: 20px;
            background: #f8f8f8;
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
            padding: 18px 50px 18px 20px;
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

        /* Phone Number Input with Icon */
        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #C41E3A;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .input-icon:hover {
            color: #A01828;
        }

        /* Network Selection Grid */
        .network-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-top: 15px;
        }

        .network-box {
            aspect-ratio: 1;
            border: 2px solid #C41E3A;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 10px;
        }

        .network-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(196, 30, 58, 0.2);
        }

        .network-box.selected {
            background: #C41E3A;
            border-color: #A01828;
        }

        .network-box.selected::after {
            content: '✓';
            position: absolute;
            top: 5px;
            right: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        .network-logo {
            font-size: 28px;
            color: #C41E3A;
            margin-bottom: 5px;
        }

        .network-box.selected .network-logo {
            color: white;
        }

        .network-name {
            font-size: 10px;
            font-weight: 600;
            color: #C41E3A;
            text-transform: uppercase;
            text-align: center;
        }

        .network-box.selected .network-name {
            color: white;
        }

        /* PIN Input with Eye Icon */
        .pin-wrapper {
            position: relative;
        }

        .toggle-pin {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #C41E3A;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .toggle-pin:hover {
            color: #A01828;
        }

        /* Purchase Button */
        .btn-purchase {
            width: 100%;
            padding: 18px 32px;
            border: none;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            background: #C41E3A;
            color: white;
            box-shadow: 0 4px 16px rgba(196, 30, 58, 0.3);
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-purchase:hover {
            background: #A01828;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(196, 30, 58, 0.4);
        }

        .btn-purchase:active {
            transform: translateY(0);
        }

        /* Banner Section */
        .banner-section {
            margin-top: 25px;
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .banner-section::-webkit-scrollbar {
            height: 4px;
        }

        .banner-section::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .banner-section::-webkit-scrollbar-thumb {
            background: #C41E3A;
            border-radius: 10px;
        }

        .banner-item {
            min-width: 140px;
            height: 140px;
            border-radius: 12px;
            overflow: hidden;
            background: white;
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
              position: fixed;
               bottom: 0;
    left: 0;
    width: 100%;
    z-index: 200;
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
            color: white;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .nav-item i {
            font-size: 24px;
        }

        /* Contact Picker Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 400px;
            max-height: 80vh;
            overflow: hidden;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            background: #C41E3A;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .modal-header h2 {
            font-size: 20px;
            font-weight: 600;
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .contacts-list {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px 0;
        }

        .contact-item {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: background 0.2s ease;
        }

        .contact-item:hover {
            background: #f5f5f5;
        }

        .contact-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #C41E3A;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .contact-info {
            flex: 1;
        }

        .contact-name {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .contact-phone {
            color: #666;
            font-size: 14px;
        }

        .no-contacts {
            padding: 40px 20px;
            text-align: center;
            color: #666;
        }

        .contact-error {
            padding: 20px;
            text-align: center;
            color: #C41E3A;
            background: #ffe6e6;
            margin: 10px;
            border-radius: 8px;
        }

        .contact-permission-btn {
            background: #C41E3A;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            margin: 20px auto;
            display: block;
            transition: background 0.3s ease;
        }

        .contact-permission-btn:hover {
            background: #A01828;
        }

        /* Network Detection Indicator */
        .network-detection {
            margin-top: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            background: #e8f4fd;
            color: #0066cc;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .network-detection.show {
            opacity: 1;
            transform: translateY(0);
        }

        .network-detection i {
            font-size: 16px;
        }

        /* Quick Amount Buttons */
        .quick-amounts {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .amount-btn {
            padding: 8px 16px;
            border: 1px solid #C41E3A;
            border-radius: 20px;
            background: white;
            color: #C41E3A;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .amount-btn:hover {
            background: #ffe6e6;
        }

        .amount-btn.active {
            background: #C41E3A;
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
        <!-- Header -->
        <div class="header">
            <h1>Airtime for all network</h1>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Balance Display -->
            <div class="balance-display">
                <div class="balance-amount">₦23,457</div>
            </div>

            <!-- Phone Number Input -->
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <div class="input-wrapper">
                    <input 
                        type="tel" 
                        class="form-input" 
                        placeholder="08167767873"
                        id="phoneNumber"
                    >
                    <i class="bi bi-person-circle input-icon" id="contactPickerBtn"></i>
                </div>
                <div class="network-detection" id="networkDetection">
                    <i class="bi bi-wifi"></i>
                    <span id="detectedNetwork">Network detected: MTN</span>
                </div>
            </div>

            <!-- Network Selection -->
            <div class="form-group">
                <label class="form-label">Select Network</label>
                <div class="network-grid">
                    <div class="network-box" data-network="mtn" onclick="selectNetwork(this, 'mtn')">
                        <span class="network-logo">📱</span>
                        <span class="network-name">MTN</span>
                    </div>
                    <div class="network-box" data-network="glo" onclick="selectNetwork(this, 'glo')">
                        <span class="network-logo">📱</span>
                        <span class="network-name">GLO</span>
                    </div>
                    <div class="network-box" data-network="airtel" onclick="selectNetwork(this, 'airtel')">
                        <span class="network-logo">📱</span>
                        <span class="network-name">AIRTEL</span>
                    </div>
                    <div class="network-box" data-network="9mobile" onclick="selectNetwork(this, '9mobile')">
                        <span class="network-logo">📱</span>
                        <span class="network-name">9MOBILE</span>
                    </div>
                </div>
            </div>

            <!-- Amount Input -->
            <div class="form-group">
                <label class="form-label">Enter Amount</label>
                <input 
                    type="number" 
                    class="form-input" 
                    placeholder="Enter amount"
                    id="amount"
                >
                <div class="quick-amounts">
                    <button class="amount-btn" data-amount="100" onclick="setAmount(100)">₦100</button>
                    <button class="amount-btn" data-amount="200" onclick="setAmount(200)">₦200</button>
                    <button class="amount-btn" data-amount="500" onclick="setAmount(500)">₦500</button>
                    <button class="amount-btn" data-amount="1000" onclick="setAmount(1000)">₦1,000</button>
                </div>
            </div>

            <!-- PIN Input -->
            <div class="form-group">
                <label class="form-label">PIN</label>
                <div class="pin-wrapper">
                    <input 
                        type="password" 
                        class="form-input" 
                        placeholder="****"
                        id="pinField"
                        maxlength="4"
                    >
                    <button type="button" class="toggle-pin" onclick="togglePin()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Purchase Button -->
            <button class="btn-purchase" onclick="handlePurchase()">Purchase</button>

            <!-- Banner Section -->
            <div class="banner-section">
                <div class="banner-item">
                    <img src="https://via.placeholder.com/140x140/C41E3A/ffffff?text=Promo+1" alt="Banner 1">
                </div>
                <div class="banner-item">
                    <img src="https://via.placeholder.com/140x140/A01828/ffffff?text=Promo+2" alt="Banner 2">
                </div>
                <div class="banner-item">
                    <img src="https://via.placeholder.com/140x140/C41E3A/ffffff?text=Promo+3" alt="Banner 3">
                </div>
            </div>
        </div>

    </div>
     
        <!-- Bottom Navigation -->
        <div class="bottom-nav">
            <div class="nav-item active" onclick="handleNav('home')">
                <i class="bi bi-house-fill"></i>
            </div>
            <div class="nav-item" onclick="handleNav('history')">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="nav-item" onclick="handleNav('support')">
                <i class="bi bi-headset"></i>
            </div>
            <div class="nav-item" onclick="handleNav('more')">
                <i class="bi bi-chat-dots-fill"></i>
            </div>
        </div>
    <!-- Contact Picker Modal -->
    <div class="modal-overlay" id="contactModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Select a Contact</h2>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            <div class="contacts-list" id="contactsList">
                <!-- Contacts will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        let selectedNetwork = null;
        
        // Network prefix mappings for Nigerian providers
        const networkPrefixes = {
            'mtn': ['0803', '0806', '0703', '0706', '0813', '0816', '0810', '0814', '0903', '0906'],
            'glo': ['0805', '0807', '0705', '0815', '0811', '0905'],
            'airtel': ['0802', '0808', '0708', '0812', '0701', '0902', '0907', '0901'],
            '9mobile': ['0809', '0817', '0818', '0909', '0908']
        };

        // Network display names
        const networkNames = {
            'mtn': 'MTN',
            'glo': 'GLO',
            'airtel': 'AIRTEL',
            '9mobile': '9MOBILE'
        };

        // Initialize the app
        document.addEventListener('DOMContentLoaded', function() {
            // Set up contact picker button
            document.getElementById('contactPickerBtn').addEventListener('click', openContactPicker);
            
            // Set up modal close button
            document.getElementById('closeModal').addEventListener('click', closeContactPicker);
            
            // Set up phone number input for auto network detection
            document.getElementById('phoneNumber').addEventListener('input', detectNetworkFromPhoneNumber);
        });

        function selectNetwork(element, network) {
            // Remove selected class from all network boxes
            document.querySelectorAll('.network-box').forEach(box => {
                box.classList.remove('selected');
            });
            
            // Add selected class to clicked box
            element.classList.add('selected');
            selectedNetwork = network;
            console.log('Selected network:', network);
            
            // Update network detection indicator
            updateNetworkDetection(network);
        }

        function togglePin() {
            const pinField = document.getElementById('pinField');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (pinField.type === 'password') {
                pinField.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                pinField.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }

        function handlePurchase() {
            const phoneNumber = document.getElementById('phoneNumber').value;
            const amount = document.getElementById('amount').value;
            const pin = document.getElementById('pinField').value;

            if (!phoneNumber || !amount || !pin || !selectedNetwork) {
                alert('Please fill all fields and select a network');
                return;
            }

            console.log('Purchase details:', {
                phoneNumber,
                network: selectedNetwork,
                amount,
                pin
            });

            alert(`Purchasing ₦${amount} airtime for ${phoneNumber} on ${networkNames[selectedNetwork]}`);
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

        // Auto-detect network based on phone number prefix
        function detectNetworkFromPhoneNumber() {
            const phoneNumber = document.getElementById('phoneNumber').value;
            
            // If phone number is empty, don't do anything
            if (!phoneNumber) {
                hideNetworkDetection();
                return;
            }
            
            // Extract the first 4 digits
            const prefix = phoneNumber.substring(0, 4);
            
            // Find the network for this prefix
            for (const [network, prefixes] of Object.entries(networkPrefixes)) {
                if (prefixes.includes(prefix)) {
                    // Select the corresponding network box
                    const networkBox = document.querySelector(`.network-box[data-network="${network}"]`);
                    if (networkBox) {
                        selectNetwork(networkBox, network);
                    }
                    return;
                }
            }
            
            // If no network found, deselect all networks
            document.querySelectorAll('.network-box').forEach(box => {
                box.classList.remove('selected');
            });
            selectedNetwork = null;
            
            // Show error in network detection
            showNetworkDetectionError();
        }

        // Update network detection indicator
        function updateNetworkDetection(network) {
            const networkDetection = document.getElementById('networkDetection');
            const detectedNetwork = document.getElementById('detectedNetwork');
            
            detectedNetwork.textContent = `Network detected: ${networkNames[network]}`;
            networkDetection.classList.add('show');
        }

        // Show network detection error
        function showNetworkDetectionError() {
            const networkDetection = document.getElementById('networkDetection');
            const detectedNetwork = document.getElementById('detectedNetwork');
            
            detectedNetwork.textContent = 'Unable to detect network. Please select manually.';
            networkDetection.style.background = '#ffe6e6';
            networkDetection.style.color = '#C41E3A';
            networkDetection.classList.add('show');
        }

        // Hide network detection indicator
        function hideNetworkDetection() {
            const networkDetection = document.getElementById('networkDetection');
            networkDetection.classList.remove('show');
        }

        // Contact picker functionality
        function openContactPicker() {
            document.getElementById('contactModal').classList.add('active');
            loadContacts();
        }

        function closeContactPicker() {
            document.getElementById('contactModal').classList.remove('active');
        }

        // Normalize phone number - remove country code and ensure it starts with 0
        function normalizePhoneNumber(phoneNumber) {
            // Remove all non-digit characters
            let normalized = phoneNumber.replace(/\D/g, '');
            
            // Remove country code if present (+234 or 234)
            if (normalized.startsWith('234') && normalized.length >= 10) {
                normalized = '0' + normalized.substring(3);
            }
            
            // Ensure it starts with 0
            if (!normalized.startsWith('0') && normalized.length >= 9) {
                normalized = '0' + normalized;
            }
            
            return normalized;
        }

        // Load contacts from device
        async function loadContacts() {
            const contactsList = document.getElementById('contactsList');
            
            // Clear existing contacts
            contactsList.innerHTML = '';
            
            // Check if the Contacts API is available
            if (!('contacts' in navigator && 'select' in navigator.contacts)) {
                contactsList.innerHTML = `
                    <div class="contact-error">
                        <p>Contact picker not supported in your browser</p>
                        <p>Try using Chrome on Android</p>
                    </div>
                `;
                return;
            }
            
            // Add permission button
            const permissionBtn = document.createElement('button');
            permissionBtn.className = 'contact-permission-btn';
            permissionBtn.textContent = 'Select Contact from Device';
            permissionBtn.onclick = selectContactFromDevice;
            
            contactsList.appendChild(permissionBtn);
        }

        // Select contact from device using Contacts API
        async function selectContactFromDevice() {
            try {
                const contacts = await navigator.contacts.select(['name', 'tel'], { multiple: false });
                
                if (contacts && contacts.length > 0) {
                    const contact = contacts[0];
                    const phoneNumber = contact.tel && contact.tel.length > 0 ? contact.tel[0] : '';
                    
                    if (phoneNumber) {
                        const normalizedNumber = normalizePhoneNumber(phoneNumber);
                        document.getElementById('phoneNumber').value = normalizedNumber;
                        
                        // Auto-detect network based on the selected contact's phone number
                        detectNetworkFromPhoneNumber();
                        
                        // Close the contact picker
                        closeContactPicker();
                        
                        console.log('Selected contact:', contact);
                    } else {
                        alert('No phone number found for this contact');
                    }
                }
            } catch (error) {
                console.error('Error selecting contact:', error);
                
                // Fallback for browsers that don't support the Contacts API
                const contactsList = document.getElementById('contactsList');
                contactsList.innerHTML = `
                    <div class="contact-error">
                        <p>Error accessing contacts: ${error.message}</p>
                        <p>Please enter the phone number manually</p>
                    </div>
                `;
            }
        }

        // Set amount from quick buttons
        function setAmount(amount) {
            document.getElementById('amount').value = amount;
            
            // Update button states
            document.querySelectorAll('.amount-btn').forEach(btn => {
                if (parseInt(btn.getAttribute('data-amount')) === amount) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        // Smooth focus animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>