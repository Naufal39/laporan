<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tem {
		var $tem_data = array();
		
		function set($name, $value)
		{
			$this->tem_data[$name] = $value;
		}
	
		function load($tem = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($tem, $this->tem_data, $return);
		}
}

/* End of file Tem.php */
/* Location: ./system/application/libraries/Tem.php */
