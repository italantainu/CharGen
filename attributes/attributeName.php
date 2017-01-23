<?php
	require_once 'attributes/attributeAbstract.php';
	
	class attributeName extends attributeAbstract {
		private $name;
		private $maleNames = array('Nickolas Lepak','Winfred Slaybaugh','Myron Yankey','Sergio Thornley','Roland Newhard','Brent Kizer','Terrance Restivo','Elmer Peiffer','Kenton Fang','Reinaldo Glisson','Fredrick Thrush','Maria Denby','Lucas Constable','Bart Mcclaren','Stefan Hollow','Eldridge Hallenbeck','Rodolfo Bertram','Nathan Christner','Alonso Biron','Federico Vosburgh','Rod Vinci','Sonny Cheney','Harry Finke','Leroy Piro','Guillermo Curnutte','Erik Ouellette','Renato Valentine','Scotty Sparr','Mario Ahlquist','Micah Sommers');
		private $femaleNames = array('Leola Transue','Mina Rodney','Bobette Becker','Larue Owen','Madlyn Jepsen','Francie Dial','Kallie Cerutti','Ester Jasmin','Nicki Scales','Leota Kilcrease','Shawnee Socia','Lashaunda Strock','Felicidad Thrush','Dominica Owsley','Madeleine Papenfuss','Glenda Sokol','Sarina Farraj','Wendi Secrest','Clementine Kendig','Dominque Closson','Vivienne Bert','Ariana Vadnais','Nu Tinsley','Tammy Parenteau','Marchelle Poitra','Lorie Hermosillo','Liza Hemenway','Shawnna Otter','Vonnie Dipalma','Danyell Grande');
		
		public function init($params) {
			if (isset($params['name'])) $this->name = $params['name'];
		}
		public function getAttributeName() {
			return "Name";
		}
		public function getAttributeValue() {
			if ($this->name == null) {
				$namearray = ($this->character->gender == "Male") ? $this->maleNames : $this->femaleNames;
				
				mt_srand($this->attributeSeed);
				$this->name = $namearray[mt_rand(0,count($namearray)-1)];
			}
			
			return $this->name;
		}
	}