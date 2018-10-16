<?php 
	/* Copyright 2018 Atos SE and Worldline
	 * Licensed under MIT (https://github.com/atosorigin/DevOpsMaturityAssessment/blob/master/LICENSE) */

	require 'survey.php'; 
	
	$survey = new Survey;
	
	// Create an array to represent the navbar buttons
	$navBar = array (
		'Questionaire' => array ('Url' => 'section-' . SectionNameToURLName($survey->sections[0]['SectionName']), 'Type' => 'Standard'),
		'Sections' => array ('Type' => 'Dropdown' ),
				// Sub-menus for each page are added here (see below)
		'Results' => array ('Url' => 'results', 'Type' => 'Standard' ),
		'Detailed Reports' => array ('Type' => 'Dropdown', 'Items' => array (
				'Download CSV' => array('Url' => 'devops-maturity-csv.php', 'Type' => 'Standard'),
				'Divider1' => array('Type' =>'Divider') ) ),
				// Sub-menus for detailed reports are added here, see below
		'About' => array ('Url' => 'about', 'Type' => 'Standard' ) );
	
	// Add the sub-menus for each page of the survey, and also for the detailed reports
	foreach ($survey->sections as $section)
	{
		$navBar['Sections']['Items'][$section['SectionName']]['Url'] = 'section-' . SectionNameToURLName($section['SectionName']);
		$navBar['Sections']['Items'][$section['SectionName']]['Type'] = 'Standard';
		if ( $section['HasSubCategories'] )
		{
			$navBar['Detailed Reports']['Items'][$section['SectionName']]['Url'] = 'results-' . SectionNameToURLName($section['SectionName']);
			$navBar['Detailed Reports']['Items'][$section['SectionName']]['Type'] = 'Standard';
		}
	}
	 
	function SectionNameToURLName($sectionName) {
		return strtolower(str_replace(',', '', str_replace(' ', '-', $sectionName)));
	}
	
	function RenderNavBarButtons($navBar)
	{
		foreach ($navBar as $index=>$navBarButton)
		{
			switch ( $navBarButton['Type'] ) {
				case 'Standard':
					RenderStandardNavBarButton($index, $navBarButton['Url']);
					break;
				case 'Dropdown':
					RenderDropdownNavBarButton($index, $navBarButton);
					break;
			}
		}
	}
	
	function OnClickHandler($url)
	{
		global $isForm;
		if ( $isForm )
		{
			// If the page contains a form then we need to set the form action and submit
			return "$('form').attr('action', '$url'); $('form').submit();";
		}
		else
		{
			// If the page is not a form then just navigate to the right URL
			return "window.location = '$url';";
		}
	}
	
	function RenderStandardNavBarButton($buttonText, $url)
	{
		// Check if this is the button for the current page, and if so style it accordingly
		global $activePage;
		$active = '';
		if ($activePage == $buttonText)
		{
			$active = ' active';
		}
		?>
		<li>
			<a href="#" class="nav-link<?=$active?>" onclick="<?=OnClickHandler($url)?>"><?=$buttonText?></a>
		</li>
		<?php
	}
	
	function RenderDropdownNavBarButton($buttonText, $navBarButton)
	{
		// Check if this is the button for the current page, and if so style it accordingly
		global $activePage;
		$active = '';
		if ($activePage == $buttonText)
		{
			$active = ' active';
		}
		?>
		<li class="navbar-item dropdown">
			<a href="#" class="nav-link dropdown-toggle<?=$active?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?=$buttonText?>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<?php foreach ($navBarButton['Items'] as $index=>$dropdownItem) { 
					switch ( $dropdownItem['Type'] ) {
						case 'Standard': ?>
							<a class="dropdown-item" href="#" onclick="<?=OnClickHandler($dropdownItem['Url'])?>"><?=$index?></a>
							<?php break;
						case 'Divider': ?>
							<div class="dropdown-divider"></div>
							<?php break;
					}
				}?>
			</div>
		</li>
		<?php
	}
	
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="fontawesome/css/all.css" rel="stylesheet">

		<title>DevOps Maturity Assessment</title>
		<script src="./js/chart.bundle.min.js"></script>		
		<style>
			#bigwrapper {
				background-image: Url('backdrop.jpg');
				background-height: 100%;
				background-repeat: no-repeat;
				background-position: top center;
				background-attachment: fixed;
				padding-top: 100px;
			}
		</style>
		
	</head>
	
	<body id="bigwrapper">

	<nav class="navbar navbar-default navbar-dark fixed-top navbar-expand-md form-group" style="background-color: #000000;">
		<a href="#" class="navbar-brand">DevOps Maturity Assesment</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<?php RenderNavBarButtons($navBar); ?>
			</ul>
		</div>
	</nav>	
	