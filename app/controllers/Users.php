<?php


class Users extends Controller {


    public function __construct() {

        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('Adminpanel');
        /*unset($_SESSION['edit_error']);
        unset($_SESSION['edit_error_start']);*/

    }

    public function register() {

        //Check if form is POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'                  => trim($_POST['name']),
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'confirm_password'      => trim($_POST['confirm_password']),
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];

            //Validate email
            if(empty($data['email'])){
                $data['email_err'] = "Please enter an email address.";
            } else {
                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "This email is already taken.";
                }
            }

            //Validate name
            if(empty($data['name'])){
                $data['name_err'] = "Please enter a username.";
            }

            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = "Please enter a password.";
            } else {
                if(strlen($data['password']) < 6) {
                    $data['password_err'] = "The password has to be longer than 6 characters.";
                }
            }

            // Control password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm your password.";
            } else {
                if($data['confirm_password'] != $data['password']) {
                    $data['confirm_password_err'] = "Your passwords do not match. Please try again";
                }
            }

            //Check for No errors
            if(empty($data['name_err']) && empty($data['email_err'])  && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                if($this->adminModel->register($data)) {
                    flashMessage("register_success", "You have registered a new user");
                    redirect('admin/accounts');
                } else {
                    die("Something went wrong registering user");
                }
            } else {
                $this->view("users/register", $data);
            }

        } else {

            // Init data
            $data = [
                'name'                  => '',
                'email'                 => '',
                'password'              => '',
                'confirm_password'      => '',
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''

            ];
    
        $this->view("users/register", $data);

        }
    }

    public function login() {

        if(isLoggedIn()) {
            redirect('admin/index');
        }

        // Check for form method
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            // Start validation

            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialise login data
            $data = [

                "email"         =>  trim($_POST['email']),
                "password"      =>  trim($_POST['password']),
                "email_err"     =>  "",
                "password_err"  =>  ""

            ];

            // Check for email
            if(empty($data['email'])) {
                $data['email_err'] = "Please enter your email.";
            }

            // Check for password
            if(empty($data['password'])) {
                $data['password_err'] = "Please enter your password.";
            }

            // Check if user exists
            if($this->userModel->findUserByEmail($data['email'])) {
                // User is found
                
            } else {
                // User not found
                if(empty($data['email_err'])) {
                    $data['email_err'] = "No user with that email is found.";
                }
            }

            // Check if there are no errors, if so - login
            if(empty($data['email_err']) && empty($data['password_err'])) {

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {

                    // Call session creator
                    $this->createUserSession($loggedInUser);

                } else {
                    $data['password_err'] = "Password or email is incorrect.";
                    $this->view('users/login', $data);
                }
            }

        } else {

            $data = [

                "email"         =>  "",
                "password"      =>  "",
                "email_err"     =>  "",
                "password_err"  =>  ""

            ];

        }
        
        $this->view('users/login', $data);

    }

    public function createUserSession($user) {

        $_SESSION['user_id']    = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name']  = $user->name;
        // flashMessage('loggedin', 'You are now logged in');
        redirect('admin/index'); 
        
    }

    public function index() {

        redirect('users/login');
    }

    public function redirectUpdateUser() {

        $this->view('users/redirectUpdateUser');
    }

    public function logout() {

        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/about');

    }

    public function logoutDeletedUser() {

        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        redirect('pages/about');
    }

    public function edit($id = null) {

        //
        // Second iteration of edit method
        //
        if($id == "update") {       

            //Check if method is post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize form data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if($_POST['id'] != $_SESSION['user_id']) {
                    // unset($_SESSION['edit_user_id']);
                    flashMessage('update_notallowed', 'You are not allowed to UPDATE this user.');
                    redirect('admin/accounts');
                } elseif ($_POST['id'] == $_SESSION['user_id']) {

                    //Init data
                    $data = [
                        'id'                    => trim($_POST['id']),
                        'name'                  => trim($_POST['name']),
                        'email'                 => trim($_POST['email']),
                        'password'              => trim($_POST['password']),
                        'confirm_password'      => trim($_POST['confirm_password']),
                        'name_err'              => '',
                        'email_err'             => '',
                        'password_err'          => '',
                        'confirm_password_err'  => ''
                    ];

                    //Validate email
                    if(empty($data['email'])){
                        $data['email_err'] = "Please enter an email address.";
                    }

                    //Validate name
                    if(empty($data['name'])){
                        $data['name_err'] = "Please enter a username.";
                    }

                    //Validate password
                    if(empty($data['password'])){
                        $data['password_err'] = "Please enter a password.";
                    } else {
                        if(strlen($data['password']) < 6) {
                            $data['password_err'] = "The password has to be longer than 6 characters.";
                        }
                    }

                    // Control password
                    if(empty($data['confirm_password'])) {
                        $data['confirm_password_err'] = "Please confirm your password.";
                    } else {
                        if($data['confirm_password'] != $data['password']) {
                            $data['confirm_password_err'] = "Your passwords do not match. Please try again";
                        }
                    }

                    // Check for No errors
                    if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                        //unset($_SESSION['edit_user_id']);

                        if($this->userModel->updateUser($data)) {
                            flashMessage("update_success", "You have updated your user");
                            redirect('admin/accounts');
                        } else {
                            die("Something went wrong updating user");
                        }
                    } else {

                        $_SESSION['edit_error_user'] = $data;
                        redirect('users/redirectUpdateUser');
                    }
                }

            } else {

                // Empty data
                $data = [
                    'name'                  => '',
                    'email'                 => '',
                    'password'              => '',
                    'confirm_password'      => '',
                    'name_err'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                    'confirm_password_err'  => ''
                ];
        
            $this->view("admin/index");
            //redirect('admin/accounts');
            
            }

        //
        // First iteration of edit method
        //
        } elseif ($id != $_SESSION['user_id']) {
            // Check if the passed id for editing is the same as the user id, if not give error
            flashMessage('edit_notallowed', "You are not allowed to EDIT this user.");
            redirect('admin/accounts');

        } elseif ($id == $_SESSION['user_id']) {

            if(isset($_SESSION['edit_error_user'])) {
      
                $this->view('users/edit', $_SESSION['edit_error_user']);

            } else {

                // Check if the passed id for editing is the same as the user id, if it is pass user data to $data as Assoc Array
                $user = $this->userModel->findUserByIdInArray($id);

                $data = $user;

                // $_SESSION['edit_user_id'] = $id;

                $this->view('users/edit', $data);

            }
        
        } else {

            // If edit button link is broken 
            die('Something went wrong pressing the edit account button.');

        }

    }

    public function deleteUser($id = null) {

        if(!empty($id)) {

            // Double check if user is correct
            $currentUser = $this->userModel->findUserById($id);

            if($currentUser->id != $_SESSION['user_id']) {
                flashMessage('delete_notsuccessful', 'You are not allowed to DELETE this user.');
                redirect('admin/accounts');
            
            } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

                if($this->userModel->deleteUser($id)) {
                    flashMessage('user_deleted', 'The user is deleted and logged out.');
                    redirect('users/logoutdeleteduser');
                }

            } else {
                redirect('admin/index');
            }
        }
    }
}

?>