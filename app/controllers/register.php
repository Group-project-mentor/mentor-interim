<?php
class Register extends Controller
{
    public function index()
    {
        $this->view("auth/register");
    }

    public function verify_register()
    {
        if (isset($_POST["register"])) {
            $email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/";
            $name_pattern = "/[A-Za-z0-9]+/";

            $email = trim($_POST["email"]);
            $password = $_POST["passwd"];
            $name = $_POST["name"];

            $result = null;

            if (preg_match($email_pattern, $email) and preg_match($name_pattern, $name && $password == $_POST["cpasswd"])) {
                $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

                if ($this->model("userModel")->registration($email, $name, $hash)) {
                    echo "Registration successful !";
                    // header("location:login.php?success=Sccessfully Registered");
                    header("location:" . BASEURL . "login");
                } else {
                    echo "Registration unsuccessful !";
                    // header("location:register.php?error=Can't add the user");
                    header("location:" . BASEURL . "register");
                }
            } else {
                echo "Invalid Data !";
                header("location:" . BASEURL . "register");
                // header("location:register.php?error=Invalid Data");
            }
        } else {
            header("location:" . BASEURL . "register");
        }

    }
}