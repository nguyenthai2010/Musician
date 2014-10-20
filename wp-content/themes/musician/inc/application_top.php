<?php
	require_once('clsMobileDetect.php');
	$clsMobileDetect = new clsMobileDetect();
	############################## Device detection [Start] ############################
	$iMobile = FALSE;
	if($clsMobileDetect->isMobile())
	{
		$iMobile = TRUE;
		$GLOBALS['iMobile'] = TRUE;
	}
	$Ipad = FALSE;
	if($clsMobileDetect->isIpad())
	{
		$GLOBALS['Ipad'] = TRUE;
	}
	$iTablet = FALSE;
	if($clsMobileDetect->isTablet())
	{
		$GLOBALS['iTablet'] = TRUE;
	}
	$device_info = "Desktop";
	if($isIpad == true)
		$device_info = "Ipad";
	else if($isTablet == true)
		$device_info = "Tablet";
	else if($isMobile == true)
		 $device_info = "Mobile";
	############################## Device detection [END] ############################
		
	