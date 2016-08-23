<?php

class Database
{
	private $host = "localhost";
    private $dbname = "eriazan";
    private $username = "root";
    private $password = "password";
	private $db;

	public function __construct()
	{
		try {
			$this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->db->exec("SET NAMES 'utf8'");
		} catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	}

	public function create($table, $columns, $values)
	{
		try{
			$results = $this->db->prepare("INSERT INTO $table ($columns) VALUES ('$values')");
			$results->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	}

	public function select($table, $modifier)
	{
		try{
			$results = $this->db->prepare("SELECT * FROM $table $modifier");
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
        return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectAllWhere($table, $column, $value)
	{
		try{
			$results = $this->db->prepare("SELECT * FROM $table WHERE $column = '$value'");
            $results->bindParam(':value', $value);
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
        return $results->fetchAll(PDO::FETCH_ASSOC);
	}

    public function selectWhere($table, $column, $value)
	{
		try{
			$results = $this->db->prepare("SELECT * FROM $table WHERE $column = '$value'");
            $results->bindParam(':value', $value);
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
        return $results->fetch(PDO::FETCH_ASSOC);
	}

    public function selectDistinct($table, $column, $modifier)
	{
		try{
			$results = $this->db->prepare("SELECT DISTINCT $column FROM $table $modifier");
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
		return $results->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateProducts($id, $name, $price, $image, $category)
	{
		try{
			$results = $this->db->prepare("UPDATE products SET name = '$name', price = '$price', image = '$image', category = '$category' WHERE id = $id");
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
	}

	public function update($table, $values, $id)
	{
		foreach($values as $key => $value){
			try{
				$results = $this->db->prepare("UPDATE products SET $key = '$value' WHERE id = $id");
				$results->execute();
			}catch(Exception $e){
				echo $e->getMessage();
				exit;
			}
		}

	}

	public function delete($table, $column, $value)
	{
		try{
			$results = $this->db->prepare("DELETE FROM $table WHERE $column = $value");
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
	}

    public function count($table)
    {
        return count($table);
    }
}
