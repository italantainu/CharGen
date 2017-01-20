<?php
	class character {
		private $seed;
		private $gender;
		private $name;
		private $age;
		
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
			//for ($i=0;$i<10;$i++) echo "$i: ".mt_rand()."<br />";
			foreach (get_class_methods('character') as $method) {
				if (strlen($method) > 4 && substr($method, 0,4) == 'init') {
					//echo "Init '$method'<br />";
					$this->$method();
				}
			}
		}
		private function initGender() {
			$randomGender = (mt_rand(1,100) % 2);
			if ($this->gender == null) $this->gender = ($randomGender) ? 'Male' : 'Female';
		}

		private function initName() {
			//$names = array('Dwana Heth','Marc Ankney','Janey Contreras','Bradly Minch','Ines Spivey','Alex Lalonde','Luciano Ovitt','Kai Braxton','Ramona Thomsen','Angle Adcock','Easter Roma','Kiesha Manning','Granville Navarette','Agnes Cogdill','Sharolyn Hanchett','Jerrie Letsinger','Wilburn Prowse','Earl Bruner','Alvin Dombrowski','Luba Hoban');
			$maleNames = array('Nickolas Lepak','Winfred Slaybaugh','Myron Yankey','Sergio Thornley','Roland Newhard','Brent Kizer','Terrance Restivo','Elmer Peiffer','Kenton Fang','Reinaldo Glisson','Fredrick Thrush','Maria Denby','Lucas Constable','Bart Mcclaren','Stefan Hollow','Eldridge Hallenbeck','Rodolfo Bertram','Nathan Christner','Alonso Biron','Federico Vosburgh','Rod Vinci','Sonny Cheney','Harry Finke','Leroy Piro','Guillermo Curnutte','Erik Ouellette','Renato Valentine','Scotty Sparr','Mario Ahlquist','Micah Sommers');
			$femaleNames = array('Leola Transue','Mina Rodney','Bobette Becker','Larue Owen','Madlyn Jepsen','Francie Dial','Kallie Cerutti','Ester Jasmin','Nicki Scales','Leota Kilcrease','Shawnee Socia','Lashaunda Strock','Felicidad Thrush','Dominica Owsley','Madeleine Papenfuss','Glenda Sokol','Sarina Farraj','Wendi Secrest','Clementine Kendig','Dominque Closson','Vivienne Bert','Ariana Vadnais','Nu Tinsley','Tammy Parenteau','Marchelle Poitra','Lorie Hermosillo','Liza Hemenway','Shawnna Otter','Vonnie Dipalma','Danyell Grande');
			if ($this->gender == 'Male'){
				$randomName = $maleNames[mt_rand(0,count($maleNames)-1)];
			} else {
				$randomName = $femaleNames[mt_rand(0,count($femaleNames)-1)];
			}
			if ($this->name == null) $this->name = $randomName;
		}
		private function initAge() {
			$this->age = mt_rand(12,90);
		}
		
		private function getName() {
			return $this->name;
		}
		private function getAge() {
			return $this->age;
		}
		private function getGender() {
			return $this->gender;
		}
		
		public function __construct($seed = null) {
			if ($seed === null) $seed = str_replace('.','',time()+microtime());
			$this->init($seed);
		}
		
		public function __get($name) {
			if (method_exists($this, $method = ('get'.ucfirst($name)))) {
				return $this->$method();
			} else {
				throw new Exception('Can\'t get property "'.$name.'"');
			}
		}
	}