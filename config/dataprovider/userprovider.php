<?php


class UserProvider{


    static public function getUser($email, $password){
        $sql = ("SELECT `id`, `email`, `password`, fullName FROM `user` WHERE `email` = :email AND `password` = :password");
        return UserProvider::query($sql, [':email'=>$email, ':password'=>$password]);
    }

    static public function getUserByEmail($email){
        $sql = ("SELECT `id`, `email`, `password`, fullName FROM `user` WHERE `email` = :email");
        return UserProvider::query($sql, [':email'=>$email]);
    }

    static public function createUser($email, $password, $fullName){
        $sql = "INSERT INTO `user` (`email`, `password`, `fullName`) VALUES (:email, :password, :fullName)";
        UserProvider::execute($sql, [':email'=>$email, ':password'=>$password, ':fullName'=>$fullName]);
    }

    static public function getContacts($user_id){
        $sql = "SELECT * FROM contacts WHERE user_id = :user_id";
        return UserProvider::query($sql, [':user_id'=>$user_id]);
    }

    static public function search_contacts($search, $user_id){
        $sql = "SELECT * FROM contacts WHERE contact_name LIKE :search AND user_id = :user_id";
        return UserProvider::query($sql, [':search'=>'%'.$search.'%' , ':user_id'=>$user_id]);
    }

    static public function createContact($name, $email, $phone, $user_id){
        $sql = "INSERT INTO `contacts` (`contact_name`, `phone`, `email`, `user_id`) VALUES (:contact_name,:phone, :email, :user_id)";
        UserProvider::execute($sql, [':contact_name'=>$name, ':phone'=>$phone, ':email'=>$email, ':user_id'=>$user_id]);
    }

    static public function editContact($id, $name, $email, $phone){
        $sql = "UPDATE `contacts` SET `contact_name` = :contact_name, `phone` = :phone, `email` = :email WHERE `contact_id` = :id";

        UserProvider::execute($sql, [':contact_name'=>$name, ':phone'=>$phone, ':email'=>$email, ':id'=>$id]);
    }

    static public function deleteContact($id){
        $sql = "DELETE FROM `contacts` WHERE `contact_id` = :id";
        UserProvider::execute($sql, [':id' => $id]);
    }

    static public function execute($sql, $sql_parms){
        $db =  UserProvider::connect();
        if($db == null){
            return;
        }
        $smt = $db->prepare($sql);
        $smt->execute($sql_parms);

        $smt = null;
        $db = null;
    }


    static public function query($sql, $sql_parms = []){
        $db =  UserProvider::connect();
        if($db == null){
            return [];
        }
        
        $query = null;

        if(empty($sql_parms)){
            $query = $db->query($sql);
        }else{
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = null;
        $db = null;

        return $data;
    }

    static public function connect(){
        try{
            return new PDO(CONFIG['db'],CONFIG['db_user'],CONFIG['db_password']);

        }catch(PDOException $e){
            return null;
        }
    }
}

