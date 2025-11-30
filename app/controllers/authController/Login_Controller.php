    <?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;

    /**
     * Controller: Category_Controller
     * 
     * Automatically generated via CLI.
     */

    class Login_Controller extends Controller {

  public function __construct()
    {
        parent::__construct();
        $this->call->model('AuthModel');
         $this->call->library('session');
    }

    public function Login_Form(){

 $sessionData = get_session_data($this);

// Redirect if logged in
if ($sessionData['isLoggedIn']) {
    if ($sessionData['role'] === 'admin') {
        redirect('/admin/dashboard');
    } else {
        redirect('/');
    }

}

// Load header (and pass categories automatically)


// Load main page
$this->call->view('/auth/login', $sessionData);


    }
public function loginUser() {

    $this->form_validation
        ->name('email')->required()
        ->name('password')->required();

    if ($this->form_validation->run() == FALSE) {
        setErrors($this->form_validation->get_errors());
        redirect('/login');
      
    }

    $email = $this->io->post('email');
    $password = $this->io->post('password');
    $recaptcha = $this->io->post('g-recaptcha-response');
    $user = $this->AuthModel->findByEmail($email);

    if (!$user) {
        setMessage('danger', 'User not found');
        redirect('/login');
        
    }

    if (!$user['is_verified']) {
        setMessage('danger', 'Please verify your email first');
        redirect('/login');
        
    }
        if (!$recaptcha) {
        setMessage('danger', 'Please complete the reCAPTCHA');
        redirect('/login');
       
    }

    $secret = '6LctdRwsAAAAAOhujknt58i5I3LY9YUSuxh1VC4z';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
    $responseKeys = json_decode($response, true);

    if (!$responseKeys['success']) {
        setMessage('danger', 'reCAPTCHA verification failed. Please try again.');
        redirect('/login');
       
    }

    if (password_verify($password, $user['password'])) {

        // ✅ Save session with role
        $this->session->set_userdata([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        // ✅ Success message
         $this->call->model('CartModel');
        $session_cart = $this->session->userdata('cart');

        if (!empty($session_cart)) {
            $this->CartModel->save_guest_cart_to_user($user['id'], $session_cart);
            $this->session->unset_userdata('cart'); // clear guest cart
        }
        // ✅ Redirect based on role
        if ($user['role'] === 'admin') {
            redirect('/admin/products');
                    setMessage('success', 'Welcome back, admin'  . '!');

        } else {
            redirect('/');
                                setMessage('success', 'Welcome back, ' . $user['username'] . '!');

            
        }

    } else {
        setMessage('danger', 'Invalid password');
        redirect('/login');
     
    }
}


    // ===== Logout =====
    public function logout() {
        $this->session->unset_userdata(['user_id', 'role', 'username','logged_in']);
        redirect('/');
    }

public function forgotPasswordForm() {
      $sessionData = get_session_data($this);

    $isLoggedIn     = $sessionData['isLoggedIn'] ?? false;
    $username       = $sessionData['username'] ?? '';
    $role           = $sessionData['role'] ?? '';
    $categories     = $sessionData['categories'] ?? [];
    $cartItems      = $sessionData['cartItems'] ?? [];
    $cartTotal      = $sessionData['cartTotal'] ?? 0;
    $wishlistCount  = $sessionData['wishlistCount'] ?? 0;

    // Send data to view
    $data = [
        'isLoggedIn'    => $isLoggedIn,
        'username'      => $username,
        'role'          => $role,
        'categories'    => $categories,
        'cartItems'     => $cartItems,
        'cartTotal'     => $cartTotal,
        'wishlistCount' => $wishlistCount
    ];
        $this->call->view('/auth/forgot-password', $data);
    }

    // ===== Forgot Password Action =====
public function forgotPassword() {
    $email = $this->io->post('email');
    $user = $this->AuthModel->findByEmail($email);

    if (!$user) { 
        setMessage('danger', 'Email not found'); 
        redirect('/forgot-password'); 
        return; 
    }

    // Check if user already requested within last 10 minutes
    if (!empty($user['reset_expires'])) {
        $lastRequestTime = strtotime($user['reset_expires']) - 3600; // since expires = +1hr from now
        $elapsedMinutes = (time() - $lastRequestTime) / 60;

        if ($elapsedMinutes < 10) {
            setMessage('warning', 'You’ve already requested a reset. Please wait 10 minutes before requesting again.');
            redirect('/forgot-password');
            return;
        }
    }

    // Generate new token and expiration
    $token = bin2hex(random_bytes(16));
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Save to database
    $this->AuthModel->update($user['id'], [
        'reset_token' => $token,
        'reset_expires' => $expires
    ]);

    // Prepare reset link
    $resetLink = site_url('reset-password?token=' . $token);

    // Send email using helper
    $result = sendMail(
        $email,
        $user['username'],
        'Reset Your Password',
        '/auth/reset_email',   // your email view file
        [
            'username' => $user['username'],
            'resetLink' => $resetLink
        ]
    );

    if ($result['status']) {
        setMessage('success', 'Reset link sent! Check your email.');
    } else {
        setMessage('danger', 'Could not send email: ' . $result['message']);
    }

    redirect('/forgot-password');
}


    // ===== Reset Password Form =====
public function resetPasswordForm() {
    // Get token from URL
    $token = $this->io->get('token');

    // Get session data
    $sessionData = get_session_data($this);

    $isLoggedIn     = $sessionData['isLoggedIn'] ?? false;
    $username       = $sessionData['username'] ?? '';
    $role           = $sessionData['role'] ?? '';
    $categories     = $sessionData['categories'] ?? [];
    $cartItems      = $sessionData['cartItems'] ?? [];
    $cartTotal      = $sessionData['cartTotal'] ?? 0;
    $wishlistCount  = $sessionData['wishlistCount'] ?? 0;

    // Send data to view
    $data = [
        'token'         => $token,
        'isLoggedIn'    => $isLoggedIn,
        'username'      => $username,
        'role'          => $role,
        'categories'    => $categories,
        'cartItems'     => $cartItems,
        'cartTotal'     => $cartTotal,
        'wishlistCount' => $wishlistCount
    ];

    $this->call->view('/auth/reset_password', $data);
}

    // ===== Reset Password Action =====
    public function resetPassword() {
        $token = $this->io->post('token');
        $password = $this->io->post('password');
        $confirm = $this->io->post('confirm_password');

        $user = $this->AuthModel->findByResetToken($token);
        if(!$user) { setMessage('danger','Invalid or expired token'); redirect('/forgot-password'); return; }

        if(date('Y-m-d H:i:s') > $user['reset_expires']) {
            setMessage('danger','Reset link expired. Request again.'); redirect('/forgot-password'); return;
        }

        if($password !== $confirm) { setMessage('danger','Passwords do not match'); redirect('reset-password?token='.$token); return; }

        $this->AuthModel->update($user['id'],[
            'password'=>password_hash($password,PASSWORD_DEFAULT),
            'reset_token'=>null,
            'reset_expires'=>null
        ]);

        setMessage('success','Password reset successfully. You can login now.');
        redirect('/login');
    }

public function googleRedirect() {
    $client = new GoogleClient();
    $client->setClientId('667097836235-o068b667r2df513mqik97v5ch4csngf4.apps.googleusercontent.com');
    $client->setClientSecret('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');
$client->setRedirectUri('http://localhost/finalProject_SIA_WEB/index.php/login/googleCallback');
    $client->addScope('email');
    $client->addScope('profile');

    // Force account selection every time
    $client->setPrompt('select_account consent');

    $authUrl = $client->createAuthUrl();
    redirect($authUrl);
}

// ===== Google OAuth Callback =====
public function googleCallback() {
    $client = new GoogleClient();
    $client->setClientId('667097836235-o068b667r2df513mqik97v5ch4csngf4.apps.googleusercontent.com');
    $client->setClientSecret('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');
$client->setRedirectUri('http://localhost/finalProject_SIA_WEB/index.php/login/googleCallback');

    if (isset($_GET['code'])) {

        // GET TOKEN
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (isset($token['error'])) {
            setMessage('danger', 'Google OAuth Error: ' . $token['error_description']);
            redirect('/login');
            return;
        }

        if (!isset($token['access_token'])) {
            setMessage('danger', 'No access token returned.');
            redirect('/login');
            return;
        }

        // SET TOKEN
        $client->setAccessToken($token['access_token']);

        $google_oauth = new Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $email = $google_account_info->email ?? null;
        $username = $google_account_info->name ?? "Google User";

        if (!$email) {
            setMessage('danger', 'Google did not return an email.');
            redirect('/login');
            return;
        }

        // Load necessary models
        $this->call->model('UserModel');

        // CHECK USER IN DB
        $user = $this->AuthModel->findByEmail($email);

        if (!$user) {
            // Create new account
            $this->AuthModel->insert([
                'username' => $username,
                'email' => $email,
                'password' => password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT),
                'is_verified' => 1,
                'role' => 'user',
            ]);

            // GET NEW USER ID
            $newUserId = $this->AuthModel->newUser();

            // Create User Details record (like profile table)
            $this->UserModel->insert(['user_id' => $newUserId]);

            // Refresh user object
            $user = $this->AuthModel->findByEmail($email);
        }

        // --- SAVE CART (like normal login) ---
        $this->call->model('CartModel');
        $session_cart = $this->session->userdata('cart');

        if (!empty($session_cart)) {
            $this->CartModel->save_guest_cart_to_user($user['id'], $session_cart);
            $this->session->unset_userdata('cart');
        }

        // --- LOGIN TO SESSION ---
        $this->session->set_userdata([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        setMessage('success', 'Logged in successfully with Google!');
        redirect('/');
    }
}


    }
