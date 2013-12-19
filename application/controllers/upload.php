<?php
    class Upload extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('simpleimage');
        }

        function index()
        {
            $data['id'] = $this->session->flashdata('id');
            $data['title'] = $this->session->flashdata('title');
            $data['link'] = $this->session->flashdata('link');
            
            $this->load->view('ultrapip/headerPopup');
            $this->load->view('ultrapip/upload_form', $data);
        }

        function do_upload()
        {
            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = '204800';
            $config['max_width'] = '1920';
            $config['max_height'] = '1080';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);  

            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());

                $data['id'] = $_POST['id'];
                $data['title'] = $_POST['title'];
                $data['link'] = $_POST['link'];
                $data['error'] = "Er is een probleem met het uploaden van uw afbeelding! Klopt de exensie wel jpg ?";
                
                $this->load->view('ultrapip/headerPopup');
                $this->load->view('ultrapip/upload_form', $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                // resize image to a normal format if it is to big for the screen
                $image_path = base_url() . "/uploads/" . $data['upload_data']['file_name'];
                $image_savepath = "./uploads/" . $data['upload_data']['file_name'];
                $width = $data['upload_data']['image_width'];
                $height = $data['upload_data']['image_height'];

                //echo $image_savepath ;

                // if the image width is bigger than 500 pixels then maken it 500 pixels
                if ($width > 500){
                    $image = new SimpleImage(); 
                    $image->load($image_path); 
                    $image->resizeToWidth(500); 
                    $image->save( $image_savepath);    

                }
                // elseif the image heigth is bigger than 500 pixels then maken it 500 pixels 
                elseif ($height > 500){
                    $image = new SimpleImage(); 
                    $image->load($image_path); 
                    $image->resizeToHeight(500); 
                    $image->save($image_savepath);
                }

                $data['id'] = $_POST['id'];
                $data['link'] = $_POST['link'];
                $data['title'] = $_POST['title'];
                $this->load->view('ultrapip/headerPopup');
                $this->load->view('ultrapip/upload_crop', $data);
            }
        }

        public function showimage() {
            $targ_w = $targ_h = 80;
            $jpeg_quality = 80;

            $src = $_POST['filepath'];
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

            imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
                $targ_w,$targ_h,$_POST['w'],$_POST['h']);

            $extension = substr($_POST['file'], -4);    // returns "ef"    
            $filename = $this->get_random_token(20,20,true,true,false) . $extension;  
                
            imagejpeg($dst_r,"./uploads/icons/" . $filename . "",$jpeg_quality);
            unlink('./uploads/' . $_POST['file']);

            $data['id'] = $_POST['id'];
            $data['link'] = $_POST['link'];
            $data['title'] = $_POST['title'];
            $data['icon'] = $filename;

            // Return to opload form with The new image the link text the title text ready for submition.
     
            $this->load->view('ultrapip/headerPopup');
            $this->load->view('ultrapip/addwidget', $data);

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
    }
?>