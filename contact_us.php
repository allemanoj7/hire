<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f0f0f0;
        }
        .contact-header {
            background-color: #2196F3;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .contact-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
        }
        .contact-section h2 {
            text-align: center;
            color: #333;
        }
        .contact-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .contact-info div {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .contact-info div:hover {
            background-color: #f9f9f9;
        }
        .contact-info i {
            background-color: #2196F3;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin-right: 20px;
        }
        .contact-info span {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <header class="contact-header">
        <h1>Contact Us</h1>
    </header>
    <section class="contact-section">
        <h2>Get in Touch</h2>
        <div class="contact-info">
            <div>
                <i class="fas fa-phone"></i>
                <span>+919110523307</span>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <span>allemanojkumar1@gmail.com</span>
            </div>
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <span>Shamshabad, Hyderabad - 501218, India</span>
            </div>
        </div>
    </section>
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
