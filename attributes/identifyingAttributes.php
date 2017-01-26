<?php
	require_once 'attributes/attributeCollection.php';

	class identifyingAttributes extends attributeCollection {
		private $firstName; private $firstNameSeed;
		private $surName; private $surNameSeed;
		private $maleNames = array('Nickolas','Winfred','Myron','Sergio','Roland','Brent','Terrance','Elmer','Kenton','Reinaldo','Fredrick','Mario','Lucas','Bart','Stefan','Eldridge','Rodolfo','Nathan','Alonso','Federico','Rod','Sonny','Harry','Leroy','Guillermo','Erik','Renato','Scotty','Mario','Micah');
		private $femaleNames = array('Leola','Mina','Bobette','Larue','Madlyn','Francie','Kallie','Ester','Nicki','Leota','Shawnee','Lashaunda','Felicidad','Dominica','Madeleine','Glenda','Sarina','Wendi','Clementine','Dominque','Vivienne','Ariana','Nu','Tammy','Marchelle','Lorie','Liza','Shawnna','Vonnie','Danyell');
		private $surNames = array('Lepak','Slaybaugh','Yankey','Thornley','Newhard','Kizer','Restivo','Peiffer','Fang','Glisson','Thrush','Denby','Constable','McClaren','Hollow','Hallenbeck','Bertram','Christner','Biron','Vosburgh','Vinci','Cheney','Finke','Piro','Curnutte','Ouellette','Valentine','Sparr','Ahlquist','Sommers','Grande','Dipalma','Otter','Hemenway','Hermosillo','Poitra','Parenteau','Tinsley','Vadnais','Bert','Closson','Kendig','Secrest','Transue','Rodney','Becker','Owen','Jepsen','Dial','Cerutti','Jasmin','Scales','Kilcrease','Socia','Strock','Thrush','Owsley','Papenfuss','Sokol','Farraj');
		private $age; private $ageSeed; private $minAge = 16; private $maxAge = 70;
		private $gender; private $genderSeed;
		
		public function init($params) {
			if (isset($params['firstName'])) $this->firstName = $params['firstName'];
			if (isset($params['surName'])) $this->surName = $params['surName'];
			if (isset($params['age'])) $this->age = $params['age'];
			if (isset($params['minAge'])) $this->minAge = $params['minAge'];
			if (isset($params['maxAge'])) $this->maxAge = $params['maxAge'];
			if (isset($params['gender'])) $this->gender= $params['gender'];
			
			mt_srand($this->attributeSeed);
			$this->firstNameSeed = mt_rand();
			$this->surNameSeed = mt_rand();
			$this->ageSeed = mt_rand();
			$this->genderSeed = mt_rand();
		}
		
		public function listAttributeNames() {
			return array('firstName','surName','name','age','gender');
		}
		
		public function getAttributeValues($name) {
			switch ($name) {
				case "firstName":
					if ($this->firstName == null) $this->generateFirstName(); 
					return $this->firstName;
					break;
				case "surName":
					if ($this->surName == null) $this->generateSurname();
					return $this->surName;
					break;
				case "name":
					if ($this->firstName == null) $this->generateFirstName();
					if ($this->surName == null) $this->generateSurname();
					return $this->firstName.' '.$this->surName;
					break;
				case "age":
					if ($this->age == null) {
						$this->generateAge();
					}
					return $this->age;
					break;
				case "gender":
					if ($this->gender == null) $this->generateGender();
					return $this->gender;
					break;
			}
		}
		
		private function generateFirstName() {
			$namearray = ($this->getAttributeValues('gender') == 'Male') ? $this->maleNames : $this->femaleNames;
			mt_srand($this->firstNameSeed);
			$this->firstName = $namearray[mt_rand(0,count($namearray)-1)];
		}
		private function generateSurname() {
			mt_srand($this->surNameSeed);
			$this->surName = $this->surNames[mt_rand(0,count($this->surNames)-1)];
		}
		private function generateAge() {
			mt_srand($this->ageSeed);
			$this->age = mt_rand($this->minAge,$this->maxAge);
		}
		private function generateGender() {
			mt_srand($this->genderSeed);
			$this->gender = (mt_rand(0,100) % 2) ? 'Female' : 'Male';
		}
	}