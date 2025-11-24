<?php
//error checking
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";

//form validation
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//form required
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $name=$_POST['name'] ?? '';
    $email=$_POST['email'] ?? '';
    $subject=$_POST['subject'] ?? '';
    $message=$_POST['message'] ?? '';

    //check if name has been entered
    if(empty($_POST['name'])){
        $nameErr = 'PLEASE ENTER YOUR NAME!';
    } else{
        $name = test_input($name);
    }

    //check if email has been entered and is valid
    if(empty($_POST['email'])){
        $emailErr = 'PLEASE ENTER YOUR EMAIL ADRESS!';
    } else{
        $email = test_input($email);
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = 'INVALID EMAIL FORMAT!';
    }
    }

    //check if subject has been entered
    if(empty($_POST['subject'])){
        $subjectErr = "PLEASE ENTER A SUBJECT!";
    } else{
        $subject = test_input($subject);
    }

    //check if message has been entered
    if(empty($_POST['message'])){
        $messageErr = "PLEASE ENTER A MESSAGE!";
    } else{
        $message = test_input($message);
    }

    //if no errors submit
        if($_SERVER["REQUEST_METHOD"] == 'POST'  && empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)){
        echo "welcome, $name!";
        
        //mysql database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mysqldb";

        //connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        //check connection
        if($conn->connect_error){
        die("connection failed:" . $conn->connect_error);
        }

        //query
        $stmt = $conn->prepare("INSERT INTO persons(name, email, subject, message) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        //execute and check result
        if($stmt->execute()){
        echo "<p>saved successfully</p>";
        }else{
        echo "<P>error:" . $stmt->error . "</p>";
        }
        $stmt->close();
        $conn->close();
      }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>university website</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/fe47a7cf32.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="containerpage">
        <nav>
            <a href="index.html"></a>
            <div class="nav-linkspage">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="course.html">Course</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </section> 
<section class="container2page">
    <div class="textboxpage">
        <h1>Contact us</h1>
    </div>

    <!--contact us content-->
</section>
<section class="contact">
    <div class="contact-div">
      <div class="contact-div1">
        <div>
          <i class="fa fa-home"></i>
          <span>
            <h5>XYZ Road, ABC Building</h5>
            <p>USA, chicago</p>
          </span>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <span>
            <h5>+1 0123456789</h5>
            <p>Monday to Wednesday, 730am-6pm</p>
          </span>
        </div>
        <div>
          <i class="fa fa-envelope-o"></i>
          <span>
            <h5>info@abcXYZ.edu</h5>
            <p>Email us your query</p>
          </span>
        </div>
      </div>
      <div class="contact-div1">
        <form method="post" action="contact.php">
          <label for="name">NAME:</label>
          <input type="text" name="name" placeholder="Enter your name" value ="<?php echo $name;?>">
          <?php echo $nameErr;?><br><br>

          <label for="email">EMAIL:</label>
          <input type="email" name="email" placeholder="Enter email address" value ="<?php echo $email;?>">
          <?php echo $emailErr;?><br><br>

          <label for="subject">SUBJECT:</label>
          <input type="text" name="subject" placeholder="Enter your Subject" value ="<?php echo $subject;?>">
          <?php echo $subjectErr;?><br><br>
          
          <textarea rows="8" name="message" placeholder="Message"></textarea>
          <?php echo $messageErr;?><br><br>

          <button type="submit" class="hero-btn red-btn">SUBMIT</button>
        </form>
      </div>
    </div>
  </section>
  <section class="footer3">
    <h1>About Us</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur placeat quas unde blanditiis nihil laboriosam consectetur fuga perferendis <br> excepturi eum necessitatibus et praesentium sit modi labore voluptates assumenda, minus qui?</p>
    <div class="icons2">
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-linkedin"></i>
    </div>
    <p>Made by Fortune Koome</p>
</section>   
</body>
</html>