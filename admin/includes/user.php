<?php

class User
{
	public static function find_all_users()
	{
		global $database;
		$result_set = $database->query("SELECT * FROM users");
		return $result_set;
	}

	public static function find_user_by_id($id)
	{
		global $database;
		$sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
		$result_set = $database->query($sql);
		$result = mysqli_fetch_assoc($result_set);
		return $result;
	}
}
