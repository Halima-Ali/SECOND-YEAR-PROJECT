<?php
// to acess session variable
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="property.css"> -->
 <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
 <title>Document</title>
</head>
<body>

<div class="header">
<nav>
  <h3 class="logo">Real <span class="orange">Estate</span></h3>
  <ul class="nav-links">
    <li><a href="#header">Home</a></li>
    <li><a href="#services">Our Services</a></li>
    <li><a href="#properties">Properties</a></li>
    <li><a href="#agents">Agents</a></li>
    <li><a href="#calculators">Calculators</a></li>
    <li><a href="#contacts">Contacts</a></li> 
    <?php
    //how to add session variables
  if(isset($_SESSION['userUid'])){
    echo '<span class="username"> Hi,'.$_SESSION['userUid'].'</span>';
  } 
  ?>
  </ul>  
  <?php
  //is the user logged in?
  if(isset($_SESSION['userUid'])){
    echo '<a href="includes/logout.inc.php" class="register-btn">Log out</a>';
  } else{
    echo '<a href="signup.php" class="register-btn">Register now</a>';
  }
  ?>
  
</nav>

<div class="container">
  <h1>Find your next place</h1>
  <div class="search-bar">
    <form>
      <div class="location-input"><label>Location</label>
      <input type="text" placeholder="Enter a Location">
      </div>    
    <button type="submit"><img src="images\search.png" alt="search button"></button>
    </form>
  </div>
</div>
</div>

<!-- our Services -->
<section class="services" id="services">

  <h1 class="heading"> Our <span>services</span> </h1>

  <div class="box-container">

    <div class="box">
      <img src="images/s-1.png" alt="">
      <h3>Buy a Home</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam distinctio ipsa ab cum error quas fuga ad?
        Perspiciatis, autem officiis?</p>
      <a href="buy_properties.php" class="btn">Search homes</a>
    </div>

    <div class="box">
      <img src="images/s-2.png" alt="">
      <h3>Sell a Home</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam distinctio ipsa ab cum error quas fuga ad?
        Perspiciatis, autem officiis?</p>
      <a href="#" class="btn">See you options</a>
    </div>

    <div class="box">
      <img src="images/s-3.png" alt="">
      <h3>Rent a home</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam distinctio ipsa ab cum error quas fuga ad?
        Perspiciatis, autem officiis?</p>
      <a href="rent_properties.php" class="btn">Find Rentals</a>
    </div>

  </div>

</section>

<!-- properties section -->
<section class="featured" id="featured">

    <h1 class="heading"> <span>featured</span> properties </h1>

    <div class="box-container">

        <div class="box">
            <div class="image-container">
                <img src="images\house-1.png" alt="">
                <div class="info">
                    <h3>for rent</h3>
                </div>
                <div class="icons">
                    <a href="#"><ion-icon name="image-outline"></ion-icon><h3>5</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#"><ion-icon name="mail-outline"></ion-icon></a>
                    <a href="#"><ion-icon name="call-outline"></ion-icon></a>
                </div>
                <div class="location">
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image-container">
                <img src="images/img-2.jpg" alt="">
                <div class="info">
                    <h3>6 days ago</h3>
                    <h3>for sell</h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>2</h3></a>
                    <a href="#" class="fas fa-camera"><h3>7</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3>modern apartments</h3>
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">request info</a>
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image-container">
                <img src="images/img-3.jpg" alt="">
                <div class="info">
                    <h3>1 days ago</h3>
                    <h3>for rent</h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>1</h3></a>
                    <a href="#" class="fas fa-camera"><h3>6</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3>modern apartments</h3>
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">request info</a>
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image-container">
                <img src="images/img-4.jpg" alt="">
                <div class="info">
                    <h3>9 days ago</h3>
                    <h3>for rent</h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>2</h3></a>
                    <a href="#" class="fas fa-camera"><h3>6</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3>modern apartments</h3>
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">request info</a>
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image-container">
                <img src="images/img-5.jpg" alt="">
                <div class="info">
                    <h3>10 days ago</h3>
                    <h3>for sell</h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>3</h3></a>
                    <a href="#" class="fas fa-camera"><h3>8</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3>modern apartments</h3>
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">request info</a>
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image-container">
                <img src="images/img-6.jpg" alt="">
                <div class="info">
                    <h3>3 days ago</h3>
                    <h3>for sell</h3>
                </div>
                <div class="icons">
                    <a href="#" class="fas fa-film"><h3>1</h3></a>
                    <a href="#" class="fas fa-camera"><h3>4</h3></a>
                </div>
            </div>
            <div class="content">
                <div class="price">
                    <h3>$25,000/mo</h3>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                </div>
                <div class="location">
                    <h3>modern apartments</h3>
                    <p>jogeshwari west, mumbai, india - 400104</p>
                </div>
                <div class="details">
                    <h3> <i class="fas fa-expand"></i> 3500 sqft </h3>
                    <h3> <i class="fas fa-bed"></i> 3 beds </h3>
                    <h3> <i class="fas fa-bath"></i> 2 baths </h3>
                </div>
                <div class="buttons">
                    <a href="#" class="btn">request info</a>
                    <a href="#" class="btn">view details</a>
                </div>
            </div>
        </div>

    </div>
    
</section>

<!-- agents section -->
<section class="agents" id="agents">
  <div class="title">
    <h1 class="heading"> Featured <span>Agents</span></h1>
    <a href="agentsdisplay.php">See all></a>
  </div>
  <div class="box-container">

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-1.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-2.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-3.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <a href="#" class="fas fa-envelope"></a>
            <a href="#" class="fas fa-phone"></a>
            <img src="images/pic-4.png" alt="">
            <h3>john deo</h3>
            <span>agent</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

</section>

<!-- calculator section -->
<section class="calculators" id="calculators">
  <h1 class="heading"> Financial <span> calculators</span></h1>
  <div class="calculator">
    <div class="calculatorleft">
      <img src="images\pexels-tima-miroshnichenko-6694916.jpg" alt="">
    </div>
    <div class="calculatorright">
      <p><ion-icon name="checkmark-circle-outline"></ion-icon>Calculate your mortagage payments with ease</p>
      <p><ion-icon name="checkmark-circle-outline"></ion-icon>See an amortization payments</p>
      <p><ion-icon name="checkmark-circle-outline"></ion-icon>Plan your payments in advance</p>

      <a href="FINANCE CALCULATORS\mortgagecalc.html">Mortage Calculator</a>
      <br>
      <a href="FINANCE CALCULATORS\armortization.html">Armortization Calculator</a>

    </div>
  </div>

</section>

<!-- contact us section -->

<section class="contacts" id="contacts">
  <h1 class="heading"> Contact <span>us</span></h1>

  <div class="contactconatiner">
    <h1>Connect with Us</h1>
    <p>We love to respond to your queries and help you achieve your dreams. <br> Feel free to get in otuch with us.</p>

    <div class="contact-box">
      <div class="contactleft">
        <h3>Send your request</h3>
        <form action="https://formspree.io/f/xrgjyokg" method="POST">
          <div class="input-row">
            <div class="input-group">
              <label>Name</label>
              <input type="text" name="name" placeholder="Halima Ali">
            </div>

            <div class="input-group">
              <label>Phone </label>
              <input type="text" name="phone" placeholder="+2547 1234 12323">
            </div>          
          </div>

                    <div class="input-row">
                      <div class="input-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="test@gmail.com">
                      </div>
                    
                      <div class="input-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Product Demo">
                      </div>
                    </div>

            <label>Message</label>
            <textarea rows="5" name="message" placeholder="Your message"></textarea>
            <button type="submit">SEND</button>
        </form>
      </div>
      <div class="contactright">
        <h3>Reach Us</h3>

        <table>
          <tr>
            <td>Email</td>
            <td>halimaaliwario.haw@students.uonbi.ac.ke</td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>+254792785777</td>
          </tr>
          <tr>
            <td>Address</td>
            
            <td>+222 Ground floor, lakeside street <br>
              near Avenue street <br>
              across tearoom street <br>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- footer section -->
 
  <section class="footer" id="footer">
  <div class="footer-container">
    <div class="box-container">

      <div class="box">
        <h3>Other Pages</h3>
        <a href="#">About us</a>
        <a href="#">FAQs</a>
        <a href="#">Articles</a>
        <?php
  //is the user logged in?
  if(isset($_SESSION['userUid'])){
    echo '<a href="neighbourhoodreview.php">Neighbourhood review page</a>';
  } 
  ?>      
      </div>

      <div class="box">
        <h3>Quick Links</h3>
        <a href="#header">Home</a>
        <a href="#services">Our Services</a>
        <a href="#properties">Properties</a>
        <a href="#agents">Agents</a>
        <a href="#calculators">Calculators</a>
        <a href="#contacts">Contacts</a>
      </div>

       <div class="box">
        <h3>Follow us</h3>
        <a href="#">facebook</a>
        <a href="#">Instagram</a>
        <a href="#">Twitter</a>
        <a href="#">Facebook</a>

      </div>
    </div>

    <div class="credit">Created by <span>Halima Ali Wario</span> | all rights reserved</div>
  </div>
  </section>
 <!-- ionicon script -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>