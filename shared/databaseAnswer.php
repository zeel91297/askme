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
        public function getAllAnswers(){
            $conn=dbanswer::connect();
            $sql="select * from ans_tbl";
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function answerInsert($_adesc,$_aimg,$_queid,$_mailid){
            $conn=dbanswer::connect();
            $sql="insert into ans_tbl
                (ans_desc,ans_img,fk_que_id,fk_email_id,ans_date) 
                values('".$_adesc."','".$_aimg."','".$_queid."','".$_mailid."','".date("Y-m-d")."')";
            $result=$conn->query($sql);
            echo $sql;
            dbanswer::disconnect();
            return $result;
        }
        public function answerDelete($answer_id){
            $conn=dbanswer::connect();
            $sql="select * from ans_tbl where prod_id='.$answer_id.'";
            $res=$conn->query($sql);          
            $row=$res->fetch_assoc();
            unlink($row["ans_img"]);            
            $sql="delete from ans_tbl where prod_id=".$answer_id;
            //echo $sql;
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function answerDelAll($all)
        {
            $conn=dbanswer::connect();
            $sql="delete from ans_tbl where ans_id IN ($all)";
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function getAnsDetail($answer_id)
        {
            $conn=dbanswer::connect();
            //$sql="select * from ans_tbl where ans_id=".$answer_id;
            $sql="select q.*,s.*,a.* from que_tbl q,subject_tbl s,ans_tbl a where q.que_id=a.fk_que_id AND q.fk_sub_id=s.sub_id AND a.ans_id=".$answer_id;
            //echo $sql;
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
        public function answerUpdate($answer_id,$_adesc,$_aimg){
            $conn=dbanswer::connect();
            $sql="update ans_tbl set ans_desc='".$_adesc ."',ans_img='".$_aimg ."' where ans_id='".$answer_id."' ";
            $result=$conn->query($sql);
            dbanswer::disconnect();
            return $result;
        }
    }
?>