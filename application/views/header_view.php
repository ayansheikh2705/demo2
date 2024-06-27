<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreLoader</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #444; /* Dark grey background */
            color: #fff;
            padding: 20px 25px; /* Added padding */
            text-align: left;
        }

        .logo {
            display: inline-block;
            vertical-align: middle;
            margin-right: 20px; /* Added margin */
        }

        .logo img {
            height: 40px;
            vertical-align: middle;
        }

        .logo h1 {
            display: inline;
            margin-left: 10px;
            font-size: 24px;
        }

        nav {
            margin-top: 0px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: right;
        }

        nav ul li {
            display: inline-block;
            margin-left: 20px;
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?php echo base_url('assets/images/services-logo.png'); ?>" alt="Company Logo">
            <h1>Estimatewala</h1>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('home/service'); ?>">Services</a></li>
                <li><a href="<?php echo site_url('home/sales'); ?>">Sales</a></li>
                <li><a href="<?php echo site_url('home/about_us'); ?>">About Us</a></li>
                <li><a href="<?php echo site_url('get_quote_controller/index'); ?>">Get Quote</a></li>
                <li><a href="<?php echo site_url('home/contact_us'); ?>">Contact Us</a></li>
                <li><a href="<?php echo base_url('tempex/NOC-user-manual-Department.pdf'); ?>" target="_blank">Terms and Conditions</a></li>

                <!-- Add more links as needed -->
            </ul>
        </nav>
    </header>
</body>
</html>
