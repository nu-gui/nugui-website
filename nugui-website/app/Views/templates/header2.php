<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NU GUI - Innovative business solutions">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/nugui-icon-white.png'); ?>"> <!-- Added favicon link -->
    <meta name="csrf-token" content="<?= csrf_hash() ?>"> <!-- Add CSRF token in meta tag -->
    <title>NU GUI - <?= $this->renderSection('title') ?></title>
    <style>
        /* Basic Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background: #333;
            color: #fff;
        }

        .logo img {
            width: 100px;
        }

        .nav-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .cta-buttons img {
            width: 30px;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-toggle span {
            height: 3px;
            width: 25px;
            background: #fff;
            margin: 4px;
            border-radius: 3px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-links ul {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #333;
                position: absolute;
                top: 60px;
                left: 0;
            }

            .nav-links li {
                text-align: center;
                margin: 10px 0;
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }
        }

        .fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: #333;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <header class="fixed-header">
        <div class="header-content">
            <div class="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/nugui-logo-secondary.png'); ?>" alt="NU GUI Logo"></a>
            </div>
            <nav class="nav-links">
                <ul>
                    <li><a href="<?php echo base_url('/home'); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('/about'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('/solutions'); ?>">Solutions</a></li>
                    <li><a href="<?php echo base_url('/partner-program'); ?>">Partner Program</a></li>
                    <li><a href="<?php echo base_url('/contact'); ?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url('/support'); ?>">Support</a></li>
                </ul>
            </nav>
            <div class="cta-buttons">
                <a href="https://wa.me/message/TGGYMYT6YAI5O1" target="_blank" class="whatsapp-button"><img src="<?php echo base_url('assets/images/whatsapp-icon.png'); ?>" alt="WhatsApp Business"></a>
            </div>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const menuToggle = document.querySelector(".menu-toggle");
            const navLinks = document.querySelector(".nav-links ul");

            menuToggle.addEventListener("click", () => {
                navLinks.classList.toggle("active");
            });
        });
    </script>
</body>
</html>
