<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /*************************************************
    *                                               *
    *   Ultrapip (c)2013 by Arthur van der Craats   *
    *                                               *
    *************************************************/

    class Login extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('model_users');
        }

        /********************
        *                   *
        *   Login Section   *
        *                   *
        *********************/

        // index go to login
        public function index() {

            //If there is a tokken cookie and if this cookie is in the user database
            if (get_cookie('remember_me_token') != ""){ 

                $token = get_cookie('remember_me_token'); 

                $data['result'] = $this->model_users->get_user($token);

                //$this->load->view('ultrapip/ultrapip', $data);
                redirect('ultrapip');

            } else {

                $this->login();

            }
        }

        // go to login
        public function login() { 
            if ($this->input->get('token',true) != ""){

                $data['result'] = $this->model_users->get_user($this->input->get('token',true));
  
                $data['button'] = "signup";
                $this->load->view('logins/header', $data);

                $this->load->view('logins/changePassword');
            }
            else {
                
                $data['button'] = "login";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/login');    
                $this->load->view('logins/footer');
            }

        }

        // Validate the login form if the form validation is ok
        public function login_validation() {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'User', 'required|trim|xss_clean|callback_validate_credentials');
            $this->form_validation->set_rules('password', 'Password', 'required|md5');

            $this->form_validation->set_message('required', 'E-mailadres en Wachtwoord zijn verplichte velden');
            $this->form_validation->set_message('callback_validate_credentials', 'E-mailadres en Wachtwoord verkeerd ingevuld');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run()){

                $data = array (
                    'email'=> $this->input->post('email'),
                    'is_logged_in' => 1
                );

                $randomToken = $this->get_random_token(20,20,true,true,true);

                // If remember me is checked add cookie with token else set session with token

                $rememberpass = $this->input->post('remember_pass');

                if ($rememberpass != ""){

                    $this->input->set_cookie('remember_me_token', $randomToken, 1209600);

                    $session = array(
                        'token'  => $randomToken,
                    );

                    $this->session->set_userdata($session);

                }
                else {

                    $session = array(
                        'token'  => $randomToken,
                    );

                    $this->session->set_userdata($session);
                }

                $this->db->where('email', $data['email']);
                $this->db->update('users',array('token'=>$randomToken));

                redirect('ultrapip');

            } else {
                $data['button'] = "login";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/login');
            }
        }

        public function validate_credentials(){
            $this->load->model('model_users');

            if ($this->model_users->can_log_in()){
                return true;
            }   else {
                $this->form_validation->set_message('validate_credentials', 'E-mailadres of Wachtwoord verkeerd ingevoerd' );
                return false;
            }
        } 


        /*********************
        *                    *
        *   Signup Section   *
        *                    *
        **********************/

        // Validation signup form
        public function signup_validation() {

            $this->load->library('form_validation');
            $this->load->model('model_users');

            $this->form_validation->set_message('required', 'Dit veld is verplicht!');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');


            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            $this->form_validation->set_message('required', 'E-mailadres en Wachtwoord zijn verplichte velden');
            $this->form_validation->set_message('is_unique', 'Dit e-mail adres bestaat al.');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run()){

                // generate a random key
                $key = md5(uniqid());

                $this->load->library('email', array('mailtype' =>'html'));

                $this->email->from('admin@ultrapip.nl', 'Ultrapip admin');
                $this->email->to($this->input->post('email'));
                $this->email->bcc('vdcraats@online.nl', 'Arthur van der Craats');
                $this->email->subject("Bevestig je account.");

                $message = "<p>Beste Ultrapip gebruiker,<p>";
                $message .= "<p>Bedankt voor het registreren bij ultrapip.nl<p>";
                $message .= "<p><p>";
                $message .= "<p><a href='".base_url()."login/register_users/$key'>Klik hier</a> om je account te activeren.</p>";

                $this->email->message($message);

                // send and email to the user
                if ($this->model_users->add_temp_user($key)){
                    if ($this->email->send()){

                        $data['button'] = "signup";
                        $data['message'] = "<div class='success' style='margin-top:130px;'>Bedankt voor het aanmaken van uw gratis account. We hebben een email vertuurd naar " . $this->input->post('email') ." Klik op de link in deze email om uw account te activeren </div>";
                        $this->load->view('logins/header', $data);
                        $this->load->view('logins/signup');
                        $this->load->view('logins/footer');
                     
                    } else echo "Could not send the email.";

                } else echo "problem adding to database";


                //add them to the temp_users db   
            } else {
                $data['button'] = "signup";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/signup');
                $this->load->view('logins/footer');
            }
        }

        // Register the user
        public function register_users($key){
            $this->load->model('model_users');

            if ($this->model_users->is_key_valid($key)){
                if  ($newemail = $this->model_users->add_user($key)){

                    $data = array(
                        'email' => $newemail,
                        'is_logged_in' => 1
                    );

                    $this->session->set_userdata($data);
                    redirect('ultrapip');

                } else echo "failed to add user, please try again.";
            } else echo "invalid key";  
        }

        // go to signup
        public function signup (){
            $data['button'] = "signup";
            $this->load->view('logins/header', $data);
            $this->load->view('logins/signup'); 
            $this->load->view('logins/footer');
        }


        /*********************
        *                    *
        *   Logout Section   *
        *                    *
        **********************/

        // Logout destroy session
        public function logout(){
            $this->session->sess_destroy();
            delete_cookie("remember_me_token");
            redirect  ('login');
        }


        /******************************
        *                             *
        *   Forget Password Section   *
        *                             *
        *******************************/

        // Forget my password option
        public function forget()
        {
            if (isset($_GET['error'])) {
                $data['error'] = $_GET['error'];
                $this->load->view('logins/login-forget', $data);
            }
            elseif (isset($_GET['info'])) {
                $data['info'] = $_GET['info'];
                $this->load->view('logins/login-forget', $data);
            }
            else {
                $data['button'] = "signup";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/login-forget');
                $this->load->view('logins/footer');
            }
        } 

        // change the password
        public function doforget()
        {
            $this->load->helper('url');
            $email= $_POST['email'];
            $q = $this->db->query("select * from users where email='" . $email . "'");
            if ($q->num_rows > 0) {
                $r = $q->result();
                $user=$r[0];
                $this->resetpasswordtoken($user);

                $data['button'] = "signup";
                $data['error'] = "<div class='success'>Een email met een link is verstuurd naar ". $email . " klik op de link in de email, en u kunt een nieuw wachtwoord aanmaken </div>";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/login-forget' , $data);
                $this->load->view('logins/footer');
            }
            else {

                $data['button'] = "signup";
                $data['error'] = "<div class='error'>Sorry, we hebben geen gebruiker met dit e-mailadres gevonden </div>";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/login-forget');
                $this->load->view('logins/footer');

            }
        } 

        private function resetpasswordtoken($user)
        {
            date_default_timezone_set('GMT');
            $this->load->helper('string');
            $randomToken = $this->get_random_token(20,20,true,true,false);
            $this->db->where('id', $user->id);
            $this->db->update('users',array('token'=>$randomToken));
            $this->load->library('email');
            $this->email->set_mailtype("html");
            $this->email->from('noreply@ultrapip.com', 'Ultrapip Admin');
            $this->email->to($user->email);   
            $this->email->subject('Wachtwoord reset');
            $this->email->message('U heeft een nieuw wachtwoord aangevraagd, klik op <a href="' . base_url() . 'login/?token=' . $randomToken . '">deze link</a>  om uw wachtwoord te veranderen:');  
            $this->email->send();
        } 

        // Send the new password and update the database
        private function resetpassword($user)
        {
            date_default_timezone_set('GMT');
            $this->load->helper('string');
            $password= random_string('alnum', 16);
            $this->db->where('id', $user->id);
            $this->db->update('users',array('password'=>MD5($password)));
            $this->load->library('email');
            $this->email->from('noreply@ultrapip.com', 'Ultrapip Admin');
            $this->email->to($user->email);   
            $this->email->subject('Wachtwoord reset');
            $this->email->message('U heeft een nieuw wachtwoord aangevraagd, Hier is uw nieuwe wachtwoord:'. $password);  
            $this->email->send();
        } 


        function get_random_token($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
        {
            $length = rand($chars_min, $chars_max);
            $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
            if($include_numbers) {
                $selection .= "1234567890";
            }
            if($include_special_chars) {
                $selection .= "!@04f7c318ad0360bd7b04c980f950833f11c0b1d1quot;#$%&[]{}?|";
            }

            $token = "";
            for($i=0; $i<$length; $i++) {
                $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
                $token .=  $current_letter;
            }                

            return $token;
        }


        public function changePassword_validation() {

            $this->load->library('form_validation');
            $this->load->model('model_users');


            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            $this->form_validation->set_message('matches', 'De wachtwoorden zijn niet hetzelfde');

            if ($this->form_validation->run()){

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('users',array('password'=>MD5($this->input->post('password'))));

                redirect('login');

            } else {

                $data['id'] = $this->input->post('id');
                $data['token'] = $this->input->post('token');

                $data['button'] = "signup";
                $this->load->view('logins/header', $data);
                $this->load->view('logins/changePassword', $data); 
            }
        }
    }


