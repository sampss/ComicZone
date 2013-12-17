<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

*/ 

class Comic_Data_Model extends CI_Model{
     
    public function __construct(){    		
    	$this->load->database();
    }// end __construct
   
   

  	public function get_nav_list($char)
  	{
     	// CI Active Record Query for username
    	$this->db->select('*')->from('comic_info');
    	$this->db->like('comic_name', $char, 'after');
    	
    	$query = $this->db->get();
    	
    	$new_array = array();
    	if ($query->num_rows() > 0)
		{
			$i = 0;
   			foreach ($query->result() as $row)
   			{
      			array_push($new_array, $row);
  			}
 		
  		}

    	// return results from the query in an array
    	return $new_array;	
  	
  	}



    public function get_search($char)
    {
      // CI Active Record Query for username
      $this->db->select('*')->from('comic_info');
      $this->db->like('comic_name', $char, 'both');
      
      $query = $this->db->get();
      
      $new_array = array();
      if ($query->num_rows() > 0)
    {
        $i=0;
        foreach ($query->result() as $row)
        {
            $new_array[$i][] = $row;
            $i++;
        }
    
      }

      // return results from the query in an array
      return $new_array;  
    
    }


    public function result_filter($results){
      // Cycle through results and create usable key value pairs
      $new_array = array();
      $count_1 = count($results); 
      $i=0;
      $iii = 0;
    
      while ($i < $count_1){
      
        $count_2 = count($results[$i]);
        $ii = 0;
      
        while($ii < $count_2){
          foreach ($results[$i][$ii] as $key=>$value){

            $new_array[$iii][$key] = $value;
          
          }
          $ii++;
          $iii++;
        }
        //echo "\n";
        $i++;
      }


        return $new_array;

      }





}
?>