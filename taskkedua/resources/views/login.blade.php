<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #1e1e2f, #252542);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
    
        .background {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }
    
        /* Gradient Circles */
        .gradient-circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(58, 134, 255, 0.6), transparent);
            animation: float 8s infinite ease-in-out;
        }
    
        .gradient-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
    
        .gradient-circle:nth-child(2) {
            width: 500px;
            height: 500px;
            bottom: 20%;
            right: 15%;
            animation-delay: 3s;
        }
    
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-30px);
            }
        }
    
        /* Shooting Stars */
        .shooting-star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.7);
            animation: shoot 3s infinite ease-in-out;
        }
    
        .shooting-star:nth-child(3n) {
            top: 30%;
            left: 70%;
            animation-delay: 1s;
        }
    
        .shooting-star:nth-child(4n) {
            top: 60%;
            left: 20%;
            animation-delay: 2s;
        }
    
        @keyframes shoot {
            0% {
                opacity: 1;
                transform: translate(0, 0) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(-150px, 150px) scale(0.5);
            }
        }
    
        /* Glowing Particles */
        .particle {
            position: absolute;
            width: 15px;
            height: 15px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8), transparent);
            border-radius: 50%;
            animation: glow 5s infinite ease-in-out;
        }
    
        .particle:nth-child(5) {
            top: 20%;
            left: 40%;
            animation-delay: 0s;
        }
    
        .particle:nth-child(6) {
            bottom: 30%;
            right: 25%;
            animation-delay: 2s;
        }
    
        @keyframes glow {
            0%, 100% {
                opacity: 0.5;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.5);
            }
        }
    
        /* Login Container */
        .login-container {
            position: relative;
            z-index: 1;
            background: rgba(32, 32, 48, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 3rem;
            width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1.5s ease-out;
        }
    
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    
        .login-container h3 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            color: #3a86ff;
            text-shadow: 0 3px 10px rgba(58, 134, 255, 0.8);
        }
    
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
    
        .form-group input {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }
    
        .form-group input:focus {
            box-shadow: 0 4px 15px rgba(58, 134, 255, 0.5);
            transform: scale(1.02);
        }
    
        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #3a86ff, #00ffab);
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
    
        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(58, 134, 255, 0.6);
        }
    
        .link {
            display: block;
            margin-top: 1rem;
            font-size: 1rem;
            color: #a6b1e1;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.2s ease;
        }
    
        .link:hover {
            color: #fff;
            transform: translateY(-2px);
        }
    
        /* Error Message Style */
        .error-message {
            color: #f44336;
            background: rgba(244, 67, 54, 0.2);
            padding: 10px;
            margin-bottom: 1.5rem;
            border-radius: 10px;
            font-size: 1rem;
        }
    
        /* Icon Style for Form */
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a6b1e1;
            font-size: 1.2rem;
        }
    
        .input-group {
            position: relative;
        }
    
        .input-group input {
            padding-left: 40px; /* Space for icon */
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a6b1e1;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #fff;
        }

    </style>
    
</head>

<body>
    <div class="background">
        <div class="gradient-circle"></div>
        <div class="gradient-circle"></div>
        <div class="shooting-star"></div>
        <div class="shooting-star"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="login-container">
        <h3>Login to Your Account</h3>

        <!-- Display Error Message -->
        @if ($errors->has('login_error'))
            <div class="error-message">
                {{ $errors->first('login_error') }}
            </div>
        @endif

        <form action="/login" method="post">
            @csrf
            <div class="form-group input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>            
            <button type="submit" class="btn">Sign In</button>
        </form>
        <div class="link-container">
            <a href="{{ route('register') }}" class="link">Don't have an account? Register</a>
        </div>
    </div>
</body>
@include('sweetalert::alert')
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        // Toggle password visibility
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</html>
