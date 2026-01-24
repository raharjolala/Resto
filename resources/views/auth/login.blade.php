<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to JOSS GANDOS | Login</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #C62828;
            --primary-dark: #8E0000;
            --primary-light: #FF5252;
            --accent-color: #FF9800;
            --accent-light: #FFB74D;
            --dark-color: #1A1A2E;
            --light-color: #F8F9FA;
            --gray-light: #E9ECEF;
            --gray-medium: #6C757D;
            --white: #FFFFFF;
            --gold: #FFD700;
            --shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
            --shadow-hover: 0 20px 60px rgba(198, 40, 40, 0.25);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--dark-color);
            position: relative;
            overflow-x: hidden;
        }
        
        /* Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 152, 0, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(198, 40, 40, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 82, 82, 0.03) 0%, transparent 50%);
            z-index: -1;
        }
        
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: var(--white);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        /* Left Side - Hero Section */
        .login-hero {
            flex: 0 0 50%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, #D32F2F 100%);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(45deg, transparent 65%, rgba(255, 255, 255, 0.1) 75%, transparent 85%),
                linear-gradient(-45deg, transparent 65%, rgba(255, 255, 255, 0.1) 75%, transparent 85%);
            background-size: 300% 300%;
            animation: shimmer 8s infinite linear;
            z-index: -1;
        }
        
        @keyframes shimmer {
            0% { background-position: 0% 0%; }
            100% { background-position: 300% 300%; }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        
        .logo-image {
            width: 180px;
            height: 180px;
            margin-bottom: 20px;
            background: white;
            border-radius: 50%;
            padding: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 5px solid rgba(255, 255, 255, 0.3);
            transition: var(--transition);
        }
        
        .logo-image:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
        }
        
        .logo-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }
        
        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 5px;
            text-align: center;
            letter-spacing: -0.5px;
            background: linear-gradient(to right, #FFFFFF, #FFE0B2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .brand-tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            opacity: 0.9;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-align: center;
            color: var(--accent-light);
            margin-bottom: 40px;
        }
        
        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            text-align: center;
            position: relative;
            padding-bottom: 20px;
        }
        
        .hero-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        .hero-description {
            font-size: 1.1rem;
            line-height: 1.7;
            opacity: 0.9;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 300;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-features {
            list-style: none;
            margin-top: 40px;
            padding: 0;
        }
        
        .hero-features li {
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.05rem;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }
        
        .hero-features li:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
            border-color: var(--accent-color);
        }
        
        .hero-features i {
            color: var(--accent-color);
            font-size: 1.3rem;
            width: 24px;
            text-align: center;
        }
        
        /* Right Side - Login Form */
        .login-form-section {
            flex: 0 0 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
            position: relative;
        }
        
        .form-container {
            max-width: 380px;
            width: 100%;
            margin: 0 auto;
        }
        
        .form-header {
            margin-bottom: 40px;
            text-align: center;
            position: relative;
        }
        
        .form-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }
        
        .form-subtitle {
            color: var(--gray-medium);
            font-size: 0.95rem;
            font-weight: 400;
            margin-top: 20px;
            line-height: 1.6;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .input-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .input-label i {
            color: var(--primary-color);
            font-size: 0.9rem;
        }
        
        .input-wrapper {
            position: relative;
            transition: var(--transition);
        }
        
        .input-wrapper:hover {
            transform: translateY(-2px);
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-medium);
            font-size: 1.2rem;
            z-index: 2;
        }
        
        .form-control {
            width: 100%;
            padding: 18px 18px 18px 55px;
            border: 2px solid var(--gray-light);
            border-radius: 14px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            transition: var(--transition);
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            color: var(--dark-color);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.15);
            transform: translateY(-2px);
        }
        
        .form-control::placeholder {
            color: var(--gray-medium);
            font-weight: 400;
        }
        
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-medium);
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: var(--transition);
            z-index: 2;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
            background: rgba(198, 40, 40, 0.1);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .checkbox-container input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-color);
            cursor: pointer;
            border-radius: 4px;
            transition: var(--transition);
        }
        
        .checkbox-container label {
            font-size: 0.9rem;
            color: var(--dark-color);
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }
        
        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: var(--transition);
            padding: 5px 10px;
            border-radius: 6px;
        }
        
        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
            background: rgba(198, 40, 40, 0.05);
        }
        
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--white);
            border: none;
            padding: 20px;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(198, 40, 40, 0.3);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(198, 40, 40, 0.4);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        }
        
        .btn-login:active {
            transform: translateY(-1px);
        }
        
        .btn-login i {
            margin-right: 12px;
        }
        
        .guest-note {
            text-align: center;
            margin-top: 25px;
            color: var(--gray-medium);
            font-size: 0.9rem;
            padding: 15px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            border-left: 4px solid var(--accent-color);
        }
        
        .guest-note a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .guest-note a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Alert Styling */
        .alert {
            border-radius: 14px;
            padding: 18px 22px;
            margin-bottom: 25px;
            border: none;
            font-size: 0.95rem;
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-danger {
            background: linear-gradient(135deg, rgba(198, 40, 40, 0.1) 0%, rgba(142, 0, 0, 0.1) 100%);
            color: var(--primary-dark);
            border-left: 4px solid var(--primary-color);
        }
        
        .alert-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1) 0%, rgba(33, 136, 56, 0.1) 100%);
            color: #28a745;
            border-left: 4px solid #28a745;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }
            
            .login-hero,
            .login-form-section {
                flex: none;
                width: 100%;
            }
            
            .login-hero {
                padding: 40px 30px;
            }
            
            .login-form-section {
                padding: 40px 30px;
            }
            
            .logo-image {
                width: 140px;
                height: 140px;
            }
            
            .brand-name {
                font-size: 2.2rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 480px) {
            .login-hero,
            .login-form-section {
                padding: 30px 20px;
            }
            
            .logo-image {
                width: 120px;
                height: 120px;
                padding: 15px;
            }
            
            .brand-name {
                font-size: 1.8rem;
            }
            
            .hero-title {
                font-size: 1.7rem;
            }
            
            .form-title {
                font-size: 1.6rem;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .hero-features li {
                padding: 10px 15px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Hero Section -->
        <div class="login-hero">
            <div class="hero-overlay"></div>
            
            <div class="hero-content">
                <div class="logo-container">
                    <div class="logo-image">
                        <img src="{{ asset('img/logojossgandos.png') }}" 
                             alt="JOSS GANDOS Logo" 
                             onerror="this.onerror=null; this.src='https://www.restojossgandos.com/public/img/logojossgandos.png';">
                    </div>
                    <h1 class="brand-name">JOSS GANDOS</h1>
                    <p class="brand-tagline">Restaurant & Café</p>
                </div>
                
                <h2 class="hero-title">WELCOME BACK</h2>
                <p class="hero-description">
                    Login to your account and discover the finest culinary experience at JOSS GANDOS.
                </p>
                
                <ul class="hero-features">
                    <li>
                        <i class="fas fa-calendar-check"></i>
                        <span>Manage your reservations</span>
                    </li>
                    <li>
                        <i class="fas fa-gift"></i>
                        <span>Exclusive member benefits</span>
                    </li>
                    <li>
                        <i class="fas fa-history"></i>
                        <span>View dining history</span>
                    </li>
                    <li>
                        <i class="fas fa-star"></i>
                        <span>Personalized recommendations</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="login-form-section">
            <div class="form-container">
                <div class="form-header">
                    <h2 class="form-title">LOGIN</h2>
                    <p class="form-subtitle">Enter your credentials to access your JOSS GANDOS account</p>
                </div>
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Oops!</strong> {{ $errors->first() }}
                    </div>
                @endif
                
                @if(session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="input-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user-circle input-icon"></i>
                            <input type="email" 
                                   class="form-control" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="your.email@example.com"
                                   required 
                                   autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="input-label">
                            <i class="fas fa-key"></i> Password
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" 
                                   class="form-control" 
                                   name="password" 
                                   id="password"
                                   placeholder="Enter your password"
                                   required>
                            <button type="button" 
                                    class="password-toggle" 
                                    id="togglePassword"
                                    aria-label="Toggle password visibility">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="remember-forgot">
                        <div class="checkbox-container">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Keep me signed in</label>
                        </div>
                        <a href="#" class="forgot-link">
                            <i class="fas fa-question-circle me-1"></i> Forgot Password?
                        </a>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> LOGIN
                    </button>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = togglePassword.querySelector('i');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
            
            // Add animation
            this.style.transform = 'translateY(-50%) scale(1.2)';
            setTimeout(() => {
                this.style.transform = 'translateY(-50%) scale(1)';
            }, 200);
        });
        
        // Form focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            const wrapper = input.parentElement;
            
            input.addEventListener('focus', function() {
                wrapper.style.transform = 'translateY(-4px)';
                wrapper.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
            });
            
            input.addEventListener('blur', function() {
                wrapper.style.transform = 'translateY(-2px)';
                wrapper.style.boxShadow = 'none';
            });
            
            // Initial hover effect
            wrapper.addEventListener('mouseenter', function() {
                if (document.activeElement !== input) {
                    this.style.transform = 'translateY(-3px)';
                }
            });
            
            wrapper.addEventListener('mouseleave', function() {
                if (document.activeElement !== input) {
                    this.style.transform = 'translateY(-2px)';
                }
            });
        });
        
        // Form submission loading state
        const loginForm = document.querySelector('form');
        loginForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.btn-login');
            const originalHTML = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> AUTHENTICATING...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.9';
            submitBtn.style.cursor = 'not-allowed';
            
            // Add pulsing animation
            submitBtn.style.animation = 'pulse 1.5s infinite';
            
            // Re-enable after 8 seconds (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalHTML;
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
                submitBtn.style.animation = 'none';
            }, 8000);
        });
        
        // Auto focus email field
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[name="email"]');
            if (emailInput && !emailInput.value) {
                setTimeout(() => {
                    emailInput.focus();
                    emailInput.parentElement.style.transform = 'translateY(-4px)';
                }, 300);
            }
            
            // Add CSS for pulse animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes pulse {
                    0% { box-shadow: 0 10px 30px rgba(198, 40, 40, 0.3); }
                    50% { box-shadow: 0 10px 40px rgba(198, 40, 40, 0.5); }
                    100% { box-shadow: 0 10px 30px rgba(198, 40, 40, 0.3); }
                }
            `;
            document.head.appendChild(style);
        });
        
        // Add subtle floating animation to logo
        const logoImage = document.querySelector('.logo-image');
        if (logoImage) {
            let angle = 0;
            function floatLogo() {
                angle += 0.5;
                const y = Math.sin(angle * Math.PI / 180) * 3;
                logoImage.style.transform = `translateY(${y}px) rotate(${y/2}deg)`;
                requestAnimationFrame(floatLogo);
            }
            setTimeout(floatLogo, 1000);
        }
    </script>
</body>
</html>