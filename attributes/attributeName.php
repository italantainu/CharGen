<?php
	require_once 'attributes/attributeAbstract.php';
	
	class attributeName extends attributeAbstract {
		private $firstName;
		private $surName;
		private $maleNames = array('Nickolas','Winfred','Myron','Sergio','Roland','Brent','Terrance','Elmer','Kenton','Reinaldo','Fredrick','Maria','Lucas','Bart','Stefan','Eldridge','Rodolfo','Nathan','Alonso','Federico','Rod','Sonny','Harry','Leroy','Guillermo','Erik','Renato','Scotty','Mario','Micah');
		private $femaleNames = array('Leola','Mina','Bobette','Larue','Madlyn','Francie','Kallie','Ester','Nicki','Leota','Shawnee','Lashaunda','Felicidad','Dominica','Madeleine','Glenda','Sarina','Wendi','Clementine','Dominque','Vivienne','Ariana','Nu','Tammy','Marchelle','Lorie','Liza','Shawnna','Vonnie','Danyell');
		private $surNames = array('Lepak','Slaybaugh','Yankey','Thornley','Newhard','Kizer','Restivo','Peiffer','Fang','Glisson','Thrush','Denby','Constable','McClaren','Hollow','Hallenbeck','Bertram','Christner','Biron','Vosburgh','Vinci','Cheney','Finke','Piro','Curnutte','Ouellette','Valentine','Sparr','Ahlquist','Sommers','Grande','Dipalma','Otter','Hemenway','Hermosillo','Poitra','Parenteau','Tinsley','Vadnais','Bert','Closson','Kendig','Secrest','Transue','Rodney','Becker','Owen','Jepsen','Dial','Cerutti','Jasmin','Scales','Kilcrease','Socia','Strock','Thrush','Owsley','Papenfuss','Sokol','Farraj');
		
		public function init($params) {
			if (isset($params['firstName'])) $this->firstName = $params['firstName'];
			if (isset($params['surName'])) $this->surName = $params['surName'];
		}
		public function getAttributeName() {
			return "Name";
		}
		public function getAttributeValue() {
			$namearray = ($this->character->gender == "Male") ? $this->maleNames : $this->femaleNames;
			
			mt_srand($this->attributeSeed);
			$firstnameIndex = mt_rand(0,count($namearray)-1);
			$surnameIndex = mt_rand(0,count($this->surNames)-1);
			
			if ($this->firstName == null) $this->firstName = $namearray[$firstnameIndex];
			if ($this->surName == null) $this->surName = $this->surNames[$surnameIndex];
			
			return $this->firstName." ".$this->surName;
		}
	}