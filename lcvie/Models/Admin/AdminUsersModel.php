<?php

class AdminUsersModel extends Driver{

    public function getUser(){

       
        $sql = "SELECT * FROM users 
                INNER JOIN grades 
                ON users.id_g = grades.id_g";
        $result = $this->getRequest($sql);

        
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabUser = [];

        foreach($rows as $row){
            $user = new Users();
            $user->setIdU($row->id_u);
            $user->setLastname($row->lastname);
            $user->setfirstname($row->firstname);
            $user->setEmail($row->email);
            $user->setImageU($row->image_u);
            $user->getGrade()->setIdG($row->id_g);
            $user->getGrade()->setNameG($row->name_g);
            $user->setState($row->state);
            
            array_push($tabUser, $user);

        }
        
            return $tabUser; 
        


    } 

    public function updateState(Users $user){

        $sql = "UPDATE users SET state = :state
                WHERE id_u = :id";
        $result = $this->getRequest($sql,["state"=>$user->getState(),
                                          "id" => $user->getIdU()]);

        return $result->rowCount();
    }

    public function deleteUser($id){

        $sql = "DELETE FROM users
                WHERE id_u = :id";
        $result = $this->getRequest($sql, ["id" => $id]);

        $nb = $result->rowCount();
        return $nb;


    }
    public function selectUser($id){

        $sql = "SELECT * FROM users u
                INNER JOIN grades g
                ON u.id_g = g.id_g
                WHERE id_u = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        
        $row = $result->fetch(PDO::FETCH_OBJ);

        $user = new Users();
            $user->setIdU($row->id_u);
            $user->setLastname($row->lastname);
            $user->setfirstname($row->firstname);
            $user->setEmail($row->email);
            $user->getGrade()->setIdG($row->id_g);
            $user->getGrade()->setNameG($row->name_g);

        return $user;
         

    }
    

    public function updateUser(Users $user){
        
       

        $sql = "UPDATE `users` 
                SET `email`= :email,
                    `id_g`= :id_g,
                    `image_u`= :image_u
                Where id_u = :id_u";

                $tabSet= ["email"=>$user->getEmail(),
                          "id_g"=>$user->getGrade()->getIdG(),
                          "id_u"=>$user->getIdU(),
                          "image_u"=>$user->getImageU()
                        ];
    
    $result = $this->getRequest($sql, $tabSet);
     
    return $result->rowCount();

    }


    
    Public function addUser($user){

        $sql = "INSERT INTO users (lastname, firstname, state, pass, image_u, email, id_g)
                VALUES (:lastname, :firstname,:state, :pass, :image, :email, :id_g)";
        $settings = ["lastname"=>$user->getLastname(),
                     "firstname"=>$user->getFirstname(),
                     "state"=>$user->getState(),
                     "pass"=>$user->getPass(),
                     "image"=>$user->getImageU(),
                     "email"=>$user->getEmail(),
                     "id_g"=>$user->getGrade()->getIdG()
                    ]; 
        $result = $this->getRequest($sql, $settings);

        return $result;
    }

    public function signIn($email, $pass){

        $sql = "SELECT * FROM users
                WHERE  email =:email  AND pass = :pass";
        $result = $this->getRequest($sql, ['email'=>$email, 'pass'=>$pass]);

        $row = $result->fetch(PDO::FETCH_OBJ);

        return $row;
    }
}

?>