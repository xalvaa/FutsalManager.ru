<?php
interface Man {
	//function RndAtributs();
	//function GetInfo();
	//function GetAtributs();
}


class Player implements Man
{
	private $name;
	private $lastName;
	private $born;
	private $atributs = array(
	"Атака" => 0,
	"Защита" => 0,
	"Выносливость" => 0,
		);

	function __construct($n,$ln,$b)	{
		$this->name=$n;
		$this->lastName=$ln;
		$this->born=$b;
		echo "Игрок ". $this->name.$this->lastName. " cоздан c Атрибутами:";
	}
class RndPlayer extends Player
{
	private $ArrNames = array("АЛЕКСАНДР","АЛЕКСЕЙ","АНАТОЛИЙ","АНДРЕЙ","АНТОН","АРКАДИЙ","БОРИС","ВАДИМ","ВАЛЕНТИН","ВАЛЕРИЙ");
	private $ArrlastNames = array("Петров","Голубев","Пупкин","Иванов","Сладков","Чуб","Татаренцев","Зюзин","Мацепура","Заварзин");
	private $ArrBorn = array("1988","1987","1986","1985","1984","1982","1981","1980","1989","1990");
	
		function __construct()
			{	
			$RndName = $this->ArrNames[array_rand($this->ArrNames)];
			$RndLastName = $this->ArrlastNames[array_rand ($this->ArrlastNames)];
			$RndBorn = $this->ArrBorn[array_rand($this->ArrBorn,1)];
			$this->name=$RndName;
			$this->lastName=$RndLastName;
			$this->born=$RndBorn;		
			echo "Игрок ". $RndName." ".$RndLastName." ".$RndBorn. " года рождения"." cоздан ";	}

		function RndAtribits()
			{
				
				$RndAtribits = array(
					'Атака' => rand(0,10),
					'Защита'=> rand(0,10),
					'Выносливость'=>rand(2,10),);  
					foreach($RndAtribits as $key => $val)
						{echo  "<br>".$key.$val ;
						$this->atributs[$key]=$val;}
						echo "<br><button>Сохранить игрока</button>";
			}	
	
}

$x = new RndPlayer;
$x->RndAtribits();










?>