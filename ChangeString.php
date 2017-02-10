<?php

class ChangeString {
	public static function build($arr){			
		$ret = "";
		for ($i=0;$i<strlen($arr);$i++){
			if (ctype_alpha($arr[$i]) && strtoupper($arr[$i]) !== 'Z' && strtoupper($arr[$i]) !== 'N' && strtoupper($arr[$i]) !== '�' )
				$ret .= chr(ord($arr[$i])+1);			
			else if ($arr[$i] === 'Z')
				$ret .= 'A';
			else if ($arr[$i] === 'z')
				$ret .= 'a';
			else if ($arr[$i] === 'N')
				$ret .= '�';
			else if ($arr[$i] === 'n')
				$ret .= '�';
			else if ($arr[$i] === '�')
				$ret .= 'O';
			else if ($arr[$i] === '�')
				$ret .= 'o';
			else
				$ret .= $arr[$i];
		}
		return $ret; 
	}
	
}


echo ChangeString::build('123 abcd*3').PHP_EOL;
echo ChangeString::build('**Casa 52').PHP_EOL;
echo ChangeString::build('**Casa 52Z"').PHP_EOL;

?>