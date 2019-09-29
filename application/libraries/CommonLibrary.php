<?php if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}
	
	Class CommonLibrary
	{
		
		function send($from, $fromname = "", $to, $subject, $message, $cc = "", $bcc = "")
		{
			//var $CI;
			$CI =& get_instance();
			$CI->load->library('email');
			$config['mailtype'] = 'html';
			$CI->email->initialize($config);
			$CI->email->from($from, $fromname);
			$CI->email->to($to);
			$CI->email->cc($cc);
			$CI->email->bcc($bcc);
			$CI->email->subject($subject);
//			$mail_msg = $CI->load->view('email/header', array(), TRUE);
			$mail_msg = $message;
//			$mail_msg .= $CI->load->view('email/footer', array(), TRUE);
			$CI->email->message($mail_msg);
			//echo $mail_msg;
			
			if ($CI->email->send())
			{
				
				return TRUE;
			}
			else
			{
				return FALSE;
			}
			
			log_message('info', "Email to $to sent with subject $subject");
			
			return TRUE;
		}
		
	}