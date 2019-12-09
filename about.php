<?php 
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */
	
	$isForm = FALSE;
	$activePage = 'About';
	
	require 'header.php';

	function RenderTwitterLink($URL)
	{
		?>
		<a style="color:#00A3F3" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<?php
	}
	
	function RenderLinkedInLink($URL)
	{
		?>
		<a style="color:#0078B5" href="<?=$URL?>" target="_blank">
			<span class="fa-stack fa-1x">
				<i class="fas fa-square fa-stack-2x"></i>
				<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
			</span>
		</a>  
		<?php
	}
	
?>

	<div class="container-fluid">
	<div class="row">
	<div class="col-xl-9 col-lg-11 m-2 pb-4 rounded text-center text-light mx-auto">
	

			<section class="jumbotron text-center bg-dark border-primary border">
				<div class="container">
					<h1 class="jumbotron-heading">Improve Your DevOps Capability</h1>
					<p class="lead">This online DevOps Maturity Assessment questionnaire will help you understand your current strengths and weaknesses and then recommend resources that can support you in taking the next steps on your DevOps journey.</p>
					<p>
						<a href="<?='section-' . SectionNameToURLName($survey->sections[0]['SectionName'])?>" class="btn btn-primary">Start the Questionnaire</a>
					</p>
				</div>
			</section>
		
			<!-- Three columns of text below the jumbotron -->
			<div class="row">
			
				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="far fa-chart-bar fa-stack-1x"></i>
					</span>
					<h2>1. Understand where we are</h2>
					<p class="text-justify">We need to understand where each squad is in their DevOps journey. This tool will allow us to identify areas where we are strong and where we could improve.</p>
				</div><!-- /.col-lg-4 -->
			
				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-shoe-prints fa-stack-1x"></i>
					</span>
					<h2>2. Set goals and focus areas</h2>
					<p class="text-justify">Each squad picks one or two areas to improve on, discusses how we will measure progress and comes up with a plan.</p>
				</div><!-- /.col-lg-4 -->
		  

				<div class="col-lg-4">
					<span class="fa-stack fa-5x mb-4">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fas fa-trophy fa-stack-1x"></i>
					</span>
					<h2>3. Track your progress</h2>
					<p class="text-justify">You can re-run this tool as often as you like to track your progress and see where you have improved the most.</p>
		
				</div><!-- /.col-lg-4 -->
				
			</div><!-- /.row -->
		  
			<div class="row">
				<div class="col-lg-12">
					<p align="center"><em>This survey tool is anonymous. Data will only be shown in aggregated format.</em></p>
				</div>
			</div>		  
		
	
	</div><!-- /.col-lg-8 -->
	
	</div><!-- /.row -->
	
	</div><!-- /.container -->
	
<?php
	
	require 'footer.php';
	
?>		

	