<?php
	require_once 'attributes/attributeAge.php';
	require_once 'attributes/attributeGender.php';
	require_once 'attributes/attributeName.php';
	

	class character {
		private $seed;
		private $attributes = array();
		
		private function init($seed, $params) {
			if (intval($seed) == 0 && strlen($seed) > 0) {
				$strSeed = $seed;
				$seed = 0;
				for($i=0;$i<strlen($strSeed);$i++) {
					$seed += ord($strSeed[$i]);
				}
			}
			$this->seed = $seed;
			mt_srand($this->seed);
			
			$this->attributes[] = new attributeAge($this, mt_rand(), $params);
			$this->attributes[] = new attributeGender($this, mt_rand(), $params);
			$this->attributes[] = new attributeName($this, mt_rand(), $params);
		}
		
		public function __construct($seed = null, $params = array()) {
			if ($seed == null) $seed = str_replace('.','',time()+microtime());
			$this->init($seed, $params);
		}
		
		public function __get($name) {
			if (ucwords($name) == ucwords('seed')) return $this->seed;
			
			foreach ($this->attributes as $attribute) {
				if (get_parent_class($attribute) == 'attributeAbstract') {
					if (ucwords($attribute->getAttributeName()) == ucwords($name)) {
						return $attribute->getAttributeValue();
					}
				}
			}
			
			return null;
		}
		
		public function listAttributes() {
			$list = array();
			foreach ($this->attributes as $attribute) {
				if (get_parent_class($attribute) == 'attributeAbstract') {
					$list[] = $attribute->getAttributeName();
				}
			}
			
			return $list;
		}
	}