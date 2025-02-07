<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Full Width</title>
    <style>
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Ensure body takes full height */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content pushes footer to the bottom */
        .content {
            flex: 1;
        }

        /* Footer styles */
        footer {
            background-color: #2c3e50;
            width: 100%; /* Full width */
            padding: 10px 0;
            color: white;
        }
        .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .text-light {
            color: white !important;
        }

        .text-muted {
            color: #cccccc !important;
        }
    </style>
</head>
<body>
    

    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row text-light align-items-center">
                <!-- About Section -->
                <div class="col-md-6">
                    <h6>About Us</h6>
                    <p class="text-muted mb-0" style="font-size: 0.8rem;">
                        Emer ID helps you efficiently manage content and boost productivity.
                    </p>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6 text-end">
                    <form action="#" method="POST" class="d-flex justify-content-end">
                        <input type="email" class="form-control form-control-sm me-2" name="email" placeholder="Email" required style="max-width: 150px;">
                        <input type="text" class="form-control form-control-sm me-2" name="message" placeholder="Message" required style="max-width: 150px;">
                        <button type="submit" class="btn btn-primary btn-sm">Send</button>
                    </form>
                </div>
            </div>

            <div class="text-center mt-2">
                <p class="text-muted mb-0" style="font-size: 0.75rem;">&copy; 2025 Emer ID. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
