<?php
    class dbanswer{

        private static $con=null;
        public static function connect(){
            self::$con=mysqli_connect('localhost','root','','instaanswer');
            return self::$con;
        }
        public static function disconnect(){
            mysqli_close(self::$con);
            self::$con=NULL;
        }
        public function getAllQuestions(){
            $conn=dbanswer::connect();
            $sql="select * from que_tbl";
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function questionInsert($_qtitle,$_qdesc,$_qimg,$_mailid,$_subid,$_qdate){
            $conn=dbanswer::connect();
            $sql="insert into que_tbl
                (que_title,que_desc,que_img,fk_email_id,fk_sub_id,que_date) 
                values('".$_qtitle."','".$_qdesc."','".$_qimg."','".$_mailid."','".$_subid."','".system.date()."')";
            $result=$conn->query($sql);
            echo $sql;
            dbanswer::disconnect();
            return $result;
        }
        public function questionDelete($question_id){
            $conn=dbanswer::connect();
            $sql="select * from que_tbl where prod_id='.$question_id.'";
            $res=$conn->query($sql);          
            $row=$res->fetch_assoc();
            unlink($row["que_img"]);            
            $sql="delete from que_tbl where prod_id=".$question_id;
            //echo $sql;
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function questionUpdate($question_id,$_qtitle,$_qdesc,$_qimg,$_mailid,$_subid,$_qdate){
            $conn=dbanswer::connect();
            $sql="update que_tbl set que_title='".$_qtitle ."',que_desc='".$_qdesc ."',que_img='".$_qimg ."',fk_email_id='".$_mailid ."',fk_sub_id='".$_subid."' where que_id='".$question_id ."' ";
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
    }
?>