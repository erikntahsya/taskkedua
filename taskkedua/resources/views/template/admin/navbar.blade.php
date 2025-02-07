<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.9/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Navbar */
        
        .navbar {
            background: #2c3e50;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #ecf0f1;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #1abc9c;
        }

        /* Profile and Logout Buttons */
        .navbar-nav .nav-item .btn {
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 8px 20px;
            margin-left: 15px;
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-item .btn:hover {
            background-color: #16a085;
        }

        .btn-logout {
            background-color: #e74c3c;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #3498db, #2c3e50);
            color: white;
            height: 50vh;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .hero h1 {
            font-size: 2.8rem;
            font-weight: 600;
        }

        /* Content Wrapper */
        .content-wrapper {
            padding: 40px 20px;
            background: #ecf0f1;
            min-height: 100vh;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .content-card h2 {
            font-size: 1.6rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .content-card p {
            color: #7f8c8d;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
        }

        .content-card i {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 10px;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            text-align: center;
        }

        footer a {
            color: #1abc9c;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-user"></i> {{ Auth::user()->username }} 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    
    <!-- Hero Section -->
    @if (Route::currentRouteName() === 'admin.dashboard')
    <div class="hero">
        <h1>Welcome to Emer Id</h1>
        <p>Your one-stop solution for managing your content efficiently</p>
    </div>
    @endif
       

    <!-- Content Cards -->

    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
