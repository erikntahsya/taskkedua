<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <style>
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

        /* Background Animation */
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

        /* Register Container */
        .register-container {
            position: relative;
            z-index: 1;
            background: rgba(32, 32, 48, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 3rem;
            width: 500px;
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

        .register-container h3 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            color: #3a86ff;
            text-shadow: 0 3px 10px rgba(58, 134, 255, 0.8);
            text-align: center;
        }

        /* Grid Layout */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 1.5rem;
        }

        .col {
            flex: 1;
            min-width: 200px;
            padding: 0;
            box-sizing: border-box;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            color: #a6b1e1;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
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

        textarea {
            resize: none;
            min-height: 100px;
        }

        .link {
            display: block;
            margin-top: 1rem;
            font-size: 1rem;
            color: #a6b1e1;
            text-decoration: none;
            text-align: center;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .link:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        /* Error Message Style */
        .error-message {
    color: #f44336;
    font-size: 0.9rem;
    margin-top: 0.5rem;
    display: none; /* Awalnya disembunyikan */
}

        /* Responsive Design */
        @media (min-width: 768px) {
            .row {
                gap: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="gradient-circle"></div>
        <div class="gradient-circle"></div>
    </div>
    <div class="register-container">
        <h3>Create an Account</h3>

        @if ($errors->has('error'))
            <div class="error-message">
                {{ $errors->first('error') }}
            </div>
        @endif

        <form id="registerForm" action="{{ route('register') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" >
                        <span class="error-message" id="username-error"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" >
                        <span class="error-message" id="email-error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="no_hp">Phone Number</label>
                        <input type="number" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Enter your phone number" >
                        <span class="error-message" id="no_hp-error"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" placeholder="Enter your address" >{{ old('address') }}</textarea>
                        <span class="error-message" id="address-error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select id="jurusan" name="jurusan" >
                            <option value="" disabled selected>Select your department</option>
                            <option value="RPL">RPL</option>
                            <option value="Otomotif">Otomotif</option>
                            <option value="DPIB">DPIB</option>
                            <option value="DKV">DKV</option>
                        </select>
                        <span class="error-message" id="jurusan-error"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="password" placeholder="Enter your password" >
                            <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #a6b1e1;">👁️</span>
                        </div>
                        <span class="error-message" id="password-error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div style="position: relative;">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" >
                            <span id="toggleConfirmPassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #a6b1e1;">👁️</span>
                        </div>
                        <span class="error-message" id="password_confirmation-error"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">Register</button>
            <a href="{{ route('login') }}" class="link">Already have an account? Login</a>
        </form>
        
    </div>

    <script>
        // Hide/Show Password
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    
        // AJAX Form Submission
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dikirim secara default
    
            // Sembunyikan pesan error sebelumnya
            document.querySelectorAll('.error-message').forEach(error => {
                error.style.display = 'none';
            });
    
            // Ambil data form
            const formData = new FormData(this);
    
            // Kirim data menggunakan AJAX
            fetch("{{ route('register') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Tampilkan pesan error untuk setiap inputan
                    Object.keys(data.errors).forEach(field => {
                        const errorMessage = document.getElementById(`${field}-error`);
                        errorMessage.textContent = data.errors[field][0];
                        errorMessage.style.display = 'block';
                    });
                } else if (data.success) {
                    // Jika berhasil, redirect ke halaman login
                    window.location.href = "{{ route('login') }}";
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>

</html>