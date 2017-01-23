<?php
	class attributeAge extends characterAttribute {
		private $age;
		private $minAge = 10;
		private $maxAge = 100;
		
		public function init($params) {
			if (isset($params['age']) && is_numeric($params['age'])) $this->age = $params['age'];
			if (isset($params['minAge']) && is_numeric($params['minAge'])) $this->minAge = $params['minAge'];
			if (isset($params['maxAge']) && is_numeric($params['maxAge'])) $this->maxAge = $params['maxAge'];
		}
		
		public function getAttributeName() {
			return "Age";
		}
		
		public function getAttributeValue() {
			if ($this->age == null) {
				mt_srand($this->attributeSeed);
				$this->age = mt_rand($this->minAge,$this->maxAge);
			}
			
			return $this->age;
		}
	}