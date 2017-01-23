<?php
	class attributeGender extends characterAttribute {
		private $gender;
		
		public function init($params) {
			if (isset($params['gender'])) $this->gender = $params['gender'];
		}
		public function getAttributeName() {
			return "Gender";
		}
		public function getAttributeValue() {
			if ($this->gender == null) {
				mt_srand($this->attributeSeed);
				$randomGender = (mt_rand(1,100) % 2);
				$this->gender = ($randomGender) ? 'Male' : 'Female';
			}
			
			return $this->gender;
		}
	}