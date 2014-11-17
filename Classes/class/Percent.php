<?php
	
	class Percent {
		public $absolute;
		public $relative;
		public $hundred;
		public $nominal;
		
		public function _construct($new, $unit){
			$this->absolute = formatNumber($new/$unit);
			$this->relative = formatNumber($absolute - 1);
			$this->hundred = formatNumber($absolute * 100);
			if($absolute > 1){$this->nominal = 'positive';}
			else if($absolute == 1){$this->nominal = 'status-quo';}
			else if($absolute < 1){$this->nominal = 'negative';}
		}
		
		public function formatNumber($number){
			return number_format($number,2,","," ");
		}
	}
	
	
	
?>