<?php
include "../db.php";

if(isset($_SESSION['firstname'])){
    header('location:../view.php');
}

$msg = '';

// THIS ONE IS FOR SIGNUP
if(isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $regNo = mysqli_real_escape_string($conn, $_POST['regno']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $password = mysqli_real_escape_string($conn, password_hash(strtolower($_POST['pass']), PASSWORD_BCRYPT, [12]));
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $query = "INSERT INTO members (firstname, lastname, webmail, regnumber, level, password, DOB, gender, is_admin, status) VALUES('$firstname','$lastname','$email', '$regNo','$level','$password', '$DOB', '$gender', 0, 0)";

    $result = mysqli_query($conn, $query);

    if($result){
        header('location:../view.php');
    }else{
        $msg .= "<p class='sign_error'>Something went wrong, either webmail or regnumber has been taken</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tabernacle of Psalms attendance portal and official website">
    <meta name="keywords" content="landmark university, lmu choir, tabernacle of psalms, terbanacle lmu">
    <meta name="author" content="Peejay">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Raleway">
    <title>Tabernacle of Psalms  | Signup</title>
</head>
<body>
<style>
    .btn{
    text-decoration: none;
    padding: 10px;
    color: #ccc;
    margin: 5px;
    display: block;
    width: 40px;
    font-family: Raleway;
}

body{
    background-size: cover;
}

.sign_error{
    padding: 10px;
    background: red;
    color: #fff;
    border-radius: 5px;
    text-align: center;
    width: 60%;
    margin: 0 auto;
}

@media(max-width: 500px){
    .sign_error{
        width: 90%;
    }
}
</style>

    <a href="../index.php" class="btn"><i class="fa fa-backward"></i></a>

    <header>
        <div class="container">
            <div class="main-header">
                <div>
                   <a href="signup.php"><img src="../img/logo.png"></a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="signupBox">
                <form action="signup.php" method="POST" onsubmit="return formValid()">
                <p><?= $msg ?></p>
                    <div class="details">
                        <div>
                            <p id="err1"></p>
                            <p>Firstname</p>
                            <input type="text" name="firstname" id="firstname" placeholder="Firstname..." required>
                        </div>

                        <div>
                            <p id="err2"></p>
                            <p>Lastname</p>
                            <input type="text" name="lastname" id="lastname" placeholder="Lastname..." required>
                        </div>

                        <div>
                            <p id="err3"></p>
                            <p>Email</p>
                            <input type="email" name="email" id="email" placeholder="Webmail..." required>
                        </div>

                        <div>
                            <p id="err4"></p>
                            <p>Reg number</p>
                            <input type="number" name="regno" id="regno" placeholder="Reg Number..." required>
                        </div>

                        <div>
                            <p id="err5"></p>
                            <p>Level</p>
                            <input type="number" name="level" id="level" placeholder="Level..." required>
                        </div>

                        <div>
                            <p id="err7"></p>
                            <p>Password</p>
                            <input type="password" name="pass" id="pass" placeholder="Password..." required>
                        </div>

                        <div>
                            <p id="err8"></p>
                            <p>Confirm Password</p>
                            <input type="password" name="conpass" id="conpass" placeholder="Confirm Password..." required>
                        </div>

                        <div>
                            <p id="err9"></p>
                            <p>Date of Birth</p>
                            <input type="date" name="DOB" id="DOB"  required>
                        </div>

                        <div>
                            <p id="err10"></p>
                            <p>Gender</p>
                            <select name="gender" id="gender" required>
                                <option value="gender" selected hidden>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>                        
                    </div>

                    <div class="btn-side">
                        <input type="submit" value="Sign Up" id="btnSubmit" name="submit">
                    </div>
                </form>
            </div>

             <div class="choice">
                        <p>Have an account? <a href="../login.php">Login</a></p>
                    </div>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; <?= date('Y') ?>, PEEJAY</p>
    </footer>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>

    <script>
        const password = document.getElementById('pass');
        const conPass = document.getElementById('conpass');

        function formValid(){
            if(conpass.value !== password.value){
                err8.innerHTML = 'Password do not match!';
                conpass.style.border = '1px solid red';
                setTimeout(() => {
                err8.innerHTML = '';
                conpass.style.border = '1px solid #ccc';
            }, 5000);
                return false;
            }

            if(password.value.length <= 6){
                err7.innerHTML = 'Password too short!';
                password.style.border = '1px solid red';
                setTimeout(() => {
                err7.innerHTML = '';
                password.style.border = '1px solid #ccc';
            }, 5000);
                return false;
            }


            else if(gender.value == 'gender'){
              err10.innerHTML = 'enter a valid gender';
              gender.style.border = '1px solid red';
              setTimeout(() => {
                err10.innerHTML = '';
                gender.style.border = '1px solid #ccc';
              }, 5000)
              return false;
            }
        }


        conpass.addEventListener('keyup', () => {
            if(conpass.value !== password.value){
                conpass.style.border = '1px solid red';
            }
            else{
                conpass.style.border = '1px solid green';
            }
        })

        password.addEventListener('keyup', () => {
            if(password.value.length <= 6){
                err7.innerHTML = 'Password too short!';
                password.style.border = '1px solid red';
            }
            else{
                err7.innerHTML = "";
                password.style.border = '1px solid #ccc';
            }
        })
        
    </script>
</body>
</html>