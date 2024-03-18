<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Oman Art</title>
</head>
<body>
    <section class="main">
    <header>
        <nav>
            <div class="menu"> <a href="dashboard.php">Home</a> </div>
            
            <div class="menu"><a href="filter.php">Filter</a></div>
            <div class="menu"><a href="chatbox.php">Chat</a></div>
            <div class="title">ART Oman</div>
           <?php 
           $userid = $_SESSION["userid"];
           ?>
            <div class="menu"> <a href="viewArt.php">Sell</a></div>
            <div class="menu"><a href="../index.php">Logout </a> </div>
        </nav>
    </header>