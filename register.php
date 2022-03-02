<?php
$errors = [];

if(isset($_POST["signup"])){
    print_r($_POST);
    if(!isset($_POST["firstname"]))
        $errors["firstname"] = "Firstname must be filled.";
    if(!isset($_POST["lastname"]))
        $errors["lastname"] = "lastname must be filled.";
    if(!isset($_POST["username"]))
        $errors["username"] = "username must be filled.";
    if(!isset($_POST["email"]))
        $errors["email"] = "email must be filled.";

    if(!isset($_POST["contact"]))
        $errors["contact"] = "contact must be filled.";

    if(!isset($_POST["password"]))
        $errors["password"] = "password must be filled.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Mart Anthony Salazar</title>
</head>

<body>
    <div id="root">
        <form action="register.php" method="POST">
            <span id="icon">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
            </span>
            <div class="two-cols">
                <div class='field'>
                    <span class="iconify" data-icon="ant-design:user-outlined"></span>
                    <input type='text' name="firstname" placeholder='First name' />
                    <?php if(isset($errors["firstname"])) echo "<div class='error'>".$errors["firstname"]."</div>" ?>
                </div>
                <div class='field'>
                    <span class="iconify" data-icon="ant-design:user-outlined"></span>
                    <input type='text' name="lasttname" placeholder='Last name' />
                    <?php if(isset($errors["lastname"])) echo "<div class='error'>".$errors["lastname"]."</div>" ?>
                </div>
            </div>

            <div class='field'>
                <span class="iconify" data-icon="carbon:user-admin"></span>
                <input type='text' name="username" placeholder='Username' />
                <?php if(isset($errors["username"])) echo "<div class='error'>".$errors["username"]."</div>" ?>
            </div>

            <div class="two-cols">
                <!-- Email -->
            <div class='field'>
                <span class="iconify" data-icon="dashicons:email"></span>
                <input type='text' name="email" placeholder='Email' />
                <?php if(isset($errors["email"])) echo "<div class='error'>".$errors["email"]."</div>" ?>
            </div>
                <!-- Contact Number -->
            <div class='field'>
                <span class="iconify" data-icon="akar-icons:phone"></span>
                <input type='text' name="contact" placeholder='Contact Number' />
                <?php if(isset($errors["contact"])) echo "<div class='error'>".$errors["contact"]."</div>" ?>
            </div>
            </div>

            <div class='field'>
                <span class="iconify" data-icon="feather:lock"></span>
                <input type='password' name="password" placeholder='Password' />
                <?php if(isset($errors["password"])) echo "<div class='error'>".$errors["password"]."</div>" ?>
            </div>
            <input type="submit" name="signup" value="Signup"/>
            <h4>Already have an account? <span>Login</span>
                <h4>
        </form>
    </div>
    <img id='right' src="./assets/flat.svg" alt="asd">
    <img id='circle-1' src="./assets/circle1.svg" alt="">
    <img id='circle-2' src="./assets/circle2.svg" alt="">
    <img id='circle-2' src="./assets/circle3.svg" alt="">



    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>