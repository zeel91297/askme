<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from 2code.info/demo/html/ask-me-html/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 15:51:27 GMT -->
<head>
    <?php
        include '../visitor/user_navbar.php';
		require '../shared/databaseQuestion.php';
		$obj=new dbquestion();
		$result1=$obj->questAnswerUser();
		$result2=$obj->getByQueRecent();
		$result3=$obj->getByLikes();
		$result4=$obj->noAnswer();


		$conn=new mysqli('localhost','root','','instaanswer');
    ?>
	<div class="section-warp ask-me">
		<div class="container clearfix">
			<div class="box_icon box_warp box_no_border box_no_background" box_border="transparent" box_background="transparent" box_color="#FFF">
				<div class="row">
					<div class="col-md-3">
						<h2>Welcome to Ask me</h2>
						<p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque.</p>
						<div class="clearfix"></div>
						<a class="color button dark_button medium" href="#">About Us</a>
						<a class="color button dark_button medium" href="#">Join Now</a>
					</div>
					<div class="col-md-9">
						<form class="form-style form-style-2">
							<p>
								<textarea rows="4" id="question_title" onfocus="if(this.value=='Ask any question and you be sure find your answer ?')this.value='';" onblur="if(this.value=='')this.value='Ask any question and you be sure find your answer ?';">Ask any question and you be sure find your answer ?</textarea>
								<i class="icon-pencil"></i>
								<span class="color button small publish-question">Ask Now</span>
							</p>
						</form>
					</div>
				</div><!-- End row -->
			</div><!-- End box_icon -->
		</div><!-- End container -->
	</div><!-- End section-warp -->
	
	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				
				<div class="tabs-warp question-tab">
		            <ul class="tabs">
		                <li class="tab"><a href="1que" class="current">All Questions</a></li>
		                <li class="tab"><a href="2que">Recent Questions</a></li>
		                <li class="tab"><a href="#">Recently Answered</a></li>
		                <li class="tab"><a href="#">No answers</a></li>
		            </ul>
		            <div class="tab-inner-warp" id="1que">
						<?php


							while($row=$result1->fetch_assoc())
							{
									//echo $row["que_id"];
									echo '<article class="question question-type-normal">';
								echo '<h2>';
									echo '<a href="single_question.php?queid='.$row["que_id"].'">'.$row["que_title"].'</a>';
								echo '</h2>';
								echo '<div class="question-author">';
									echo '<a href="#" original-title="ahmed" class="question-author-img tooltip-n"><span></span><img alt="" src="'.$row["profile_pic"].'"></a>';
								echo '</div>';
								echo '<div class="question-inner">';
									echo '<div class="clearfix"></div>';
									echo '<p class="question-desc">'.$row["que_desc"].'</p>';
									echo '<div class="question-details">';
										echo '<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>';
										echo '<span class="question-favorite"><i class="icon-star"></i></span>';
									echo '</div>';
									echo '<span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span>';
									echo '<span class="question-date"><i class="icon-time"></i>'.$row["que_date"].'</span>';

									$sql2="select COUNT(*) as total from ans_tbl where fk_que_id=".$row["que_id"];
									$result4=$conn->query($sql2);
									$row2=$result4->fetch_assoc();

									echo '<span class="question-comment"><a href="single_question.php?queid='.$row["que_id"].'"><i class="icon-comment"></i>'.$row2["total"].' Answer</a></span>';
									echo '<span class="question-view"><i class="icon-user"></i>70 views</span>';
									echo '<div class="clearfix"></div>';
								echo '</div>';
							echo '</article>';
							}
						?>
					</div>
					<div class="tab-inner-warp" id="2que">
						<?php
							while($row=$result2->fetch_assoc())
							{
									//echo $row["que_id"];
									echo '<article class="question question-type-normal">';
								echo '<h2>';
									echo '<a href="single_question.php?queid='.$row["que_id"].'">'.$row["que_title"].'</a>';
								echo '</h2>';
								echo '<div class="question-author">';
									echo '<a href="#" original-title="ahmed" class="question-author-img tooltip-n"><span></span><img alt="" src="'.$row["profile_pic"].'"></a>';
								echo '</div>';
								echo '<div class="question-inner">';
									echo '<div class="clearfix"></div>';
									echo '<p class="question-desc">'.$row["que_desc"].'</p>';
									echo '<div class="question-details">';
										echo '<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>';
										echo '<span class="question-favorite"><i class="icon-star"></i>5</span>';
									echo '</div>';
									echo '<span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span>';
									echo '<span class="question-date"><i class="icon-time"></i>'.$row["que_date"].'</span>';

									echo '<span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span>';
									echo '<span class="question-view"><i class="icon-user"></i>70 views</span>';
									echo '<div class="clearfix"></div>';
								echo '</div>';
							echo '</article>';
							}
						?>
					</div>
					<div class="tab-inner-warp" id="que3">
						<?php
							while($row=$result3->fetch_assoc())
							{
									//echo $row["que_id"];
									echo '<article class="question question-type-normal">';
								echo '<h2>';
									echo '<a href="single_question.php?queid='.$row["que_id"].'">'.$row["que_title"].'</a>';
								echo '</h2>';
								echo '<div class="question-author">';
									echo '<a href="#" original-title="ahmed" class="question-author-img tooltip-n"><span></span><img alt="" src="'.$row["profile_pic"].'"></a>';
								echo '</div>';
								echo '<div class="question-inner">';
									echo '<div class="clearfix"></div>';
									echo '<p class="question-desc">'.$row["que_desc"].'</p>';
									echo '<div class="question-details">';
										echo '<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>';
										echo '<span class="question-favorite"><i class="icon-star"></i>5</span>';
									echo '</div>';
									echo '<span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span>';
									echo '<span class="question-date"><i class="icon-time"></i>'.$row["que_date"].'</span>';

									echo '<span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span>';
									echo '<span class="question-view"><i class="icon-user"></i>70 views</span>';
									echo '<div class="clearfix"></div>';
								echo '</div>';
							echo '</article>';
							}
						?>
					</div>
					<div class="tab-inner-warp" id="que4">
						<?php
							while($row=$result4->fetch_assoc())
							{
									//echo $row["que_id"];
									echo '<article class="question question-type-normal">';
								echo '<h2>';
									echo '<a href="single_question.php?queid='.$row["que_id"].'">'.$row["que_title"].'</a>';
								echo '</h2>';
								echo '<div class="question-author">';
									echo '<a href="#" original-title="ahmed" class="question-author-img tooltip-n"><span></span><img alt="" src="'.$row["profile_pic"].'"></a>';
								echo '</div>';
								echo '<div class="question-inner">';
									echo '<div class="clearfix"></div>';
									echo '<p class="question-desc">'.$row["que_desc"].'</p>';
									echo '<div class="question-details">';
										echo '<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>';
										echo '<span class="question-favorite"><i class="icon-star"></i>5</span>';
									echo '</div>';
									echo '<span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span>';
									echo '<span class="question-date"><i class="icon-time"></i>'.$row["que_date"].'</span>';

									echo '<span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span>';
									echo '<span class="question-view"><i class="icon-user"></i>70 views</span>';
									echo '<div class="clearfix"></div>';
								echo '</div>';
							echo '</article>';
							}
						?>
					</div>
		        </div><!-- End page-content -->
			</div><!-- End main -->
			<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<?php

							
							$sql="SELECT count(*) as total from que_tbl";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							
							$sql1="SELECT count(*) as total from ans_tbl";
							$result1=$conn->query($sql1);
							$row1=$result1->fetch_assoc();
						?>
						<ul>
							<li><i class="icon-question-sign"></i>Questions ( <span><?php echo $row["total"]; ?></span> )</li>
							<li><i class="icon-comment"></i>Answers ( <span><?php echo $row1["total"]; ?></span> )</li>
						</ul>
					</div>
				</div>
		</div><!-- End row -->
	</section><!-- End container -->


</body>

<!-- Mirrored from 2code.info/demo/html/ask-me-html/blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 15:51:27 GMT -->
</html>