<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from 2code.info/demo/html/ask-me-html/blue/single_question.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 15:51:29 GMT -->
<head>
    <?php
        include '../visitor/user_navbar.php';
        $_queid=$_GET["queid"];
        //echo $_queid;
        
        require '../shared/databaseQuestion.php';
        $obj=new dbquestion();
        $result=$obj->questUser($_queid);
        $row=$result->fetch_assoc();
    ?>
		
	<div class="breadcrumbs">
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo $row["que_title"]; ?></h1>
				</div>
				<div class="col-md-12">
					<div class="crumbs">
						<a href="#">Home</a>
						<span class="crumbs-span">/</span>
						<a href="#">Questions</a>
						<span class="crumbs-span">/</span>
						<span class="current"><?php echo $row["que_title"]; ?></span>
					</div>
				</div>
			</div><!-- End row -->
		</section><!-- End container -->
	</div><!-- End breadcrumbs -->
	
	<section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<article class="question single-question question-type-normal">
					<h2>
						<a href="single_question.html"><?php echo $row["que_title"]; ?></a>
					</h2>
					<a class="question-report" href="#">Report</a>
					<div class="question-type-main"><i class="icon-question-sign"></i>Question</div>
					<div class="question-inner">
						<div class="clearfix"></div>
						<div class="question-desc">
							<p><?php echo $row["que_desc"]; ?></p>
						</div>
						<div class="question-details">
							<span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>
							<span class="question-favorite"><i class="icon-star"></i>5</span>
						</div>
						<span class="question-category"><a href="#"><i class="icon-folder-close"></i>wordpress</a></span>
						<span class="question-date"><i class="icon-time"></i><?php echo $row["que_date"]; ?></span>
						<span class="question-comment"><a href="#"><i class="icon-comment"></i>5 Answer</a></span>
						<span class="question-view"><i class="icon-user"></i>70 views</span>
						<span class="single-question-vote-result">+22</span>
						<ul class="single-question-vote">
							<li><a href="#" class="single-question-vote-down" title="Dislike"><i class="icon-thumbs-down"></i></a></li>
							<li><a href="#" class="single-question-vote-up" title="Like"><i class="icon-thumbs-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</article>
				
				<div class="share-tags page-content">
					<div class="question-tags"><i class="icon-tags"></i>
						<a href="#">wordpress</a>, <a href="#">question</a>, <a href="#">developer</a>
					</div>
					<div class="share-inside-warp">
						<ul>
							<li>
								<a href="#" original-title="Facebook">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#3b5997" span_hover="#666">
											<i i_color="#FFF" class="social_icon-facebook"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Facebook</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#00baf0" span_hover="#666">
											<i i_color="#FFF" class="social_icon-twitter"></i>
										</span>
									</span>
								</a>
								<a target="_blank" href="#">Twitter</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#ca2c24" span_hover="#666">
											<i i_color="#FFF" class="social_icon-gplus"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Google plus</a>
							</li>
							<li>
								<a href="#" target="_blank">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#e64281" span_hover="#666">
											<i i_color="#FFF" class="social_icon-dribbble"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Dribbble</a>
							</li>
							<li>
								<a target="_blank" href="#">
									<span class="icon_i">
										<span class="icon_square" icon_size="20" span_bg="#c7151a" span_hover="#666">
											<i i_color="#FFF" class="icon-pinterest"></i>
										</span>
									</span>
								</a>
								<a href="#" target="_blank">Pinterest</a>
							</li>
						</ul>
						<span class="share-inside-f-arrow"></span>
						<span class="share-inside-l-arrow"></span>
					</div><!-- End share-inside-warp -->
					<div class="share-inside"><i class="icon-share-alt"></i>Share</div>
					<div class="clearfix"></div>
				</div><!-- End share-tags -->
				
				<div class="about-author clearfix">
				    <div class="author-image">
				    	<a href="#" original-title="admin" class="tooltip-n"><img alt="" src="<?php echo $row['profile_pic']; ?>"></a>
				    </div>
				    <div class="author-bio">
				        <h4>About the Author</h4>
				        <?php echo $row["user_name"]; ?>
				    </div>
				</div><!-- End about-author -->

                <div id="commentlist" class="page-content">
                  <div class="boxedtitle page-title"><h2>Answers ( <span class="color"></span> )</h2></div>
				    <ol class="commentlist clearfix">
				<?php

                    $result1=$obj->getByQueid($_queid);
                    while($row1=$result1->fetch_assoc())
                    {
                        echo '';
                        
					    echo '<li class="comment">';
					        echo '<div class="comment-body comment-body-answered clearfix"> ';
					            echo '<div class="avatar"><img alt="" src="'.$row1["profile_pic"].'"></div>';
					            echo '<div class="comment-text">';
					                echo '<div class="author clearfix">';
					                	echo '<div class="comment-author"><a href="#">'.$row1["user_name"].'</a></div>';
					                	echo '<div class="comment-meta">';
					                        echo '<div class="date"><i class="icon-time"></i>'.$row1["ans_date"].'</div> ';
					                    echo '</div>';
					                echo '</div>';
					                echo '<div class="text"><p>'.$row1["ans_desc"].'</p>';
					                echo '</div>';
									echo '<div class="question-answered question-answered-done"><i class="icon-heart-empty"></i>'.$row1["ans_like"].'</div>';
					            echo '</div>';
					        echo '</div>';
                    }
                ?> 
				
					
					            
					    
					</ol><!-- End commentlist -->
				</div><!-- End page-content -->
				
				
				<!--<div class="post-next-prev clearfix">
				    <p class="prev-post">
				        <a href="#"><i class="icon-double-angle-left"></i>&nbsp;Prev question</a>
				    </p>
				    <p class="next-post">
				        <a href="#">Next question&nbsp;<i class="icon-double-angle-right"></i></a>                                
				    </p>
				</div>--><!-- End post-next-prev -->	
			</div><!-- End main -->
			<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<ul>
							<li><i class="icon-question-sign"></i>Questions ( <span>20</span> )</li>
							<li><i class="icon-comment"></i>Answers ( <span>50</span> )</li>
						</ul>
					</div>
				</div>
				<form method="post" action="postanswer.php?queid=<?php echo $_queid; ?>">
					<div class="widget widget_social">
					<h3 class="widget_title">Want to post answer?</h3>
					<input type="submit" id="publish-question" value="Publish Your Answer" class="button red-button small submit">
				</div>
				</form>
			</aside><!-- End sidebar -->
		</div><!-- End row -->
	</section><!-- End container -->
	
	
</body>

<!-- Mirrored from 2code.info/demo/html/ask-me-html/blue/single_question.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jul 2017 15:51:29 GMT -->
</html>