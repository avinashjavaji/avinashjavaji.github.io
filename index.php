<?
include 'connect.php';
$query = 'SELECT * FROM website_count';
$data = mysql_fetch_array(mysql_query($query));
$new_count = $data[0]+1;
$query = 'UPDATE website_count SET count = "'.$new_count.'";';
mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="res/images/favicon_sensograph.png">
<link rel="stylesheet" href="../sensograph/res/normalize.css" />
<title>Triangles SensoGraph</title>

<style>
/*#278BB0*/
@font-face{
	font-family: 'Rawengulk';
	font-style: normal;
	font-weight: 300;
	src: local('Rawengulk'), url('res/rawengulk/RawengulkBold.ttf') format('truetype');
}
@font-face{
	font-family: 'Caviar';
	font-style: normal;
	src: local('Rawengulk'), url('res/caviar_dreams/CaviarDreams.ttf') format('truetype');
}
@font-face{
	font-family: 'Giger';
	font-style: normal;
	src: local('Giger'), url('res/giger/giger.otf') format('truetype');
}
html{
	width: 100%;
	height: 100%;
	border: 0px;
	margin: 0px;
}
body{
	width: 100%;
	height: 100%;
	border: 0px;
	margin: 0px;
}
#divHead{
	display: table;
	margin: 0 auto;
	width:1000px;
	height:100px;
	background-color:#F8F8F8;
	box-shadow: 0px 0px 5px 0px #AAA;
}
#divBody{
	display: table;
	margin: 0 auto;
	width:1000px;
	height:300px;
	background-color:#F8F8F8;
	box-shadow: 0px 0px 5px 0px #AAA;
	/*border-top:1px solid black;*/
}
.navTd{
	width:100px;
	height:25px;
	background-size:100px 120px;
	background-repeat:no-repeat;
	text-align:center;
	font-family:"Giger";
	cursor:pointer;
	color:#b0b0b0;
	transition-duration:0.4s;
	-webkit-transition-duration:0.4s;
	-moz-transition-duration:0.4s;
	vertical-align:middle;
	
}
.navTd:hover{
	color:#404040;
}
.navTdSelect{
	width:100px;
	height:25px;
	background-size:100px 120px;
	background-repeat:no-repeat;
	text-align:center;
	font-family:"Giger";
	color:#278BB0;
	transition-duration:0.4s;
	-webkit-transition-duration:0.4s;
	-moz-transition-duration:0.4s;
}
#divBodyMain{
	height: 100%;
	width: 100%;
	vertical-align:top;
}
.buttons{
	color:#b0b0b0;
	cursor:pointer;
	font-family:Tahoma, Geneva, sans-serif;
	transition-duration:0.5s;
	-webkit-transition-duration:0.5s;
	-moz-transition-duration:0.5s;
}
.buttons:hover{
	color:#404040;
}
.buttonsSelected{
	color:#278BB0;
	font-family:Tahoma, Geneva, sans-serif;
	transition-duration:0.2s;
	-webkit-transition-duration:0.2s;
	-moz-transition-duration:0.2s;
}

.insideDivs{
	width:100%;
	height:100%;
	vertical-align:middle;
	display:none;
	margin: 0 auto;
}
.bulletNormal{
	transition-duration:0.5s;
	-webkit-transition-duration::0.5s;
	-moz-transition-duration:0.5s;
}
.bulletDown{
	transition-duration:0.5s;
	-webkit-transition-duration::0.5s;
	-moz-transition-duration:0.5s;
	transform:rotate(90deg);
	-webkit-transform:rotate(90deg);
	-moz-transform:rotate(90deg);
}
.imgPhoneLandscape{
	transform:rotate(90deg);
	-webkit-transform:rotate(90deg);
}
.transitions{
	transition: transform 1s;
	-webkit-transition: -webkit-transform 1s;
}
/* Contact Section */
.continue_botton{
	width:25%;
	text-align:center;
	vertical-align:top;
	color:#278BB0;
	font-size:16px;
	font-family:Tahoma, Geneva, sans-serif;
	cursor:pointer;
    transition: all 0.20s ease-in-out;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
}
.continue_botton:hover{
	border-bottom: #000 1px solid;
}
.form_label{
	font-size:16px;
	font-family:'Trebuchet MS';
	transition: all 0.20s ease-in-out;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
}
.form_label_selected{
	color:#278BB0;
}
.text{
	background-color:#FFFFFF;
	color:#000000;
	border:1px solid #AAA;
	margin: 0;
	padding-left:4px;
	padding-bottom:3px;
	padding-right:4px;
	padding-top:3px;
    transition: all 0.20s ease-in-out;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    outline:none;
}
.text:focus{
	-webkit-border-radius: 2px;
	-webkit-box-shadow: 0 1px 2px rgba(39, 139, 176, 0.6);
	box-shadow: 0 1px 2px rgba(39, 139, 176, 0.6);
	-moz-box-shadow: 0 1px 2px rgba(39, 139, 176, 0.6);
	border:1px solid #278BB0;
}
.textalert{/* For text boxes where the user has input something wrong */
	background-color:#FFFFFF;
	color:#000000;
	border: 1px solid #F30;
	margin: 0;
	padding-left:4px;
	padding-bottom:3px;
	padding-right:4px;
	padding-top:3px;
    transition: all 0.20s ease-in-out;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    outline:none;
}
.textalert:focus{
	-webkit-border-radius: 2px;
	box-shadow: 0 1px 2px rgba(255, 51, 0, 1);
	-webkit-box-shadow: 0 1px 2px rgba(255, 51, 0, 1);
	-moz-box-shadow: 0 1px 2px rgba(255, 51, 0, 1)
}
#form_submitted_div{
	font-size:16px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
.fieldstatus{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:10px;
	font-weight:100;
	display:none;
}
</style>
<script src="res/jquery.js"></script>
<script src="res/jquery.nicescroll.js"></script>
<script src="res/form.js"></script>
<script>
var windowHeight=0;
var canvas, canvasContext, animationInterval = null;
var cHeight = 306, halfCHeight = 153; cWidth = 206;
var tempCHeight = cHeight-44, tempHalfCHeight = (cHeight-44)/2, tempCWidth = cWidth, tempYOffset = 44;
var dataArr1 = [10,-5,25,10,15,-25,10,-15]; dataArr2 = new Array(69); dataArr3 = new Array(107);
var deg = 0;
var MODE = 0, TEMP_MODE = 0, HOME = 0, GRAPH = 1, SETTINGS = 2, LANDSCAPE = 3;
var amplitude = 20, zoom = 1, positivePeak = 0, negativePeak = 0;
var currentPage = 0, currentFeature = 0, currentUse = 0;
var peakLineWidth = 0.1;
var imgPhone = null, tempLogo = null, graphTop = null, settingsTop = null, ticMark = null, sensorsList = null;
var addPeakPoint = 0;
var ticMarkCount = 0, sensorsListAlpha = 0;
var canvasTransitioning = false, pageNavigating = false; canvasAlpha = 1;
var xOff = 21, yOff = 66;
var fadeInterval, fadeDirectionOut = true;

function id(id){
	return document.getElementById(id);
}

function initialise(){
	windowHeight = $(window).height();
	id('divBody').style.height = (windowHeight-100)+'px';
	//id('divHomeContent').style.top = (-$('#divHomeContent').height())+'px';
	
	$("#divUsesHolder").niceScroll({cursoropacitymin:.4,cursorcolor:"#888888",cursorborder:"none",cursorborderradius:"0px;",cursorwidth:"8px",backgroud:"#FF3300",autohidemode:true,scrollspeed:60});
	$("#divQuestionsHolder").niceScroll({cursoropacitymin:.4,cursorcolor:"#888888",cursorborder:"none",cursorborderradius:"0px;",cursorwidth:"8px",backgroud:"#FF3300",autohidemode:true,scrollspeed:60});
	//$("#divUses1").niceScroll({cursoropacitymin:.4,cursorcolor:"#888888",cursorborder:"none",cursorborderradius:"0px;",cursorwidth:"8px",backgroud:"#FF3300",autohidemode:false,scrollspeed:60});
	
	canvas = id('screenCanvas');
	canvasContext=canvas.getContext("2d");
	animationInterval = setInterval(function(){draw()},30);
	for(var i=0;i<dataArr2.length;i++)
		dataArr2[i] = Math.random()*amplitude*2-amplitude; //range: -25 to 25
	for(var i=0;i<dataArr3.length;i++)
		dataArr3[i] = Math.random()*amplitude*2-amplitude; //range: -25 to 25
			
	imgPhone = id('imgPhone');
	tempLogo = document.getElementById("tempLogo");
	graphTop = document.getElementById("graphTop");
	settingsTop = document.getElementById("settingsTop");
	ticMark = document.getElementById("ticMark");
	sensorsList = document.getElementById("sensorsList");
}

function navigate(newPage){
	if(currentPage!=newPage && !pageNavigating){
		$('#divUsesHolder').getNiceScroll().hide();
		$('#divQuestionsHolder').getNiceScroll().hide();
		$('#navButton'+currentPage).removeClass('navTdSelect');
		$('#navButton'+currentPage).addClass('navTd');
		$('#navButton'+newPage).removeClass('navTd');
		$('#navButton'+newPage).addClass('navTdSelect');
		pageNavigating = true;
		
		$('#divPage'+currentPage).fadeOut(500,function(){
			$('#divPage'+newPage).fadeIn(500,function(){pageNavigating = false;});
			if(newPage == 2){
				$('#divUsesHolder').getNiceScroll().show();
			}
			else if(newPage == 3){
				$('#divQuestionsHolder').getNiceScroll().show();
			}

		});
		
		var tempMode;
		if(newPage == 0){
			tempMode = HOME
		}
		else if(newPage == 1){
			if(currentFeature == 0 || currentFeature == 2 || currentFeature == 3)
				tempMode = GRAPH;
			else if(currentFeature == 4)
				tempMode = LANDSCAPE;
			else
				tempMode = SETTINGS;
		}
		else if(newPage == 2){
			tempMode = GRAPH;
		}
		else if(newPage == 3){
			tempMode = GRAPH;
		}
		else if(newPage == 4){
			tempMode = GRAPH;
		}
		
		if(tempMode != MODE){
			if(tempMode == LANDSCAPE){
				$('#imgPhone').addClass('imgPhoneLandscape');
				$('#screenCanvas').addClass('imgPhoneLandscape');
			}
			else{
				$('#imgPhone').removeClass('imgPhoneLandscape');
				$('#screenCanvas').removeClass('imgPhoneLandscape');
			}
			canvasFade(650,function(){
				MODE = tempMode;
				currentPage = newPage;
			});
		}
		else{
			currentPage = newPage;
		}
	}
}

function showFeature(newFeature){
	if(currentFeature != newFeature){
		$('#imgFeaturesBullet'+currentFeature).removeClass('bulletDown');
		$('#imgFeaturesBullet'+currentFeature).addClass('bulletNormal')
		$('#imgFeaturesBullet'+newFeature).removeClass('bulletNormal');
		$('#imgFeaturesBullet'+newFeature).addClass('bulletDown')
		$('#divFeaturesBody'+currentFeature).hide(500);
		$('#divFeaturesBody'+newFeature).show(500);
		if(newFeature == 0 || newFeature == 2 || newFeature == 3){
			TEMP_MODE = GRAPH;
			$('#imgPhone').removeClass('imgPhoneLandscape');
			$('#screenCanvas').removeClass('imgPhoneLandscape');
		}
		else if(newFeature  == 1 || newFeature == 5){
			TEMP_MODE = SETTINGS;
			$('#imgPhone').removeClass('imgPhoneLandscape');
			$('#screenCanvas').removeClass('imgPhoneLandscape');
		}
		else{
			TEMP_MODE = LANDSCAPE;
			$('#imgPhone').addClass('imgPhoneLandscape');
			$('#screenCanvas').addClass('imgPhoneLandscape');
		}
		if(TEMP_MODE != MODE){
			canvasFade(500,function(){
				currentFeature = newFeature;
				MODE = TEMP_MODE;
				if(newFeature == 3){
					positivePeak = negativePeak = 0;
					addPeakPoint = 1;
				}
				ticMarkCount = 0;
				sensorsListAlpha = 0;
				zoom = 1;
				clearInterval(animationInterval);
				animationInterval = setInterval(function(){draw()},30);
			});
		}
		else{
			currentFeature = newFeature;
			MODE = TEMP_MODE;
			if(newFeature == 3){
				positivePeak = negativePeak = 0;
				addPeakPoint = 1;
			}
			ticMarkCount = 0;
			sensorsListAlpha = 0;
		}
	}
}

function showUse(newUse){
	if(newUse!=currentUse){
		$('#divUsesHolder').getNiceScroll().hide();
		$('#usesTitle'+currentUse).removeClass('buttonsSelected');
		$('#usesTitle'+currentUse).addClass('buttons');
		$('#usesTitle'+newUse).removeClass('buttons');
		$('#usesTitle'+newUse).addClass('buttonsSelected');
		$('#divUses'+currentUse).slideUp(650,function(){
			$('#divUses'+newUse).slideDown(650,function(){
				$('#divUsesHolder').getNiceScroll().resize();
				$('#divUsesHolder').getNiceScroll().show();
			});
		});
		currentUse = newUse;
	}
}

function draw(){
	canvasContext.clearRect(0,0,canvas.width,canvas.height);
	canvasContext.translate(xOff, yOff);
	canvasContext.globalAlpha = canvasAlpha;
	if(MODE == HOME){
		deg = 10+deg;
		canvasContext.drawImage(tempLogo,cWidth/2-50,50,100,100);
		canvasContext.beginPath();
		canvasContext.moveTo(0,halfCHeight+50);
		canvasContext.lineTo(20,halfCHeight+50);
		for(var i=0;i<dataArr1.length;i++)
			canvasContext.lineTo(23+i*20,halfCHeight+50+dataArr1[i]*2*Math.sin((Math.PI*deg+(100*i+20*i))/180));
		canvasContext.lineTo(cWidth-20,halfCHeight+50);
		canvasContext.lineTo(cWidth,halfCHeight+50);
		canvasContext.strokeStyle = '#000000';
		canvasContext.lineWidth = 1;
		canvasContext.stroke();
		canvasContext.globalAlpha = 1;
		canvasContext.translate(-xOff, -yOff);
		canvasContext.drawImage(imgPhone,0,0,250,450);
	}
	else if(MODE == GRAPH){
		canvasContext.drawImage(graphTop,0,0,cWidth,44);
		//grid lines
		canvasContext.beginPath();
		var noOfLines = Math.ceil(tempHalfCHeight/30);
		for(var i=1;i<noOfLines;i++){
			canvasContext.moveTo(1,tempYOffset+tempHalfCHeight-i*30);
			canvasContext.lineTo(tempCWidth-3.5,tempYOffset+tempHalfCHeight-i*30);
			canvasContext.moveTo(1,tempYOffset+tempHalfCHeight+i*30);
			canvasContext.lineTo(tempCWidth-3.5,tempYOffset+tempHalfCHeight+i*30);
		}
		canvasContext.strokeStyle = '#cccccc';
		canvasContext.lineWidth = 1;
		canvasContext.stroke();
		//data
		canvasContext.beginPath();
		canvasContext.moveTo(1,tempYOffset+tempHalfCHeight);
		var tempDataToDraw;
		for(var i=0;i<dataArr2.length;i++){
			tempDataToDraw = tempYOffset+tempHalfCHeight+dataArr2[i]*zoom;
			tempDataToDraw = (tempDataToDraw<45) ? 45 : tempDataToDraw;
			canvasContext.lineTo(1+i*3,tempDataToDraw);
		}
		dataArr2.splice(0,1);
		if(addPeakPoint >= 20 && zoom == 1){
			addPeakPoint = 0;
			dataArr2.push(-amplitude*3-Math.random()*amplitude*3);
		}
		else{
			if(addPeakPoint>0 && zoom == 1)
				addPeakPoint++;
			dataArr2.push(Math.random()*amplitude*2-amplitude);
		}
		canvasContext.strokeStyle = '#404040';
		canvasContext.lineWidth = 1;
		canvasContext.stroke();
		//axes
		canvasContext.beginPath();
		canvasContext.moveTo(1,tempYOffset+tempHalfCHeight);
		canvasContext.lineTo(tempCWidth,tempYOffset+tempHalfCHeight);
		canvasContext.strokeStyle = '#000000';
		canvasContext.stroke();
		//peak lines
		if(peakLineWidth > 0.1){
			var tempPos = Math.max.apply(Math, dataArr2);
			var tempNeg = Math.min.apply(Math, dataArr2);
			positivePeak = (tempPos>positivePeak) ? tempPos : positivePeak;
			negativePeak = (tempNeg<negativePeak) ? tempNeg : negativePeak;
			canvasContext.beginPath();
			canvasContext.moveTo(3.5,tempYOffset+tempHalfCHeight+positivePeak*zoom);
			canvasContext.lineTo(tempCWidth,tempYOffset+tempHalfCHeight+positivePeak*zoom);
			canvasContext.moveTo(3.5,tempYOffset+tempHalfCHeight+negativePeak*zoom);
			canvasContext.lineTo(tempCWidth,tempYOffset+tempHalfCHeight+negativePeak*zoom);
			canvasContext.strokeStyle = '#65C966';
			canvasContext.lineWidth = peakLineWidth;
			canvasContext.stroke();
		}

		if(currentFeature == 2){
			if(zoom<6)
				zoom += 0.5;
		}
		else{
			if(zoom>1)
				zoom -= 0.5;
		}
		if(currentFeature == 3){
			if(peakLineWidth<1)
				peakLineWidth += 0.1;
		}
		else{
			if(peakLineWidth>0.1)
				peakLineWidth -= 0.1;
		}
		canvasContext.globalAlpha = 1;
		canvasContext.translate(-xOff, -yOff);
		canvasContext.drawImage(imgPhone,0,0,250,450);
	}
	else if(MODE == SETTINGS){
		canvasContext.drawImage(settingsTop,0,0,cWidth,cHeight);
		if(!canvasTransitioning){
			if(currentFeature == 1){
				if(ticMarkCount<60)
					ticMarkCount++
				if(ticMarkCount>0)
					canvasContext.drawImage(ticMark,5.5,137.5,19,19);
				if(ticMarkCount>20)
					canvasContext.drawImage(ticMark,5.5,159.5,19,19);
				if(ticMarkCount>40)
					canvasContext.drawImage(ticMark,5.5,181.5,19,19);
			}
			if(currentFeature == 5){
				if(sensorsListAlpha<1)
					sensorsListAlpha+=0.1;
				canvasContext.globalAlpha = sensorsListAlpha;
				canvasContext.drawImage(sensorsList,7,80,135,143);
				canvasContext.globalAlpha = canvasAlpha;
			}
		}
		canvasContext.globalAlpha = 1;
		canvasContext.translate(-xOff, -yOff);
		canvasContext.drawImage(imgPhone,0,0,250,450);
	}
	else if(MODE == LANDSCAPE){
		canvasContext.globalAlpha = 1;
		canvasContext.translate(-xOff, -yOff);
		canvasContext.drawImage(imgPhone,0,0,250,450);
		canvasContext.globalAlpha = canvasAlpha;
		canvasContext.translate(xOff, yOff);
		
		canvasContext.fillStyle = '#f8f8f8';
		canvasContext.fillRect(1.4,-12,203.5,13);
		
		//grid lines
		canvasContext.beginPath();
		var noOfLines = Math.ceil((tempCWidth/2)/30);
		for(var i=1;i<noOfLines;i++){
			canvasContext.moveTo((tempCWidth/2)-i*30,cHeight-1);
			canvasContext.lineTo((tempCWidth/2)-i*30,-12);
			canvasContext.moveTo((tempCWidth/2)+i*30,cHeight-1);
			canvasContext.lineTo((tempCWidth/2)+i*30,-12);
		}
		canvasContext.strokeStyle = '#cccccc';
		canvasContext.lineWidth = 1;
		canvasContext.stroke();

		//data
		canvasContext.beginPath();
		canvasContext.moveTo(tempCWidth/2,cHeight-3.5);
		for(var i=0;i<dataArr3.length;i++)
			canvasContext.lineTo((tempCWidth/2)+dataArr3[i],cHeight-i*3);
		dataArr3.splice(0,1);
		dataArr3.push(Math.random()*amplitude*2-amplitude);
		canvasContext.strokeStyle = '#404040';
		canvasContext.lineWidth = 1;
		canvasContext.stroke();
		//axes
		canvasContext.beginPath();
		canvasContext.moveTo(tempCWidth/2,cHeight-1);
		canvasContext.lineTo(tempCWidth/2,-12);
		canvasContext.strokeStyle = '#000000';
		canvasContext.stroke();
		
		canvasContext.translate(-xOff, -yOff);
	}
}

function canvasFade(duration,func){
	if(!canvasTransitioning){
		canvasTransitioning = true;
		fadeInterval = setInterval(function(){
			if(fadeDirectionOut){
				canvasAlpha -= 0.1;
				canvasAlpha = Math.round(canvasAlpha*10)/10;
			}
			else{
				canvasAlpha += 0.1
				canvasAlpha = Math.round(canvasAlpha*10)/10;
			}
			if(canvasAlpha <= 0){
				fadeDirectionOut = false;
				func();
				clearInterval(animationInterval);
				animationInterval = setInterval(function(){draw()},30);
			}
			if(canvasAlpha >= 1){
				fadeDirectionOut = true;
				canvasTransitioning = false;
				clearInterval(fadeInterval);
			}
			
		},duration/20);
	}
}

</script>
</head>

<body onload="initialise();navigate(0);">
<div id="divHead">
  <table style="width:100%; height:100%; border-collapse:collapse;">
    	<tr style="height:100%">
        	<td style="width:50%; padding-left:10px;"><img src="res/images/logo/logo_text_125.png" style="height:80px; width:360px;" /></td>
            <td style="width:50%; vertical-align:middle; text-align:right; padding-right:20px;">
            	<a style="font-size:24px; font-family:Giger;">Developed by<br /><span style="color:#278bb0; cursor:pointer;" onclick="window.location='../';">Triangles</span></a>
            </td>
        </tr>
    </table>
</div>

<div id="divBody">
  <table style="width:100%; height:100%; border-collapse:collapse;">
    	<tr style="height:100%">
        	<td style="width:40%; text-align:center;">
            	<!-- Phone Images and canvas -->
            	<img id="tempLogo" src="res/images/logo_small_sensograph.png" style="display:none;">
                <img id="graphTop" src="res/images/canvas/graphTop.png" style="display:none;">
                <img id="settingsTop" src="res/images/canvas/settingsTop.png" style="display:none;">
                <img id="sensorsList" src="res/images/canvas/sensorsList.png" style="display:none;">
                <img id="ticMark" src="res/images/canvas/tic.png" style="display:none;"> <!--Size should be 19x19-->
                <img id="imgPhone" src="res/images/canvas/phone.png" style="display:none;" />
                <canvas id="screenCanvas" width="250" height="450" style="position:relative; left:20px;" class="transitions"></canvas>
                <!--<br />
                <img id="playStoreBadge" src="res/images/nav/new/sensorsList.png" style="border:1px solid black;" width="150px" height="50px" />-->
            </td>
            <td style="width:60%; height:100%; vertical-align:top; z-index:0;">
            	<!--MAKE WHOLE PAGE MORE RESPONSIVE and FLUID: put content into boxes with fixed size and make position of these boxes flexible-->
            	<table style="width:100%; height:100%; vertical-align:top;">
                    <tr style="height:50px;">
                        <td>
                            <!--Navigation-->
                            <table style="width:80%; height:50px; margin: 0 auto; border-collapse:collapse; font-size:24px;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td id="navButton0" class="navTdSelect" onclick="navigate(0);" style="text-align:left;">Home</td>
                                    <td id="navButton1" class="navTd" onclick="navigate(1);" style="text-align:left;">Features</td>
                                    <td id="navButton2" class="navTd" onclick="navigate(2);">Uses</td>
                                    <td id="navButton3" class="navTd" onclick="navigate(3);" style="text-align:right">Questions</td>
                                    <td id="navButton4" class="navTd" onclick="navigate(4);" style="text-align:right">Contact</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--Body-->
                            <div id="divBodyMain" style="width:80%; margin: 0 auto;">
                                <!--HOME-->
                                <div id="divPage0" class="insideDivs" style="display:block;vertical-align:middle;">
                                    <!--<div id="divSpacing" style="height:15%;">
                                        &nbsp;
                                    </div>-->
                                    <div id="divHomeContent" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:16px; width:400px; display:table-cell;">
                                    	<br />
                                        <span style="color:#278bb0;">SensoGraph</span> is an advanced, yet intuitive, graphing application for sensor data on android.
                                        <br /><br />
                                        It allows you to accurately visualise the data from different sensors on an interactive graph.
                                        <br /><br />
                                        Whether you’re a developer in need of a sensor analysis tool or an everyday user  looking to play around with your device, try this app and you’ll find a use of your own for it.
                                        <br /><br />
                                        It's completely free.
                                        <br /><br /><br />
                                        <a href="https://play.google.com/store/apps/details?id=com.triangles.sensograph" target="_blank">
                                          <img alt="Get it on Google Play"
                                               src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png"/>
                                        </a>
                                    </div>
                                </div>
                                <!--FEATURES-->
                                <div id="divPage1" class="insideDivs" style="width:100%;">
                                    <div id="divSpacing" style="height:50px;">
                                        &nbsp;
                                    </div>
                                    <!-- Interactive graph -->
                                    <div id="divFeatures0" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle0" onclick="showFeature(0);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet0" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletDown" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">Interactive Graph</a>
                                        </span><br />
                                        <div id="divFeaturesBody0" style="border: 0px solid black;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Zoom and pan in horizontal and vertical directions</li>
                                                <li>Pause and play with a tap</li>
                                                <li>When paused view data history</li>
                                                <li>Reset basic settings to default with a double tap</li>
                                            </ul>
                                            <!--<div style="border:1px solid black;" id="divFeatureSpace0">
                                                asfer
                                            </div>-->
                                        </div>
                                    </div>
                                    <a style="font-size:9px"><br /></a>
                                    <!-- Multiple axes and mean plot -->
                                    <div id="divFeatures1" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle1" onclick="showFeature(1);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet1" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletNormal" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">Multiple axes and mean plot</a>
                                        </span><br />
                                        <div id="divFeaturesBody1" style="display:none;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Graph individual or all axes if a sensor provides data in the x, y and z axes directions.</li>
                                            </ul>
                                            <!--<div style="border:1px solid black;" id="divFeatureSpace1">
                                                waeff
                                            </div>-->
                                        </div>
                                    </div>
                                    <a style="font-size:9px"><br /></a>
                                    <!-- Most accurate data available -->
                                    <div id="divFeatures2" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle2" onclick="showFeature(2);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet2" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletNormal" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">Most accurate data available</a>
                                        </span><br />
                                        <div id="divFeaturesBody2" style="display:none;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Graphs the most accurate data that your device’s sensor can provide by using the highest refresh rate</li>
                                            </ul>
                                            <!--<div style="border:1px solid black;" id="divFeatureSpace2">
                                                wefwef
                                            </div>-->
                                        </div>
                                    </div>
                                    <a style="font-size:9px"><br /></a>
                                    <!-- Peak lines -->
                                    <div id="divFeatures3" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle3" onclick="showFeature(3);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet3" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletNormal" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">Peak lines</a>
                                        </span><br />
                                        <div id="divFeaturesBody3" style="display:none;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Set peak lines that record the highest values achieved</li>
                                                <li>Fix a value and get the device to vibrate when data crosses peak value.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a style="font-size:9px"><br /></a>
                                    <!-- Full screen graph -->
                                    <div id="divFeatures4" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle4" onclick="showFeature(4);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet4" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletNormal" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">Full screen graph</a>
                                        </span><br />
                                        <div id="divFeaturesBody4" style="display:none;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Choose your sensor and settings and then switch to landscape view to get a full screen graph</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a style="font-size:9px"><br /></a>
                                    <!-- All common sensors supported -->
                                    <div id="divFeatures5" style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
                                        <span id="divFeaturesTitle5" onclick="showFeature(5);" style="cursor:pointer;">
                                            <img id="imgFeaturesBullet5" src="res/images/bullet.png" style="width:14px;height:14px;" class="bulletNormal" />
                                            &nbsp;&nbsp;<a style="color:#278bb0; font-size:20px; font-family:Giger;">All common sensors supported</a>
                                        </span><br />
                                        <div id="divFeaturesBody5" style="display:none;">
                                            <ul style="list-style-image: url(res/images/bullet_tab1.png);">
                                                <li>Sensors supported currently include Accelerometer, Gyroscope, Magnetic Sensor, Light Sensor, Proximity Sensor and Barometer. Basic information such as range and manufacturer of each sensor on your device is provided too.</li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                                <!--USES-->
                                <div id="divPage2" class="insideDivs">
                                    <!--<div id="divSpacing" style="height:60px;">
                                        &nbsp;
                                    </div>-->
                                    <div style="width:100%; height:100%; text-align:center; border:0px solid black;">
                                        <span style="font-family:'Trebuchet MS';font-size:18px;"><a id="usesTitle0" class="buttonsSelected" onclick="showUse(0);">Everyone</a> | <a id="usesTitle1" class="buttons" onclick="showUse(1);">Developers</a></span>
                                        <br /><br />
                                        <div id="divUsesHolder" style="width:100%; height:400px; text-align:left; border-top:1px solid #b0b0b0;">
                                            <div id="divUses0" style="width:100%; height:100%;">
                                                <table style="width:100%; font-family:'Trebuchet MS'; font-size:14px; color:#404040;">
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Detect Magnetic Fields</span><br />If your device has the sensor, use this graph to pick up all sorts of magnetic fields. You can detect live electric wires, sometimes even if they are behind walls. You can easily detect metals. Just try bringing a metal spoon or knife near your device.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Experiments</span><br />Use it for experiments at any level, from school class room projects to academic research.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Recognise minute vibrations</span><br />These sensors tend to be fairly accurate. Try place your device on a (flat, safe) metal staircase handle and get someone to hit the handle a few floors away. The graph should show obvious changes. These sensors can pick up vibrations that you may not be able to hear, see or even feel.</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divUses1" style="width:100%; height:100%; display:none;">
                                                <table style="width:100%; font-family:'Trebuchet MS'; font-size:14px; color:#404040;">
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Sensor Behaviour</span><br />How responsive is the proximity sensor? Can it actually be used for more than blanking the screen during a call?</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Thresholds</span><br />Easily figure out what value of accelerometer data is considered a ‘tap’ on the device or what could be considered a shake.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Gesture profiles</span><br />What does a twist of the wrist look like? What would picking up the phone from a table exactly look like, as opposed to simply moving the phone?</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td style="width:30%; vertical-align:top; padding-top:5px; text-align:center;"><div style="width:100px;height:100px; background-color:#333; display:inline-block;"></div></td>-->
                                                        <td style="width:100%; vertical-align:top; padding-left:0px; padding-right:0px;" colspan="1"><span style="font-weight:bold;font-size:16px;color:#000000;">Patterns</span><br />What does the acceleration pattern look like when walking with the phone in the users pocket? In their hand? What about other movements? Would the gyroscope be more appropriate?</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Questions-->
                                <div id="divPage3" class="insideDivs">
                                    <span style="font-family:'Trebuchet MS'; font-size:16px;">Here are answers to some common questions. If you don't find what you are looking for here, drop us a <a style="cursor:pointer; color:#278bb0;" onclick="navigate(4);">message</a>.</span>
                                    <br /><br />
                                    <div id="divQuestionsHolder" style="width:100%; height:400px; overflow-y:scroll; text-align:left; font-family:'Trebuchet MS'; font-size:14px; border-top:1px solid #b0b0b0;">
                                        <!--<table style="width:100%; font-family:'Trebuchet MS'; font-size:14px; color:#404040;">
                                        </table>-->
                                        <span style="font-weight:bold;font-size:16px;color:#000000;">Where do I change the sensor being graphed?</span>
                                        <br />If you find yourself asking this question you are probably viewing the app in Landscape mode. View the app in portrait mode and you should find the sensor drop down and other settings to the right of the graph.
                                        <br /><br /><span style="font-weight:bold;font-size:16px;color:#000000;">What is the interval of data being collected?</span>
                                        <br />That varies from sensor to sensor, device to device and the amount of load on the processor when the app is being used. On average, values up to the following were obtained for some of the sensors:
                                        <br /><br />Accelerometer: 50Hz
                                        <br />Gyroscope: 200Hz
                                        <br />Magnetic Sensor: 50Hz
                                        <br />Proximity and Light sensor: Updates only when it recognises a change
                                        <br /><br /><span style="font-weight:bold;font-size:16px;color:#000000;">Why does the graph constantly keep showing variations even when the device is placed flat on a surface?</span>
                                        <br />All sensors, industry grade or the ones used in phones, have some level of noise. This causes the graph to constantly show some variations in data despite the actual values being steady.
                                        <br /><br /><span style="font-weight:bold;font-size:16px;color:#000000;">When I zoom horizontally, what exactly happens?</span>
                                        <br />The number of pixels between each data plot is increased or decreased. This does not affect the refresh rate of the sensor or the data being stored in any way.
                                        <br /><br /><span style="font-weight:bold;font-size:16px;color:#000000;">How long back does the app store data from?</span>
                                        <br />Currently the app only remembers the data from the last one minute. Once we introduce exporting features, we will increase this time duration.
                                        <br /><br /><span style="font-weight:bold;font-size:16px;color:#000000;">My device gets hot sometimes when using this app for a long time. Is this normal?</span>
                                        <br />This is normal. The app is pushing the sensors to their maximum refresh rates and processing that data to accurately present it on an interactive graph. While we work hard to make the code as efficient as possible while adding new features, some devices may get warm on prolonged use of the app.
                                    </div>
                                </div>
                                <!--Contact-->
                                <div id="divPage4" class="insideDivs">
                                    <br />
                                    <span style="font-family:'Trebuchet MS'; font-size:16px;">We'd love to hear from you. Wish for a new feature, complain about a problem or speak anything else that might be on your mind.</span>
                                    <table style="width:100%;" class="buttons_table">
                                        <tr><td colspan="5">&nbsp;</td></tr>
                                        <tr>
                                            <td class="buttons_td" style="width:5%">&nbsp;</td>
                                            <td id="td1-2-0" onclick="formChange(0);" style="text-align:center; font-size:16px;">&nbsp;&nbsp;<a class="buttonsSelected" id="form_title_0">Request a feature</a></td>
                                            <td id="td1-2-1" onclick="formChange(1);" style="text-align:center; font-size:16px;"><a class="buttons" id="form_title_1">Report a bug</a></td>
                                            <td id="td1-2-2" onclick="formChange(2);" style="text-align:center; font-size:16px;"><a class="buttons" id="form_title_2">For everything else</a></td>
                                            <td class="buttons_td" style="width:5%">&nbsp;</td>
                                        </tr>
                                        <tr><td colspan="5" style=""></td></tr>
                                    </table>
                                    <div id="form_div">
                                        <form id="feedback_form" name="feedback_form" action="feedback_form.php" method="post">
                                        <input type="hidden" id="form_type" name="form_type" value="0" />
                                        <table style="text-align:top; width:100%; font-size:14px;">
                                            <tr><td colspan="3">&nbsp;</td></tr>
                                            <tr>
                                                <td style="width:5%;">&nbsp;</td>
                                                <td style="vertical-align:top; width:45%;" id="label_1" class="form_label">Your phone model </td>
                                                <td style="width:45%; text-align:right;"><input type="text" id="phone_model" name="phone_model" class="text" style="width:200px;" onfocus="$('#label_1').addClass('form_label_selected');" onblur="$('#label_1').removeClass('form_label_selected');" /><a id="phone_models" class="fieldstatus"></a></td>
                                                <td style="width:5%;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="vertical-align:top; width:45%;" id="label_2" class="form_label">Version of Android you use </td>
                                                <td style="width:45%; text-align:right;"><input type="text" id="android_version" name="android_version" class="text" style="width:200px;" onfocus="$('#label_2').addClass('form_label_selected');" onblur="$('#label_2').removeClass('form_label_selected');" /><a id="android_versions" class="fieldstatus"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="vertical-align:top; width:45%;" id="label_3" class="form_label">What new features you would like to see </td>
                                                <td style="width:45%; text-align:right;"><textarea id="form_body" name="form_body" class="text" style="width:200px; height:100px; resize:none;" onfocus="$('#label_3').addClass('form_label_selected');" onblur="$('#label_3').removeClass('form_label_selected');" onkeyup="checkBlank(this,1);"></textarea><a id="form_bodys" class="fieldstatus"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="vertical-align:top; width:45%;" id="label_4" class="form_label">Your name </td>
                                                <td style="width:45%; text-align:right;"><input type="text" id="user_name" name="user_name" class="text" style="width:200px;" onfocus="$('#label_4').addClass('form_label_selected');" onblur="$('#label_4').removeClass('form_label_selected');checkBlank(this,0);" onkeyup="checkBlank(this,1);" /><a id="user_names" class="fieldstatus"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td style="vertical-align:top; width:45%;" id="label_5" class="form_label">Your email we can reply to </td>
                                                <td style="width:45%; text-align:right;"><input type="text" id="user_email" name="user_email" class="text" style="width:200px;" onfocus="$('#label_5').addClass('form_label_selected');" onblur="$('#label_5').removeClass('form_label_selected');checkEmail(this,0);" onkeyup="checkEmail(this,1);" /><a id="user_emails" class="fieldstatus"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr><td colspan="3">&nbsp;</td></tr>
                                            <tr><td colspan="3" style="text-align:center"><a class="buttons" style="font-size:14px;" onclick="submitForm();">submit</a><a style="color:#278BB0;"> | </a><a class="buttons" style="font-size:14px;" onclick="resetForm();">reset</a></td></tr>
                                        </table>
                                        </form>
                                    </div>
                                    <div id="form_submitted_div" style="display:none; text-align:center">
                                    <table><tr><td style="width:15%;">&nbsp;</td><td style="width:70%;">
                                        <br /><br />
                                        <a id="form_specific_text">Thank you for your feedback</a>
                                        <br /><br /><br />
                                        <a class="continue_button" style="cursor:auto; color:#000;" onclick="finishSubmitForm();" id="continue_button"></a>
                                    </td><td style="width:15%;">&nbsp;</td></tr></table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>	
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>