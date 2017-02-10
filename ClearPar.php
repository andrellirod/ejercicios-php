<?php
class ClearPar{
	const OPEN_PAR='(';
	const CLOSE_PAR=')';
	
	public static function build($param){
		try{
			self::is_valid($param);
			$flg=true;
			$ret = '';
			for ($i = 0 ; $i<strlen($param);$i++){
				if ($flg && self::is_open($param[$i]) && strlen($param)-1 != $i){
					$ret.=$param[$i];
					$flg=false;
				}
				else if (!$flg && self::is_close($param[$i])){
					$ret.=$param[$i];
					$flg=true;
				}				
			}
		}catch(Exception $e){
			echo 'ERROR: '.$e->getMessage() . PHP_EOL;
		}
		
		echo $ret.PHP_EOL;
		
	}
	
	
	
	private static function is_open($value){
		if ($value === self::OPEN_PAR){
			return true;
		}
		return false;
		
	}
	private static function is_close($value){
		if ($value === self::CLOSE_PAR){
			return true;
		}
		return false;
	}
	private static function is_valid($param){
		for ($i = 0 ; $i<strlen($param);$i++){
			if (!self::is_open($param[$i]) && !self::is_close($param[$i])){
				throw new Exception('Cadena no válida.');
			}
		}
	}
}



ClearPar::build('()())()');
ClearPar::build('()(()');
ClearPar::build(')(');
ClearPar::build('((()');


?>