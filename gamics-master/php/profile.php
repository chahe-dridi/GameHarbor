<?php
// Include the database connection file
include 'connect.php';

// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['client_id'])) {
    header("Location: login.php");
    exit();
}

// Function to get user data by ID
function getUserDataById($client_id, $conn) {
    // Perform a query to get user data based on the client_id
    $sql = "SELECT client_id, client_name, email, country FROM clients WHERE client_id = $client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Get user data
$userData = getUserDataById($_SESSION['client_id'], $conn);
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

        <a href="client.php" class="logo">GameHarbor</a>

        <nav class="navbar" data-navbar>
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="client.php" class="navbar-link skewBg" data-nav-link>Home</a>
            </li>

            <li class="navbar-item">
              <a href="#live" class="navbar-link skewBg" data-nav-link>Live</a>
            </li>

            <li class="navbar-item">
              <a href="#features" class="navbar-link skewBg" data-nav-link>Features</a>
            </li>

            <li class="navbar-item">
              <a href="#shop" class="navbar-link skewBg" data-nav-link>Shop</a>
            </li>

            <li class="navbar-item">
              <a href="#blog" class="navbar-link skewBg" data-nav-link>Blog</a>
            </li>

            <li class="navbar-item">
              <a href="#contact" class="navbar-link skewBg" data-nav-link>Contact</a>
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
 



     
      <form method="post" action="update_profile.php">
    <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your new username" value="<?php echo $userData['client_name']; ?>" required>
    </div>

    <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your new email" value="<?php echo $userData['email']; ?>" required>
    </div>

    <div class="input-group">
        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="" disabled>Select your new country</option>
            <!-- Populate the country dropdown with fetched data -->
            <?php
            $selectedCountry = $userData['country'];
            // Fetch countries from an API (example: Restcountries API)
            $countriesApiUrl = 'https://restcountries.com/v2/all';
            $countriesData = json_decode(file_get_contents($countriesApiUrl), true);

            foreach ($countriesData as $country) {
                $optionValue = $country['name'];
                $selected = ($optionValue == $selectedCountry) ? 'selected' : '';
                echo "<option value=\"$optionValue\" $selected>$optionValue</option>";
            }
            ?>
        </select>
    </div>

    <!-- You can choose to omit the password fields if not updating the password -->
    <div class="input-group">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your new password">
    </div>

    <div class="input-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
    </div>

    <!-- Update button type to submit -->
    <button class="signup-btn" type="submit">Update Profile</button>
</form>





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

</body>

</html>