<?php
	require_once 'attributes/attributeAge.php';
	require_once 'attributes/attributeGender.php';
	require_once 'attributes/attributeName.php';
	

	class character {
		private $seed;
		private $attributes = array();
		
		private function init($seed) {
			if (intval($seed) == 0 && strlen($seed) > 0) {
				$strSeed = $seed;
				$seed = 0;
				for($i=0;$i<strlen($strSeed);$i++) {
					$seed += ord($strSeed[$i]);
				}
			}
			$this->seed = $seed;
			mt_srand($this->seed);
			
			$this->attributes[] = new attributeAge($this, mt_rand());
			$this->attributes[] = new attributeGender($this, mt_rand());
			$this->attributes[] = new attributeName($this, mt_rand());
		}
		
		public function __construct($seed = null) {
			if ($seed === null) $seed = str_replace('.','',time()+microtime());
			$this->init($seed);
		}
		
		public function __get($name) {
			foreach ($this->attributes as $attribute) {
				if (get_parent_class($attribute) == 'attributeAbstract') {
					if (ucwords($attribute->getAttributeName()) == ucwords($name)) {
						return $attribute->getAttributeValue();
					}
				}
			}
		}
	}