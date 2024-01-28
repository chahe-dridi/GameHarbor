<?php
// Include the database connection file
include 'connect.php';

// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}


 
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameHarbor</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../register.css">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header">

    <div class="header-top">
      <div class="container">

        <div class="countdown-text">
          Exclusive Black Friday ! Offer <span class="span skewBg">10</span> Days
        </div>

        <div class="social-wrapper">

          <p class="social-title">Follow us on :</p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="header-bottom skewBg" data-header>
      <div class="container">

        <a href="agent.php" class="logo">GameHarbor</a>

        <nav class="navbar" data-navbar>
          <ul class="navbar-list">
         
          <li class="navbar-item">
                 <a href="admin.php" class="navbar-link skewBg" data-nav-link>admin</a>
          </li>

          <li class="navbar-item">
                 <a href="logout.php" class="navbar-link skewBg" data-nav-link>Log out</a>
            </li>
          
            
          </ul>
        </nav>

        <div class="header-actions">

          <button class="cart-btn" aria-label="cart">
            <ion-icon name="cart"></ion-icon>

            <span class="cart-badge">0</span>
          </button>

          <a href="#" aria-label="cart"  class="cart-btn"   >
      <img src="../assets/images/rsz1_coin.png"   >
            <span class="cart-badge">1</span>
      </a>



          <button class="search-btn" aria-label="open search" data-search-toggler>
            <ion-icon name="search-outline"></ion-icon>
          </button>

          <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" class="menu"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
          </button>

        </div>

      </div>
    </div>

  </header>





  <!-- 
    - #SEARCH BOX
  -->

  <div class="search-container" data-search-box>

    <div class="input-wrapper">
      <input type="search" name="search" aria-label="search" placeholder="Search here..." class="search-field">

      <button class="search-submit" aria-label="submit search" data-search-toggler>
        <ion-icon name="search-outline"></ion-icon>
      </button>

      <button class="search-close" aria-label="close search" data-search-toggler></button>
    </div>

  </div>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="home"
        style="background-image: url('../assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">World Gaming</p>

            <h1 class="h1 hero-title">
              Earn <span class="span">Trade & Buy </span> Games
            </h1>

            <p class="hero-text">
              No need for real money to own your favorite games.
            </p>

            <button class="btn skewBg">Read More</button>

          </div>

          <figure class="hero-banner img-holder" style="--width: 700; --height: 700;">
            <img src="../assets/images/hero-banner.png" width="700" height="700" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #BRAND
      -->
 


      <section class="account-balance-section">
    
    <div id="account-balance"></div>
 




      <!-- 
        - #FEATURED GAME
      -->

    




      <!-- 
        - #SHOP
      -->

       



      <!-- 
        - #BLOG
      -->
 

  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="../assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>




  <section class="section blog" id="blog" aria-label="blog">
        <div class="container">

          <h2 class="h2 section-title">
            add your <span class="span">Games</span>
          </h2>

          <p class="section-text">
            
       </p>

          <ul class="blog-list">

          <form method="post" action="add_G.php" enctype="multipart/form-data">
    <div class="input-group">
        <label for="game_name">Game Name:</label>
        <input type="text" id="game_name" name="game_name" placeholder="Enter your Game Name" required>
    </div>

    <div class="input-group">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" placeholder="Enter your description" required>
    </div>

    <div class="input-group">
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" placeholder="Enter your genre" required>
    </div>

   

    <div class="input-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="Enter your price" required>
    </div>

    <div class="input-group">
        <label for="picture">picture:</label>
        <input type="text" id="picture" name="picture" placeholder="Enter your picture" required>
    </div>

    


    <div class="input-group">
        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture" accept="image/*" capture="environment">
        <!-- The 'capture="environment"' attribute is used to activate the device camera -->
    </div>
    <!-- Button to trigger taking a photo -->
    

    <!-- Update button type to submit -->
    <button class="signup-btn" type="submit">Add Game</button>




            </section>




</body>

</html>