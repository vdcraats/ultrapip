<?php

    /*************************************************
    *                                               *
    *   Ultrapip (c)2013 by Arthur van der Craats   *
    *                                               *
    *************************************************/

    class Model_ultrapip extends CI_Model {

        function __construct()
        {
            parent::__construct();
        }

        // Get the widgets
        function GetWidgets($id, $user_id)  
        {  
            $this->db->from('widgets');
            
            if (!empty($id)){
            $this->db->where('id', $id);
            }
           
            if (!empty($user_id)){
            $this->db->where('user_id', $user_id);
            }
            
            $this->db->order_by("position", "asc");
            $query = $this->db->get(); 

            if ($query->num_rows() > 0)
            {
                return $query->result();
            }else{
                show_error('Database is empty!');
            } 
        }

        // Update the swap widgets
        function UpdateWidgets($widgetFrom, $widgetTo)  
        {
            $this->db->from('widgets');
            $this->db->where('id', $widgetFrom);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $positionFrom = $row->position;
            }

            $this->db->from('widgets');
            $this->db->where('id', $widgetTo);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $positionTo = $row->position;
            }

            $this->db->where('id', $widgetFrom);
            $this->db->update('widgets', array('position' => $positionTo)); 

            $this->db->where('id', $widgetTo);
            $this->db->update('widgets', array('position' => $positionFrom)); 
        }
        
        // Edit widgets
        function EditWidget($id, $logo, $link, $title)  
        {
            
            $data = array(
               'logo' => $logo,
               'link' => $link,
               'title' => $title
            );

                $this->db->where('id', $id);
                $this->db->update('widgets', $data); 
        }
        
        // Add widgets
        function AddWidget($id, $webadres, $color, $widgetname)  
        {
           $data = array(
               'logo' => $color,
               'link' => $webadres,
               'title' => $widgetname
            );

                $this->db->where('id', $id);
                $this->db->update('widgets', $data); 
        }

        // Delete widgets
        function DeleteWidgets($id)  
        {

        }

        function AddDefaultWidgets($id)  
        {

            $i=1;
            while($i<=60)
            {
                $data = array(
                    array(
                        'position' => $i ,
                        'user_id' => $id 

                    )
                );
                $this->db->insert_batch('widgets', $data);
                $i++;
            }
            
            $this->db->where('id', $id);
            $this->db->update('users', array('firsttime' => '1'));
            
        } 
        
        function AddDefaultBackground($id)  
        {

            
                $data = array(
                    array(
                        
                        'user_id' => $id,
                        'title' => 'Home' ,
                        'background' => 'background3.jpg' ,
                        'order' => '1' 
                    )
                );
                $this->db->insert_batch('tabs', $data);
            
        } 
        
        // Get the Tabs
        function GetTabs($user_id)  
        {  
            $this->db->from('tabs');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get(); 
            
            if ($query->num_rows() > 0)
            {
                return $query->result();
            }else{
                show_error('Database is empty!');
            } 
        }
        
                // Update Background
        function updateBackground($id, $background)  
        {
           $data = array(
               'background' => $background
           
            );

                $this->db->where('id', $id);
                $this->db->update('tabs', $data); 
        }


    }
?>