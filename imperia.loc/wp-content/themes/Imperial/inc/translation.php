<?php

	add_filter('gettext', 'stm_translate');
	
	function stm_translate( $var ){
		
		global $translation, $q_config;
		
		if(empty($translation)) {
			/* TODO :: get from lang var */

			$lang  = empty($q_config['language']) ? 'ru' : empty($q_config['language']);
			$uri = get_stylesheet_directory(). '/locale/'.$lang.'.csv';

			if(is_file($uri))
				$data = file(get_stylesheet_directory(). '/locale/'.$lang.'.csv');
			else return $var;	
			foreach($data as $tr){
				list($eng, $trs) = str_getcsv( $tr );
				$translation[$eng] = $trs;
			}

		}
		if(empty( $translation[ $var ] ))		
			return $var;
		else{
			
			return $translation[ $var ];
		}

		
	}