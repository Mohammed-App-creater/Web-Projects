<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1a1a1a, #2c3e50);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #e0e0e0;
        }

        .container {
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 72px;
            margin: 0;
            color: #e74c3c;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-size: 24px;
            margin: 10px 0;
            color: #bdc3c7;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
            color: #95a5a6;
        }

        .search-bar {
        margin: 20px 0;
    }

    .search-bar input {
        padding: 10px;
        font-size: 16px;
        border: 2px solid #34495e;
        border-radius: 25px;
        width: 70%;
        max-width: 300px;
        outline: none;
        background: #2c3e50;
        color: #e0e0e0;
        transition: border-color 0.3s;
    }

    .search-bar input:focus {
        border-color: #e74c3c;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        font-size: 16px;
        color: #fff;
        background-color: #e74c3c;
        text-decoration: none;
        border-radius: 25px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #c0392b;
    }

    .astronaut {
        width: 150px;
        margin: 20px auto;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }


        @media (max-width: 600px) {
            h1 { font-size: 48px; }
            h2 { font-size: 20px; }
            .container { padding: 15px; }
        }
    </style>
</head>


<body>
<div class="container">
    <h1>404</h1>
    <h2>Oops! Lost in Space?</h2>
    <p>The page you're looking for has vanished into a black hole or doesn't exist. Let's get you back on track!</p>

    <!-- Astronaut Image (You can replace with your own image or use an SVG) -->
    <img src="../assets/Astronomer.png" alt="Astronaut" class="astronaut">

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search for something else...">
    </div>

    <!-- Navigation Links -->
    <a href="/" class="btn">Back to Home</a>
    <a href="/contact" class="btn">Contact Us</a>
</div>

<script>
    // Optional: Add functionality to the search bar
    document.querySelector('.search-bar input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const query = e.target.value.trim();
            if (query) {
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        }
    });
</script>

</body>
</html>