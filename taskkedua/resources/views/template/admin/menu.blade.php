<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Menu Sidebar */
        #layout-menu {
            background-color: #1f2b40; /* Warna biru tua untuk kesan profesional */
            color: white;
            height: 100vh;
            padding-top: 20px;
            border-right: 1px solid #2d3e50; /* Garis pembatas */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .app-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #2d3e50;
        }

        .app-brand-link .app-brand-text {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #00d1b2; /* Warna hijau terang untuk logo */
        }

        .menu-item {
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            background-color: #2d3e50;
            transform: scale(1.02);
        }

        .menu-link {
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            text-decoration: none;
        }

        .menu-link:hover {
            color: #00d1b2;
        }

        .menu-header {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 0.9rem;
            margin: 15px 20px;
            color: #adb5bd;
            border-bottom: 1px solid #2d3e50;
            padding-bottom: 5px;
        }

        .active {
            background-color: #00d1b2;
            font-weight: bold;
            color: white !important;
        }

        .menu-item-text {
            flex-grow: 1;
            margin-left: 10px;
        }

        .arrow {
            font-size: 0.8rem;
            color: #adb5bd;
        }

        /* Icon Styling */
        .menu-icon {
            font-size: 1.2rem;
            margin-right: 10px;
        }

    </style>
</head>

<body>
    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu">
        <div class="app-brand">
            <a href="" class="app-brand-link">
                <span class="app-brand-text">EMER ID</span>
            </a>
        </div>

        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="dashboard" class="menu-link">
                    <i class="menu-icon fas fa-home"></i>
                    <div class="menu-item-text">Dashboard</div>
                </a>
            </li>

            <!-- Components -->
            @auth
            @if(auth()->user()->role == 'Admin')
                <li class="menu-header">Kelola.biz</li>
        
                <li class="menu-item">
                    <a href="/kelola" class="menu-link">
                        <i class="menu-icon fas fa-users"></i>
                        <div class="menu-item-text">User Kelola</div>
                    </a>
                </li>
            @endif
        @endauth
        
            
    </aside>
    <!-- / Menu -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
