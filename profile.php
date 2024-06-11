<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style_profle.css">
    <link rel="stylesheet" type="text/css" href="style/style_NavBar.css">
    <link rel="stylesheet" type="text/css" href="style/style_footer_profile.css">
    <link rel="icon" type="image/X-icon" href="images/logo/Secondary Logo.png">
    <title>Profile - LaFamiliar.com</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <?php
    if(isset($_SESSION['user_id'])){
        $index = $_SESSION['user_id'];
    ?>

    <?php
    require "config.php";
    
    $sql1 = "SELECT * FROM user WHERE id = '$index'";
    $result1 = $conn->query($sql1);

    $result2 = $result1 -> fetch_assoc();
    ?>

    

    <br>
    <div class="body_container">
        <div class="outer_container">
            <h1 id="h1">User Profile</h1>
            <div class="container">
                <div class="left_div">
                    <h3>Hello !</h3>
                    <h1><?php echo $result2["first_name"] ?></h1>
                    <h4>Welcome to LaFamiliar!</h4>
                    <br>
                    <button onclick="window.location='myOrders.php'" class="myOrders_btn">My Orders</button>     
                </div>
                <div class="right_div">
                    <div class="personal_details">
                        <h2>Personal Details</h2>
                        <div class="personal_data">
                            <form action="updateAndDeleteProfile.php" method="post">

                                <?php if(isset($_GET['update'])) {?>
                                    <p class="update"><?php echo $_GET['update'] ?></p>
                                <?php }?>

                                <div class="shower_name">
                                    <div class="shower_div">

                                        <label for="">First name</label>
                                        <br>
                                        <div class="shower">
                                            <input type="text" name="fname" id="" value="<?php echo $result2["first_name"] ?>">
                                        </div>
                                    </div>
                                    <div class="shower_div">

                                        <label for="">Last name</label>
                                        <br>
                                        <div class="shower">
                                            <input type="text" name="lname" id="" value="<?php echo $result2["last_name"] ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <label for="">Email</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="email" id="" value="<?php echo $result2["email"] ?>" readonly>
                                </div>

                                <label for="">Address</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="address" id="" value="<?php echo $result2["address"] ?>">
                                </div>
                                
                                <label for="">Phone Number</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="phonenumber" id="" value="<?php echo $result2["phone"] ?>">
                                </div>
                                
                                <label for="">Password</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="password" id="" value="<?php echo $result2["password"] ?>">
                                </div>

                                <div> 
                                    <input type="text" name="id" id="id" value="<?php echo $index ?>" hidden>
                                </div>

                                <br>
                                <input type="submit" value="update Profile" class="btn_type1"  name="updateprofile">
                                <input type="submit" value="Delete Account" class="btn_type1" name="deleteaccount">
                            
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <br>

    <?php include 'footer.php'; ?>
    

</body>
</html>

<?php
}else{
    header("Location:login.php?not logged");
    exit();
}
?>