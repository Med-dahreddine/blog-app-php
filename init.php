<?php

    class Model{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'blog_oop';
        
        public $con = null;
        
        public function __construct(){
            //initialize connection property
             $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if($this->con->connect_error){
                echo "error" . $this->con->connect_error;
            }else{
                // echo 'succesful';
            }
        }

        public function insert(){
            if(isset($_POST['submit'])){
                if(isset($_POST['titre']) && isset($_POST['paragraphe'])){
                    if(!empty($_POST['titre']) && !empty($_POST['paragraphe'])){
                        
                        $titre =$_POST['titre'];
                        $paragraphe =$_POST['paragraphe'];
                        $user_id = 1;
                        $query = "INSERT INTO `article`(`titre`, `paragraphe`, `user_id`) VALUES ('$titre','$paragraphe','$user_id')";
                        // die($query);
                        // $query = "INSERT INTO article ( `titre`, `paragraphe`, `user_id`) VALUES (`$titre`,`$paragraphe`,`$user_id`)";
                        if($sql = $this->con->query($query)){ 
                            echo "<script>alert('article added successfully');</script>";

                        }else{
                            echo $this->con->error ;
                            // echo "<script>alert(".$this->con->error.");</script>";
                          
                        }
                    }else{
                        echo "<script>alert('empty');</script>";
                    }

                }
            }
        
        }

        public function fetch(){
            $data = [];
            $query = "SELECT * FROM article";
            if($result = $this->con->query($query)){
                while( $row = mysqli_fetch_assoc($result)){
                $data [] = $row;
                }
            }
            return $data;
        }

        public function delete($id){
            $query = "DELETE FROM article WHERE id = '$id' ";
            if($sql = $this->con->query($query)){
                return true;
            }else{
                return false;
            }
        }
        
        public function fetch_single($id){
            $data = null;
            $query = "SELECT * FROM article WHERE id = '$id'";
            
            if($sql = $this->con->query($query)){
                while( $row = $sql->fetch_assoc()){
                $data = $row;
                }
            }
            return $data;
        }

        public function edit($id){
            $data = [];
            $query = "SELECT * FROM article WHERE id = '$id'";
            if($sql = $this->con->query($query)){
                while( $row = $sql->fetch_assoc()){
                $data = $row;
                }
            }
            return $data;
        }

        public function update($data){

            $query = " UPDATE article SET titre='$data[titre]' , paragraphe='$data[paragraphe]'";
        
            if($sql = $this->con->query($query)){
                return true;
            }else{
                return false;
            }
        }
    }

    

?>