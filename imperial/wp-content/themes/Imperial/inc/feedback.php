<?php

	
	/* wp actions && declarations */
	add_action('init', array('STM_Feedback', 'init'));
	add_shortcode( 'feedback_form', array('STM_Feedback', 'feedback_form') );	
	
	
	function local_feedback_form(){
		 STM_Feedback::feedback_form('feedback', array('view'=>'partials/form-feedback.php'));
	}

	

	
	

	/* template tags*/
	function feedbackFormSetup( $formName, $data ) {

		STM_Feedback::$allowedFields[$formName] 	= $data['allowedFields'];
		STM_Feedback::$mailTitle[$formName] 		= $data['mailTitle'];
		STM_Feedback::$recipients[$formName] 		= $data['recipients'];
		STM_Feedback::$callback[$formName] 			= (empty($data['callback']) ? '' : $data['callback']);
		STM_Feedback::$dataArray = $formName;
	}
	function get_feedback_errors($formName = ''){
		
		if(!empty(STM_Feedback::$errors[$formName])) return  STM_Feedback::$errors[$formName];
		else return false;
	}
		
	function form_sent($formName = '') {
		if( ! empty( STM_Feedback::$messages[$formName]['formSent'] ) ) return true;
		else return false;
	}

	
	
	/* class */
	class STM_Feedback
	{
		const PROCESS_NAME = 'processFeedbackForm';
		const DEFAULT_FORM_NAME = 'feedback';
		
		public static $allowedFields 	=  array();
		public static $dataArray 		=  'feedback';
		public static $errors 			=  array();
		public static $messages 		=  array();
		public static $mailTitle 		=  array();
		public static $recipients 		=  array();
		public static $callback 		=  array();


		static public function init()
		{
			$return = array();
			if( !empty($_REQUEST[self::PROCESS_NAME]  )) {

				if(self::process()) $return['result'] = true;
				else {
					$return['result'] = false;
					$return['errors'] = self::$errors;
				}

			}


			if(!empty($_REQUEST['ajax'])){
				
				die( json_encode( $return ) );
			}
				
			
		}

		static public function process()
		{
			$formName 	= empty($_REQUEST['formName']) ? 'feedback' : $_REQUEST['formName'];
			$inputData 	= empty($_REQUEST[ $formName ]) ? array() :  $_REQUEST[ $formName ];

			sForms::init(self::$allowedFields[$formName]);
			sForms::setData($inputData);

			if( sForms::validate() ) {


				self::$messages[$formName]['formSent'] 	= true;
				ob_start();
					$message_file = locate_template('email/feedback-template.php', false, false);
					include($message_file);
				$message = ob_get_clean();
				
				if(!empty(self::$recipients[ $formName ]) )foreach ( (array) self::$recipients[ $formName ] as $recipient ){
					wp_mail( $recipient, self::$mailTitle[ $formName ], $message );
					wp_mail( 'farhod@localhost', self::$mailTitle[ $formName ], $message );
				}


				if(is_callable(self::$callback[$formName])){
					call_user_func(self::$callback[$formName], $inputData);
				}

				return true;
			}  else
				self::$errors = sForms::$errors;


			return false;
		}
		
		static public function feedback_form($formName,  $atts = '' )
		{
			$view = empty( $atts['view'] ) ? 'form-feedback' : $atts['view'];
			sForms::init(self::$allowedFields[$formName], $formName);
			$template = locate_template( $view );
			if(!empty($template)) include( $template );
		}
		
	}
	
?>