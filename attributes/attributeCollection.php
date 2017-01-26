<?php
	abstract class attributeCollection {
		protected $attributeSeed;
		protected $character;
		public function __construct($character, $seed, $params) {
			if (get_class($character) != 'character') throw new Exception("Expected a 'character' object");
			$this->character = $character;
			
			if (intval($seed) == 0 && strlen($seed) > 0) {
				$strSeed = $seed;
				$seed = 0;
				for($i=0;$i<strlen($strSeed);$i++) {
					$seed .= ord($strSeed[$i]);
				}
			}
			$this->attributeSeed = $seed;
			$this->init($params);
		}
		
		abstract public function init($params);
		abstract public function listAttributeNames();
		abstract public function getAttributeValues($name);
	}