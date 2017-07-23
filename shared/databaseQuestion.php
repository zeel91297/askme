<?php
    class dbquestion{

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
            $conn=dbquestion::connect();
            $sql="select * from que_tbl";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        public function questionInsert($_qtitle,$_qdesc,$_qimg,$_mailid,$_subid){
            $conn=dbquestion::connect();
            $sql="insert into que_tbl
                (que_title,que_desc,que_img,fk_email_id,fk_sub_id,que_date) 
                values('".$_qtitle."','".$_qdesc."','".$_qimg."','".$_mailid."','".$_subid."','".date("Y-m-d")."')";
            $result=$conn->query($sql);
            echo $sql;
            dbquestion::disconnect();
            return $result;
        }
        public function questionDelete($question_id){
            $conn=dbquestion::connect();
            $sql="select * from que_tbl where prod_id='.$question_id.'";
            $res=$conn->query($sql);          
            $row=$res->fetch_assoc();
            unlink($row["que_img"]);            
            $sql="delete from que_tbl where prod_id=".$question_id;
            //echo $sql;
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        public function questionUpdate($question_id,$_qtitle,$_qdesc,$_qimg,$_mailid,$_subid,$_qdate){
            $conn=dbquestion::connect();
            $sql="update que_tbl set que_title='".$_qtitle ."',que_desc='".$_qdesc ."',que_img='".$_qimg ."',fk_email_id='".$_mailid ."',fk_sub_id='".$_subid."' where que_id='".$question_id ."' ";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        public function getQuesDetail($question_id)
        {
            $conn=dbquestion::connect();
            //$sql="select q.*,s.* from que_tbl q,subject_tbl s where s.sub_id=q.fk_sub_id AND q.que_id=".$question_id;
            $sql="select q.*,s.* from que_tbl q,subject_tbl s where q.que_id=".$question_id." AND q.fk_sub_id=s.sub_id" ;
            //echo $sql;
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        public function delAllQuest($all)
        {
            $conn=dbquestion::connect();
            $sql="delete from que_tbl where que_id IN ($all)";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        public function questAnswerUser()
        {
            $conn=dbquestion::connect();
            //$sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND q.fk_email_id=u.email_id";
            $sql="select q.*,u.* from que_tbl q,user_tbl u where q.fk_email_id=u.email_id";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;    
        }

        public function questUser($question_id)
        {
            $conn=dbquestion::connect();
            //$sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND q.fk_email_id=u.email_id";
            $sql="select q.*,u.* from que_tbl q,user_tbl u where q.fk_email_id=u.email_id AND q.que_id=".$question_id;
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;    
        }

        public function getByQue()
        {
            $conn=dbquestion::connect();
            //$sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id GROUP BY q.que_id";
            //maybe wrong $sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id AND  GROUP BY q.que_id";
            $sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND a.fk_email_id=u.email_id";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }

        public function getByQueid($question_id)
        {
            $conn=dbquestion::connect();
            //$sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id GROUP BY q.que_id";
            //maybe wrong $sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id AND  GROUP BY q.que_id";
            $sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND a.fk_email_id=u.email_id AND q.que_id=".$question_id;
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }

        public function getByLikes()
        {
            $conn=dbquestion::connect();
            $sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND a.fk_email_id=u.email_id ORDER BY `a`.`ans_like` ASC";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }

        public function getByQueRecent()
        {
            $conn=dbquestion::connect();
            //$sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id GROUP BY q.que_id";
            //maybe wrong $sql="select q.que_id,a.*,COUNT(a.ans_id) from que_tbl q LEFT JOIN ans_tbl a ON q.que_id=a.fk_que_id AND  GROUP BY q.que_id";
            $sql="select q.*,a.*,u.* from que_tbl q,ans_tbl a,user_tbl u where q.que_id=a.fk_que_id AND a.fk_email_id=u.email_id ORDER BY `q`.`que_date` DESC";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }
        
        public function noAnswer()
        {
            $conn=dbquestion::connect();
            $sql="select q.*,u.* from que_tbl q,user_tbl u where q.fk_email_id=u.email_id AND q.que_flag=0";
            $result=$conn->query($sql);
            dbquestion::disconnect();
            return $result;
        }

    }
?>