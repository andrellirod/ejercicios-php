<?php
	
class CompleteRange{
		
		private static function esNumero($num)
		{
			if (!is_int($num)) {
				throw new Exception("Permitido solo Números");
			} 
		}		
		
		public static function build($num){
			try{
				$ret = Array();
				if (count($num) > 0){
					$first =  min($num);
					$last = max($num);
					self::esNumero($first);
					self::esNumero($last);
					$ret = range($first,$last);
					echo implode(',', $ret).PHP_EOL;										
				}else{
					throw new Exception('Arreglo vacío');
				}
				
			} catch (Exception $e) {
				echo 'ERROR: '.$e->getMessage() . PHP_EOL;
			}
			
		}
}


CompleteRange::build([1, 2, 4, 5]);
CompleteRange::build([2, 4, 9]);
CompleteRange::build([55, 58, 60]);

?>
