<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - JOSS GANDOS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #C62828;
            --primary-dark: #8E0000;
            --secondary-color: #FF9800;
            --dark-color: #2C3E50;
        }
        
        body {
            background: linear-gradient(135deg, var(--dark-color) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .login-header {
            background: var(--primary-color);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .login-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .login-logo i {
            color: var(--secondary-color);
            margin-right: 10px;
        }
        
        .login-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
        }
        
        .login-body {
            padding: 40px;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(198, 40, 40, 0.25);
        }
        
        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
        }
        
        .login-footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
        }
        
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .back-to-home {
            color: var(--primary-color);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
        }
        
        .back-to-home:hover {
            text-decoration: underline;
        }
        
        .back-to-home i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <i class="fas fa-utensils"></i> JOSS GANDOS
                </div>
                <h3 class="login-title">Admin Panel</h3>
            </div>
            
            <div class="login-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
                    </div>
                @endif
                
                @if(session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                @endif
                
                <!-- PERBAIKAN: Ubah route action -->
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               autofocus>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div style="position: relative;">
                            <input type="password" 
                                   class="form-control" 
                                   id="password" 
                                   name="password" 
                                   required>
                            <button type="button" id="togglePassword" class="btn btn-sm btn-outline-secondary position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" 
                               class="form-check-input" 
                               id="remember" 
                               name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> LOGIN
                    </button>
                    
                    <a href="{{ url('/') }}" class="back-to-home">
                        <i class="fas fa-arrow-left"></i> Back to Website
                    </a>
                </form>
            </div>
            
            <div class="login-footer">
                <p>&copy; {{ date('Y') }} JOSS GANDOS RESTO & CAFE. All rights reserved.</p>
                <p class="small text-muted">Admin access only</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Focus on email field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>