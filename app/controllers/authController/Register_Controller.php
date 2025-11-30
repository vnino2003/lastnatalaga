    <?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
use Google\Client as GoogleClient;
use Google\Service\Oauth2;

    /**
     * Controller: Category_Controller
     * 
     * Automatically generated via CLI.
     */
    // require 'vendor/autoload.php'; // Composer PHPMailer


    class Register_Controller extends Controller {
         public function __construct()
    {
        parent::__construct();
        $this->call->model('AuthModel');
        $this->call->model('UserModel');
    }
 public function Register_Form() {
        $sessionData = get_session_data($this);
        if ($sessionData['isLoggedIn']) {
            redirect($sessionData['role'] === 'admin' ? '/admin/dashboard' : '/home');
            return;
        }
        $this->call->view('/auth/register', $sessionData);
    }

    public function createUser() {
        $this->form_validation
            ->name('username')->required()->max_length(50)
            ->name('email')->required()->valid_email()
            ->name('password')->required()->min_length(8)
            ->name('confirm_password')->required()->min_length(8);

        if ($this->form_validation->run() == FALSE) {
            setErrors($this->form_validation->get_errors());
            redirect('/register'); return;
        }

        $username = $this->io->post('username');
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $confirm = $this->io->post('confirm_password');

        if ($password !== $confirm) {
            setMessage('danger','Passwords do not match!');
            redirect('/register'); return;
        }

        if ($this->AuthModel->findByEmail($email)) {
            setMessage('danger','Email already exists!');
            redirect('/register'); return;
        }
        if ($this->AuthModel->findByUsername($username)) {
            setMessage('danger','Username already exists!');
            redirect('/register'); return;
        }

        // Insert user
        $token = bin2hex(random_bytes(16));
        $expires = date('Y-m-d H:i:s', strtotime('+1 day'));

        $this->AuthModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'is_verified' => 0,
            'verification_token' => $token,
            'verification_expires' => $expires,
            'role' => "user",
        ]);
        $newUserId = $this->AuthModel->newUser();
        $this->UserModel->insert([
            'user_id' => $newUserId,
            'first_name' => null,
            'last_name' => null,
            'phone_number' => null,
            'address' => null,
            'profile_picture' => null,
            'gender' => null
        ]);

        // Send verification email using helper
      $verificationLink = site_url('verify-email?token=' . $token);
        $result = sendMail(
            $email,
            $username,
            'Verify your account',
            '/auth/verify_email',
            ['first_name' => $username, 'verificationLink' => $verificationLink]
        );


        if ($result['status']) {
            setMessage('success','Verification email sent! Check your inbox.');
        } else {
            setMessage('danger','Could not send email: '.$result['message']);
        }
        redirect('/register');
    }

    public function verifyEmail() {
        $token = $this->io->get('token');
        $user = $this->AuthModel->findByToken($token);

        if (!$user) {
            setMessage('danger','Invalid token');
            redirect('/'); return;
        }

        if (date('Y-m-d H:i:s') > $user['verification_expires']) {
            setMessage('danger','Verification link expired. Register again.');
            redirect('/register'); return;
        }

        $this->AuthModel->update($user['id'], [
            'is_verified' => 1,
            'verification_token' => null,
            'verification_expires' => null
        ]);

        setMessage('success','Email verified! You can now login.');
        redirect('/register');
    }


public function googleRedirect() {
    $client = new GoogleClient();
    $client->setClientId('667097836235-o068b667r2df513mqik97v5ch4csngf4.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('https://mocart.onrender.com/register/googleCallback');
    $client->addScope('email');
    $client->addScope('profile');

    // Force account selection
    $client->setPrompt('select_account');

    $authUrl = $client->createAuthUrl();
    redirect($authUrl);
}


public function googleCallback() {
    $client = new GoogleClient();
    $client->setClientId('667097836235-o068b667r2df513mqik97v5ch4csngf4.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('https://mocart.onrender.com/register/googleCallback');

    if (isset($_GET['code'])) {

        // FETCH TOKEN
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (isset($token['error'])) {
            die('Google OAuth Error: ' . $token['error_description']);
        }

        if (!isset($token['access_token'])) {
            die('No access token returned: ' . json_encode($token));
        }

        // SET TOKEN
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $email = $google_account_info->email;
        $username = $google_account_info->name;

        // CHECK USER
        $user = $this->AuthModel->findByEmail($email);

        if (!$user) {
            // CREATE NEW ACCOUNT
            $this->AuthModel->insert([
                'username' => $username,
                'email' => $email,
                'password' => password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT),
                'is_verified' => 1,
                'role' => 'user',
            ]);

            $newUserId = $this->AuthModel->newUser();
            $this->UserModel->insert(['user_id' => $newUserId]);
        }

        // LOGIN
        $user = $this->AuthModel->findByEmail($email);

        $this->session->set_userdata([
            'user_id' => $user['id'],
            'isLoggedIn' => true,
            'username' => $username,
            'role' => 'user'
        ]);
            setMessage('success','U can now login with ur gmail');

        redirect('/');

    }
}




    // Validate input
    public function createAdmin() {
    // Check if any admin exists
    $existingAdmin = $this->AuthModel->getFirstAdmin();
    if ($existingAdmin) {
        setMessage('danger','Admin account already created.');
        redirect('/'); // or redirect to /admin/dashboard
        return;
    }

    // Validate input
    $this->form_validation
        ->name('username')->required()->max_length(50)
        ->name('email')->required()->valid_email()
        ->name('password')->required()->min_length(8)
        ->name('confirm_password')->required()->min_length(8);

    if ($this->form_validation->run() == FALSE) {
        setErrors($this->form_validation->get_errors());
        $this->call->view('setup-admin'); // render the form
        return;
    }

    $username = $this->io->post('username');
    $email = $this->io->post('email');
    $password = $this->io->post('password');
    $confirm = $this->io->post('confirm_password');

    if ($password !== $confirm) {
        setMessage('danger','Passwords do not match!');
        redirect('setup-admin'); 
        return;
    }

    // Check if email or username already exists
    if ($this->AuthModel->findByEmail($email)) {
        setMessage('danger','Email already exists!');
        redirect('setup-admin'); return;
    }
    if ($this->AuthModel->findByUsername($username)) {
        setMessage('danger','Username already exists!');
        redirect('setup-admin'); return;
    }

    // Insert admin
    $this->AuthModel->insert([
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'is_verified' => 1, // Admins are auto-verified
        'role' => "admin",
    ]);

    $newAdminId = $this->AuthModel->newUser();

    // Create profile like createUser()
    $this->UserModel->insert([
        'user_id' => $newAdminId,
        'first_name' => null,
        'last_name' => null,
        'phone_number' => null,
        'address' => null,
        'profile_picture' => null,
        'gender' => null
    ]);

    setMessage('success','Admin account created successfully!');
    redirect('/login');
}



 public function AdminRegister_Form() {
        $sessionData = get_session_data($this);
          $existingAdmin = $this->AuthModel->getFirstAdmin(); // <-- You need this method in your AuthModel
    if ($existingAdmin) {
        setMessage('danger','Admin account already created.');
        redirect('/'); // or redirect to /admin/dashboard
        return;
    }

        $this->call->view('/auth/registerAdmin');
    }





    
        



    }
