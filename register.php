<?php
$errors = [];

if(isset($_POST["signup"])){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $address = $_POST["address"];
    $sex = $_POST["sex"];
    $birthplace = $_POST["birthplace"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $nationality = $_POST["nationality"];
    $religion = $_POST["religion"];
    $highschool = $_POST["highschool"];
    $college = $_POST["college"];
    $mother = $_POST["mother"];
    $father = $_POST["father"];
    $mOccupation = $_POST["mOccupation"];
    $fOccupation = $_POST["fOccupation"];

    if(!isset($fname) || $fname == null)
        $errors["firstname"] = "Firstname must be filled.";
    if(!isset($lname) || $lname == null)
        $errors["lastname"] = "Lastname must be filled.";
    if(!isset($address) || $address == null)
        $errors["address"] = "Address must be filled.";
    if(!isset($birthplace) || $birthplace == null)
        $errors["birthplace"] = "Birthplace must be filled.";
    if(!isset($nationality) || $nationality == null)
        $errors["nationality"] = "Nationality must be filled.";
    if(!isset($religion) || $religion == null)
        $errors["religion"] = "Religion must be filled.";
    if(!isset($highschool) || $highschool == null)
        $errors["highschool"] = "Highschool must be filled.";
    if(!isset($college) || $college == null)
        $errors["college"] = "College must be filled.";
    if(!isset($mother) || $mother == null)
        $errors["mother"] = "Mother's name must be filled.";
    if(!isset($father) || $father == null)
        $errors["father"] = "Father's name must be filled.";
    if(!isset($mOccupation) || $mOccupation == null)
        $errors["mOccupation"] = "Occupation must be filled.";
    if(!isset($fOccupation) || $fOccupation == null)
        $errors["fOccupation"] = "Occupation must be filled.";

    if(!isset($email) || $email == null)
        $errors["email"] = "Email must be filled.";
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        // email format is invalid
        $errors["email"] = "Invalid email format.";

    if(!isset($contact) || $contact == null)
        $errors["contact"] = "Contact must be filled.";
    else if(!preg_match("/^[0-9]{11}$/", $contact)) {
        // contact number is invalid - must be all numbers
        $errors["contact"] = "Contact must be 11-digits";
      }

    if(!isset($password) || $password == null)
        $errors["password"] = "Password must be filled.";
    else if(strlen($password) < 8)
        $errors["password"] = "Password must be atleast 8 characters.";
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
            
            <div class="two-cols gap-4">
                <div class="col-1">
                <h3>Personal details</h3>
                <div class="two-cols">
                    <div class='field'>
                        <span class="iconify" data-icon="ant-design:user-outlined"></span>
                        <input type='text' name="firstname" placeholder='First name' value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>"/>
                        <?php if(isset($errors["firstname"])) echo "<div class='error'>".$errors["firstname"]."</div>" ?>
                    </div>
                    <div class='field'>
                        <span class="iconify" data-icon="ant-design:user-outlined"></span>
                        <input type='text' name="lastname" placeholder='Last name' value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>"/>
                        <?php if(isset($errors["lastname"])) echo "<div class='error'>".$errors["lastname"]."</div>" ?>
                    </div>
                </div>

                <div class="two-cols">
                    <div class='field'>
                        <span class="iconify" data-icon="akar-icons:location"></span>
                        <input type='text' name="birthplace" placeholder='Birthplace' value="<?php echo isset($_POST["birthplace"]) ? $_POST["birthplace"] : ''; ?>"/>
                        <?php if(isset($errors["birthplace"])) echo "<div class='error'>".$errors["birthplace"]."</div>" ?>
                    </div>
                    <div class='field'>
                        <span class="iconify" data-icon="cil:birthday-cake"></span>
                        <input type='date' name="dob" placeholder='Date of Birth' value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>"/>
                        <?php if(isset($errors["dob"])) echo "<div class='error'>".$errors["dob"]."</div>" ?>
                    </div>
                </div>

                <div class="two-cols">
                    <div class='field'>
                    <span class="iconify" data-icon="el:home-alt"></span>
                        <input type='text' name="address" placeholder='Address' value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>"/>
                        <?php if(isset($errors["address"])) echo "<div class='error'>".$errors["address"]."</div>" ?>
                    </div>
                    <div class='field sex'>
                        <div class="sex-icon">
                            <div id="male-icon" class="shown">
                                <span class='iconify' data-icon='el:male'></span>
                            </div>
                            <div id="female-icon" class="hidden">
                                <span class='iconify' data-icon='el:female'></span>
                            </div>
                        </div>
                        <select name="sex" id="sex">
                            <option <?php if(isset($_POST["sex"]) && $_POST["sex"] == 'male') echo "selected"?> value="male">Male</option>
                            <option <?php if(isset($_POST["sex"]) && $_POST["sex"] == 'female') echo "selected"?> value="female">Female</option>
                        </select >
                        <?php if(isset($errors["sex"])) echo "<div class='error'>".$errors["sex"]."</div>" ?>
                    </div>
                </div>

                <div class="two-cols">
                    <!-- Email -->
                <div class='field'>
                    <span class="iconify" data-icon="dashicons:email"></span>
                    <input type='text' name="email" placeholder='Email' value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"/>
                    <?php if(isset($errors["email"])) echo "<div class='error'>".$errors["email"]."</div>" ?>
                </div>
                    <!-- Contact Number -->
                <div class='field'>
                    <span class="iconify" data-icon="akar-icons:phone"></span>
                    <input type='text' name="contact" placeholder='Contact Number' value="<?php echo isset($_POST["contact"]) ? $_POST["contact"] : ''; ?>"/>
                    <?php if(isset($errors["contact"])) echo "<div class='error'>".$errors["contact"]."</div>" ?>
                </div>
                </div>

                <div class="two-cols">
                    <div class='field'>
                        <span class="iconify" data-icon="clarity:flag-line"></span>
                        <input type='text' name="nationality" placeholder='Nationality' value="<?php echo isset($_POST["nationality"]) ? $_POST["nationality"] : ''; ?>"/>
                        <?php if(isset($errors["nationality"])) echo "<div class='error'>".$errors["nationality"]."</div>" ?>
                    </div>
                    <div class='field'>
                        <span class="iconify" data-icon="bx:church"></span>
                        <input type='text' name="religion" placeholder='Religion' value="<?php echo isset($_POST["religion"]) ? $_POST["religion"] : ''; ?>"/>
                        <?php if(isset($errors["religion"])) echo "<div class='error'>".$errors["religion"]."</div>" ?>
                    </div>
                </div>
            </div>

            <!-- Second column -->
            <div class="col-2">
                <!-- Education -->
                <h3>Education</h3>
                <div class='field'>
                    <span class="iconify" data-icon="akar-icons:book"></span>
                    <input type='text' name="highschool" placeholder='Highschool' value="<?php echo isset($_POST["highschool"]) ? $_POST["highschool"] : ''; ?>"/>
                    <?php if(isset($errors["highschool"])) echo "<div class='error'>".$errors["highschool"]."</div>" ?>
                </div>
                <div class='field'>
                    <span class="iconify" data-icon="maki:college"></span>
                    <input type='text' name="college" placeholder='College' value="<?php echo isset($_POST["college"]) ? $_POST["college"] : ''; ?>"/>
                    <?php if(isset($errors["college"])) echo "<div class='error'>".$errors["college"]."</div>" ?>
                </div>

                <h3 id="family-bg">Family Background</h3>
                <div class="two-cols">
                    <div class='field'>
                        <span class="iconify" data-icon="ic:sharp-girl"></span>
                        <input type='text' name="mother" placeholder="Mother's Name" value="<?php echo isset($_POST["mother"]) ? $_POST["mother"] : ''; ?>"/>
                        <?php if(isset($errors["mother"])) echo "<div class='error'>".$errors["mother"]."</div>" ?>
                    </div>
                    <div class='field'>
                        <span class="iconify" data-icon="ic:outline-work-outline"></span>
                        <input type='text' name="mOccupation" placeholder="Occupation" value="<?php echo isset($_POST["mOccupation"]) ? $_POST["mOccupation"] : ''; ?>"/>
                        <?php if(isset($errors["mOccupation"])) echo "<div class='error'>".$errors["mOccupation"]."</div>" ?>
                    </div>
                </div>
                <div class="two-cols">
                    <div class='field'>
                        <span class="iconify" data-icon="ic:twotone-boy"></span>
                        <input type='text' name="father" placeholder="Father's Name" value="<?php echo isset($_POST["father"]) ? $_POST["father"] : ''; ?>"/>
                        <?php if(isset($errors["father"])) echo "<div class='error'>".$errors["father"]."</div>" ?>
                    </div>
                    <div class='field'>
                        <span class="iconify" data-icon="ic:outline-work-outline"></span>
                        <input type='text' name="fOccupation" placeholder="Occupation" value="<?php echo isset($_POST["fOccupation"]) ? $_POST["fOccupation"] : ''; ?>"/>
                        <?php if(isset($errors["fOccupation"])) echo "<div class='error'>".$errors["fOccupation"]."</div>" ?>
                    </div>
                </div>
            </div>
        </div>


        <input type="submit" name="signup" value="Signup"/>
        <h4>Already have an account? <span>Login</span></h4>
        </form>
    </div>
    <img id='right' src="./assets/flat.svg" alt="asd">
    <img id='circle-1' src="./assets/circle1.svg" alt="">
    <img id='circle-2' src="./assets/circle2.svg" alt="">
    <img id='circle-2' src="./assets/circle3.svg" alt="">



    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        const sexInput = document.querySelector("#sex")
        const icon = document.querySelector('.sex-icon')
        const male = document.querySelector('#male-icon')
        const female = document.querySelector('#female-icon')
        const errors = document.querySelectorAll(".error")
        const identifySex = (sex) => {
            if(sex === 'male'){
                male.classList.remove("hidden")
                male.classList.add("shown")
                female.classList.remove("shown")
                female.classList.add("hidden")
            }else if(sex === 'female'){
                male.classList.remove("shown")
                male.classList.add("hidden")
                female.classList.remove("hidden")
                female.classList.add("shown")
            }
        }

        identifySex(<?php if(isset($_POST["sex"]))echo $_POST["sex"]?>)

        sexInput.addEventListener("change", (e) => {
           identifySex(e.target.value)
        })

        errors.forEach(err => {
            err.addEventListener('click', (e)=>{
                err.style.display = "none"
            })
        })
    </script>
</body>

</html>