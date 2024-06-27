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

        footer {
            background-color: #444; /* Dark grey background */
            color: #fff;
            padding: 20px 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .footer-left {
            text-align: left;
            margin-right: auto;
        }

        .footer-right {
            text-align: right;
            margin-left: auto;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            display: inline;
        }

        .footer-links {
            list-style: none;
            padding: 20;
            margin: 0;
            margin-top: 10px; /* Adjust vertical spacing */
        }

        .footer-links li {
            display: block;
            margin-bottom: 10px; /* Adjust vertical spacing */
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-info img {
            height: 20px;
            margin-right: 5px;
        }

        .social-media {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 10px; /* Adjust vertical spacing */
        }

        .social-media li {
            display: inline;
            margin-right: 10px;
        }

        .social-media li:last-child {
            margin-right: 0;
        }

        .social-media img {
            height: 25px;
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-top">
            <div class="footer-left">
                <div class="logo">
                    <img src="<?php echo base_url('assets/images/services-logo.png'); ?>" alt="Company Logo">
                    <h1>Estimatewala</h1>
                </div>
                <ul class="footer-links">
                    <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('home/service'); ?>">Services</a></li>
                    <li><a href="<?php echo site_url('home/sales'); ?>">Sales</a></li>
                    <li><a href="<?php echo site_url('home/about_us'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('get_quote_controller/index'); ?>">Get Quote</a></li>
                    <li><a href="<?php echo site_url('home/contact_us'); ?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url('tempex/NOC-user-manual-Department.pdf'); ?>" target="_blank">Terms and Conditions</a></li>
                    
                    <!-- Add more links as needed -->
                </ul>
            </div>
            <div class="footer-right">
                <div class="contact-info">
                    <img src="<?php echo base_url('assets/images/contact-logo.png'); ?>" alt="Contact Symbol">
                    <span>Contact: +1234567890</span>
                </div>
                <div>
                    <!-- Add your map here -->
                    <iframe src="https://www.google.com/maps/place/ICAD,+KHAMLA/@21.1051458,79.0581074,19z/data=!4m6!3m5!1s0x3bd4bf43eb34df8d:0x84c885b1c17ddb4!8m2!3d21.1053165!4d79.0583069!16s%2Fg%2F11t46s70k9?entry=ttu" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <ul class="social-media">
            <li><a href="#"><img src="<?php echo base_url('assets/images/instagram-logo.png'); ?>" alt="Instagram"></a></li>
            <li><a href="#"><img src="<?php echo base_url('assets/images/facebook-logo.png'); ?>" alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo base_url('assets/images/twitter-logo.png'); ?>" alt="Twitter"></a></li>
            <li><a href="#"><img src="<?php echo base_url('assets/images/whatsapp-logo.png'); ?>" alt="whatsapp"></a></li>
            <!-- Add more social media links as needed -->
        </ul>
    </footer>
</body>
</html>
