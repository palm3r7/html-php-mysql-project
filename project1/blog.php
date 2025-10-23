<?php
//error checking
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $email = $comment = "";
$nameErr = $emailErr = $commentErr = "";

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
    $comment=$_POST['comment'] ?? '';

    //check if name has been entered
    if(empty($_POST['name'])){
        $nameErr = 'PLEASE ENTER YOUR NAME!';
    } else{
        $name = test_input($name);
    }

    //check if email has been entered and is valid
    if(empty($_POST['email'])){
        $emailErr = 'PLEASE ENTER YOUR EMAIL ADDRESS!';
    } else{
        $email = test_input($email);
        
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = 'INVALID EMAIL FORMAT!';
    }
    }

    //check if comment has been entered
    if(empty($_POST['comment'])){
        $commentErr = 'PLEASE ENTER A COMMENT!';
    } else{
        $comment = test_input($comment);
    }

    //if no errors submit form
    if($_SERVER["REQUEST_METHOD"] == 'POST'  && empty($nameErr) && empty($emailErr) && empty($commentErr)){
        echo "welcome, $name!";        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
        <h1>Our certificate and online programs for 2024</h1>
    </div>
</section>

<!--blog content-->
<section class="containerblog">
    <div class="textboxblog">
        <div class="textbox2blog">
            <img src="graduant.jpeg" alt="">
            <h1>Our Certificate & Online Programs For 2024</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt recusandae qui dicta totam maiores eligendi? Earum repellat deserunt molestias vero ullam architecto corporis eos dicta <br> officia, ab, sed, veniam a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ea soluta mollitia optio expedita sapiente accusantium. Aliquid, magnam hic in distinctio officia <br> libero numquam, eaque est ipsa eveniet error laboriosam.</p> <br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt recusandae qui dicta totam maiores eligendi? Earum repellat deserunt molestias vero ullam architecto corporis eos dicta <br> officia, ab, sed, veniam a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ea soluta mollitia optio expedita sapiente accusantium. Aliquid, magnam hic in distinctio officia <br> libero numquam, eaque est ipsa eveniet error laboriosam.</p> <br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt recusandae qui dicta totam maiores eligendi? Earum repellat deserunt molestias vero ullam architecto corporis eos dicta <br> officia, ab, sed, veniam a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ea soluta mollitia optio expedita sapiente accusantium. Aliquid, magnam hic in distinctio officia <br> libero numquam, eaque est ipsa eveniet error laboriosam.</p> <br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt recusandae qui dicta totam maiores eligendi? Earum repellat deserunt molestias vero ullam architecto corporis eos dicta <br> officia, ab, sed, veniam a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ea soluta mollitia optio expedita sapiente accusantium. Aliquid, magnam hic in distinctio officia <br> libero numquam, eaque est ipsa eveniet error laboriosam.</p>
        </div>
        <div class="textbox3blog">
            <h3>Post Categories</h3>
            <div>
              <span>Business Analytics</span>
              <span>21</span>
            </div>
            <div>
              <span>Data Science</span>
              <span>28</span>
            </div>
            <div>
              <span>Machine Learning</span>
              <span>15</span>
            </div>
            <div>
              <span>Computer Science</span>
              <span>34</span>
            </div>
            <div>
              <span>AutoCAD</span>
              <span>42</span>
            </div>
            <div>
              <span>Journalism</span>
              <span>22</span>
            </div>
            <div>
              <span>Commerce</span>
              <span>30</span>
            </div>
        </div>
    </div>
    <div class="textbox4blog">
      <h1>Leave a Comment</h1>
        <form class="textbox-form" method="post" action="blog.php">
          <label for="name">NAME:</label>
          <input type="text" placeholder="Enter Name" name="name" value ="<?php echo $name;?>"><br><br>
          <?php echo $nameErr;?><br><br>

          <label for="email">EMAIL:</label>
          <input type="email" placeholder="Enter Email" name="email" value ="<?php echo $email;?>"><br><br>
          <?php echo $emailErr;?><br><br>

          <textarea rows="5" placeholder="Your Comment" name="comment"><?php echo $comment;?></textarea><br><br>
          <?php echo $commentErr;?><br><br>

          <button type="submit" class="hero-btn red-btn">SUBMIT</button>
        </form>
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