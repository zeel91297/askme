<?php
    class dbsubject{

        private static $con=null;
        public static function connect(){
            self::$con=mysqli_connect('localhost','root','','instaanswer');
            return self::$con;
        }
        public static function disconnect(){
            mysqli_close(self::$con);
            self::$con=NULL;
        }
        public function getAllSub(){
            $conn=dbsubject::connect();
            $sql="select * from subject_tbl";
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;
        }
        public function subjectInsert($_subname){
            $conn=dbsubject::connect();
            $sql="insert into subject_tbl
                (subject_name) 
                values('".$_subname."')";
            $result=$conn->query($sql);
            //echo $sql;
            dbsubject::disconnect();
            return $result;
        }
        public function subjectDelete($subject_id){
            $conn=dbsubject::connect();
            $sql="delete from subject_tbl where sub_id=".$subject_id;
            //echo $sql;
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;
        }
        public function subjectDelAll($all)
        {
            $conn=dbsubject::connect();
            $sql="delete from subject_tbl where sub_id IN ($all)";
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;
        }
        public function subjectUpdate($subject_id,$_subname)
        {
            $conn=dbsubject::connect();
            $sql="update sub_tbl set sub_name='".$_subname ."' where sub_id='".$subject_id."' ";
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;
        }

        public function getAllUsers()
        {
            $conn=dbsubject::connect();
            $sql="select * from user_tbl";
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;   
        }

        public function delAllUsers($all)
        {
            $conn=dbsubject::connect();
            $sql="delete from user_tbl where email_id IN ('$all')";
            echo $sql;
            $result=$conn->query($sql);
            dbsubject::disconnect();
            return $result;
        }
    }
?>