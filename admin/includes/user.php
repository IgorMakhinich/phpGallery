<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_this_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        }
        return $the_object_array;
    }

    public static function find_all_users()
    {
//        global $database;
//        return $database->query("SELECT * FROM users");
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($id)
    {
        $result_set = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
        return mysqli_fetch_assoc($result_set);
    }

    public static function instantiation($the_record)
    {
        $the_object = new self;

        foreach ($the_record as $property => $value) {
            if ($the_object->has_the_property($property)) {
                $the_object->$property = $value;
            }
        }
        return $the_object;
    }

    private function has_the_property($property)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($property, $object_properties);
    }

}
