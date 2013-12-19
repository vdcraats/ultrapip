<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /*************************************************
    *                                               *
    *   Ultrapip (c)2013 by Arthur van der Craats   *
    *                                               *
    *************************************************/

    class Ultrapip extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->model('model_users');
            $this->load->model('model_ultrapip');
        }

        // Main ultrapip
        public function index() {

            // If there is a tokken cookie and if this cookie is in the user database
            if (get_cookie('remember_me_token') != ""){ 

         
                
                $token = get_cookie('remember_me_token'); 

                // Get the user information
                $data['result'] = $this->model_users->get_user($token);
                
                // Get a normal id of the logged in user
                $user_id = $data['result'][0]->id;

                // Check if this is the first time firsttime in the database if 0 its the first time add empty widgets
                $firsttime = $data['result'][0]->firsttime;
                //echo $firsttime;

                if ($firsttime == 0 ){
                               
                    // Add default widgets    
                    $data['addDefaultWidgets'] = $this->model_ultrapip->addDefaultWidgets($user_id);    
                    // Add default background    
                    $data['addDefaultBackground'] = $this->model_ultrapip->addDefaultBackground($user_id);
                }
                
                
                // Get a normal id of the logged in user
                $user_id = $data['result'][0]->id;

                // Get the widget information from the logged in user
                $data['widgetresults'] = $this->model_ultrapip->GetWidgets('' , $user_id);
                $data['tabsresults'] = $this->model_ultrapip->GetTabs($user_id);
                $data['id'] = $user_id;
                
                // Pass all the information to the users startpage
                $this->load->view('ultrapip/header', $data);
                $this->load->view('ultrapip/ultrapip'); 
                $this->load->view('ultrapip/footer');

            }
            elseif ($this->session->userdata('token') != ""){ 

                $token = $this->session->userdata('token');

                // Get the user information
                $data['result'] = $this->model_users->get_user($token);

                // Get a normal id of the logged in user
                $user_id = $data['result'][0]->id;

                // Check if this is the first time firsttime in the database if 0 its the first time add empty widgets
                $firsttime = $data['result'][0]->firsttime;
                //echo $firsttime;

                if ($firsttime == 0 ){
                               
                    // Add default widgets    
                    $data['addDefaultWidgets'] = $this->model_ultrapip->addDefaultWidgets($user_id);    
                    // Add default background    
                    $data['addDefaultBackground'] = $this->model_ultrapip->addDefaultBackground($user_id);
                }

                $data['id'] = $user_id;

                // Get the widget information from the logged in user
                $data['widgetresults'] = $this->model_ultrapip->GetWidgets('', $user_id);
                $data['tabsresults'] = $this->model_ultrapip->GetTabs($user_id);

                // Pass all the information to the users startpage
                $this->load->view('ultrapip/header', $data);
                $this->load->view('ultrapip/ultrapip'); 

            }
            else { 
                $this->login();
            }
        }

        // go to login
        public function login() {
            redirect('login');
        }   

        public function updatepositionwidget() {
            $widgetFrom = $_POST['widgetFrom'];
            $widgetTo = $_POST['widgetTo'];
            $data['updateWidget'] = $this->model_ultrapip->UpdateWidgets($widgetFrom, $widgetTo);
        }

        public function addwidget($id) {
            $data['id'] = $id;
            $data['add'] = 1;

            $this->load->view('ultrapip/headerPopup');
            $this->load->view('ultrapip/addwidget', $data);
        }

        public function editwidget($id) {
            
            $data['id'] = $id;

            $data['widgetresults'] = $this->model_ultrapip->GetWidgets($id, '');

            $this->load->view('ultrapip/headerPopup');
            $this->load->view('ultrapip/editwidget', $data);
        }

        public function edittab($id) {
            $data['id'] = $id;

            $this->load->view('ultrapip/headerPopup');
            $this->load->view('ultrapip/edittab', $data);
        }

        public function addwidget_validation() {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('link', 'link', 'required|trim|xss_clean');
      
            $this->form_validation->set_message('required', 'Webadres is een verplicht veld');


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $button =  $this->input->post('login_submit');

            if ($button == "Upload afbeelding"){

                $this->session->set_flashdata('id', $this->input->post('id'));
                $this->session->set_flashdata('title', $this->input->post('title'));
                $this->session->set_flashdata('link', $this->input->post('link'));
                redirect('upload');  

            }

            if ($this->form_validation->run()){
                $id = $this->input->post('id');
                $color = $this->input->post('color');
                $link = $this->input->post('link');
                $title = $this->input->post('title');



                // Check for http/https in the link else add it 
                $check = substr($link, 0, 4);

                if ($check != 'http'){

                    $link = 'http://' . $link;
                }

                // Add new widget
                $data['AddWidget'] = $this->model_ultrapip->AddWidget($id, $link, $color, $title);

        
                
            ?> 
            <script type="text/javascript">
                window.parent.location.reload();
            </script>
            <?php             

            }  
            else {
                $data['id'] = $this->input->post('id');

                $this->load->view('ultrapip/headerPopup');
                $this->load->view('ultrapip/addwidget', $data);
            }
        }  

        public function editwidget_validation() {
            
            $button =  $this->input->post('login_submit');
             
             if ($button == "Upload afbeelding"){

                $this->session->set_flashdata('id', $this->input->post('id'));
                $this->session->set_flashdata('title', $this->input->post('title'));
                $this->session->set_flashdata('link', $this->input->post('link'));
                redirect('upload');  
            }
            
            $id = $this->input->post('id');
            $color = $this->input->post('color');
            $link = $this->input->post('link');
            $title = $this->input->post('title');

            // Edit widget
            $data['EditWidget'] = $this->model_ultrapip->EditWidget($id, $color, $link, $title);
        ?> 
        <script type="text/javascript">
            window.parent.location.reload();
        </script>
        <?php             

        }  

        public function deleteWidget($id) {

            $data['AddWidget'] = $this->model_ultrapip->AddWidget($id, "", "", "");

        }

        public function changeBackground($id) {
            $background = $this->input->get('background');
            // Update Background
            $data['updateBackground'] = $this->model_ultrapip->updateBackground($id, $background);
        ?> 
        <script type="text/javascript">
            window.parent.location.reload();
        </script>
        <?php             

        }

        public function searchIcon() {

            echo "resultaat";
        }


    }


