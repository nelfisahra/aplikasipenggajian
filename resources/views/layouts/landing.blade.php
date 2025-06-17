<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International School Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
        }

        /* Header Section */
        header {
            background-image: url('https://img.freepik.com/free-photo/blurred-background-school-corridor_1150-10658.jpg'); /* Sample Background Image */
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }

        header h1 {
            font-size: 50px;
            margin-bottom: 10px;
        }

        header p {
            font-size: 20px;
        }

        /* Main Content Section */
        .main-content {
            display: flex;
            justify-content: space-around;
            padding: 60px 20px;
            background-color: white;
        }

        .main-content .info, .main-content .form {
            width: 45%;
        }

        .info h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .info p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        /* Form Styles */
        .form h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        .form input, .form textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #45a049;
        }

        /* Footer Section */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer p {
            font-size: 16px;
        }

    </style>
</head>
<body>

    <header>
        <h1>International School</h1>
        <p>Providing Quality Education Worldwide</p>
    </header>

    <div class="main-content">
        <div class="info">
            <h2>Welcome to Our School</h2>
            <p>We believe in a holistic approach to education, providing students with the skills they need for success in the modern world. Our international school offers a range of programs and extracurricular activities to help students develop both academically and personally.</p>
            <p>Explore our curriculum, learn about our highly qualified staff, and see how we foster an environment of excellence.</p>
        </div>
        <div class="form">
            <h2>Contact Us</h2>
            <form action="#">
                <input type="text" placeho
