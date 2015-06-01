<?php

class DbFM
{
	private $_db;
	function __construct()
	{
		if(is_file('db_fm.db'))
		{$this->_db= new PDO("sqlite:db_fm.db");}
	else{
						$this->_db= new SQLite3('db_fm.db');
		$this->_db->exec("CREATE TABLE Players(id INTEGER PRIMARY KEY AUTOINCREMENT,
									name TEXT,
									lastname TEXT,
									born DATE,
									Rating INTEGER)");
		$this->_db->exec("CREATE TABLE Teams(id INTEGER PRIMARY KEY AUTOINCREMENT,
									name TEXT,
									Rating INTEGER)");
	}}

	function SavePlayer($name,$lastname,$born,$Rating){
  	$dt=time();
  	$res=$this->_db->exec("INSERT INTO Players(id,name,lastname,born,Rating)
  		VALUES('$name','$lastname',$born,$Rating)");
  	if(!$res) echo 'Error SavePlayer'; 
  	else {echo "Игрок".$lastname.$name." сохранен!";}
  	}
	function GetPlayer(){
		$query=$this->_db->query("SELECT * FROM Players");
		return $res=$query->fetch(PDO::FETCH_NUM);
		
	}
	function DeletePlayer($id){
		$res=$this->_db->prepare("DELETE FROM Players WHERE id=:id");
		$res->execute(array(
			':id'=>$id));
		echo 'id='.$id.'DELETE!';
	}
	function AddTeam($name,$Rating=1000){
		$res=$this->_db->exec("INSERT INTO Teams(name,Rating)
  		VALUES('$name',$Rating)");
  		if(!$res) echo 'Error AddTeam'; 
	}
	function GetTeams(){
		$query=$this->_db->query("SELECT * FROM Teams ORDER BY id");
		foreach ($query as $item ) {
			echo "<br>".$item['id'].' - '.$item['name'].' - '.$item['Rating'];
		}
	}
	function DeleteTeam($id){
		$res=$this->_db->prepare("DELETE FROM Teams WHERE id=:id");
		$res->execute(array(
			':id'=>$id));
		echo ' <br>TEAM id='.$id.'DELETE!';
	}
}

?>