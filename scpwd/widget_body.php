<style>
  .widgetsec{
	border-bottom:#ccc 2px solid; box-shadow:0px 2px #ccc; float:left; width:100%; padding:10px;z-index:99999; position:absolute; top:0px; left:0px; background-color:#fff;
}
.widgetbtns{
	background-color: #333;
    color: #fff;
    padding: 8px;
    margin: 3px;
    font-size: 12px;
    font-family: Arial;
    float:left;
}
.clip-me {    
  /* deprecated version */
  position: absolute; /* absolute or fixed positioning required */
  clip: rect(1px, 1500px, 100px, 1px); /* or "auto" */
  width:100%;
  
  /* values descript a top/left point and bottom/right point */
}
.scalediv{
	position: absolute;width:100%; height:100px; background-color:#000; background-image:url(images/ruler.png); background-repeat:repeat-x;top:50px;left:0px;z-index:9999;
}

.audiomsg{
	position:absolute; top:150px; left:-5px; padding:10px; color:#fff; background-color:#993311; font-size:14px; font-family:Arial; width:350px; border-radius:5px; display:none;
}

.goog-te-banner-frame{display:none;}
.top-buttons{padding:3px;text-decoration: none;border-radius: 5px;display: block;width:40px;height:40px;float:left; margin:5px; cursor:pointer}
.plus{background:#55acee;}
.minus{background:#55acee;}
.font{background:#3b5999;}
.color{background:#888;}
.reset{background:#4cb061}
/*.color{background:#007785 !important;}*/
.zoom{background:#e4405f;}
.ruler{background:#dd6617;}
.mask{padding:0px !important;}
.mask img{width: 40px !important;height: 40px !important;border-radius: 5px;}
.alldivs{background-color:red !important; color:#fff !important;}
.colortheme{position:absolute; top:65px; left:260px; width:200px; height:175px; background-color:#fff;z-index:999999; overflow:hidden;border:#ccc 1px solid;display:none;}
.colorsdiv {width:60px; height:60px;margin:3px;float:left;}
.colorslist{list-style-type:none;padding:0;margin:0;}
.fontstheme{position:absolute; top:65px; left:350px; width:250px; height:375px; background-color:#fff;z-index:999999; overflow:hidden;border:#ccc 1px solid;display:none;}
.fontbuttons{width:95%;padding:3px; margin:2px; float:left; text-align:left; cursor:pointer; border:#333 1px solid;}
.smallbtns{float:right; padding:3px; margin:5px; margin-top:9px;background-color:#ccc;line-height:10px; cursor:pointer;}
.smallbtns:hover{background-color:#099;}
</style>

   <div class="fontstheme">
	   <ul class="colorslist">
		    <li class="fontbuttons" style="font-family:Arial" onclick="apply_font('Arial')">Arial</li>
			<li class="fontbuttons" style="font-family:Verdana" onclick="apply_font('Verdana')">Verdana</li>
			<li class="fontbuttons" style="font-family:Georgia" onclick="apply_font('Georgia')">Georgia</li>
			<li class="fontbuttons" style="font-family:Tahoma" onclick="apply_font('Tahoma')">Tahoma</li>
			<li class="fontbuttons" style="font-family:Trebuchet" onclick="apply_font('Trebuchet')">Trebuchet</li>
            <li class="fontbuttons" style="font-family:Comic Sans MS" onclick="apply_font('Comic Sans MS')">Comic Sans MS</li>
			<li class="fontbuttons" onclick="reset_all()">Reset</li>
            <li style="width:90%; margin:5px; height:20px; float:left">Character Spacing <span class="smallbtns" onclick="apply_spacing(1)">+</span><span class="smallbtns" onclick="apply_spacing(0)">-</span></li>
            <li style="width:90%; margin:5px; height:20px;float:left">Line Height <span class="smallbtns" onclick="apply_lnheight(1)">+</span><span class="smallbtns" onclick="apply_lnheight(0)">-</span></li>
       </ul>
    </div>
    <div class="colortheme">
		<ul class="colorslist">
			<li class="colorsdiv" style="background-color:#ff0000" onclick="apply_color('ff0000')"></li>
			<li class="colorsdiv" style="background-color:#00ff00" onclick="apply_color('00ff00')"></li>
		    <li class="colorsdiv" style="background-color:#0000ff" onclick="apply_color('0000ff')"></li>
			<li class="colorsdiv" style="background-color:#ffff00" onclick="apply_color('ffff00')"></li>
			<li class="colorsdiv" style="background-color:#ff00ff" onclick="apply_color('ff00ff')"></li>
			<li class="colorsdiv" style="background-color:#00ffff" onclick="apply_color('00ffff')"></li>
            <li style="width:100%;padding:3px; margin:2px 0 2px 0; float:left; text-align:center; cursor:pointer; border:#333 2px solid;" onclick="reset_all()">Reset</li>
        </ul>
    </div>
	<div class="audiomsg">Select content to download the auido</div>
<div class="magnify_glass" style="display:none"><div class="mg_ring"></div><div class="mg_zone"></div></div>
<div class="widgetsec" style="position:fixed;">
  <img src="images/buttons/mask.jpg" class="top-buttons mask" title="Enable/Disable screen mask" onclick="apply_masking()" onmouseover="sound_icon('Enable/Disable screen mask')">
  <img src="images/buttons/ruler.png" class="top-buttons ruler" title="Enable/Disable ruler" onclick="apply_scaling()" onmouseover="sound_icon('Enable/Disable ruler')">
  <img src="images/buttons/zoom.png" class="top-buttons zoom" title="Enable/Disable magnifying glass" onclick="apply_magnify()" onmouseover="sound_icon('Enable/Disable magnifying glass')">
  <img src="images/buttons/language.png" class="top-buttons plus" title="Change Language" onclick="apply_language()" onmouseover="sound_icon('Change language')">
  <img src="images/buttons/mpthree.png" class="top-buttons plus" title="MP3 Download" onclick="apply_mp3download()" onmouseover="sound_icon('MP3 Download')">
  <img src="images/buttons/plus.png" class="top-buttons plus" title="Increase font size" onclick="apply_zoom(1)" onmouseover="sound_icon('Increase font size')">
  <img src="images/buttons/minus.png" class="top-buttons minus" title="Decrease font size" onclick="apply_zoom(2)" onmouseover="sound_icon('Decrease font size')">
  <img src="images/buttons/color.png" class="top-buttons color" title="Color Theme" onclick="show_color()" onmouseover="sound_icon('Color theme')">
  <img src="images/buttons/font.png" class="top-buttons font" title="Select Font" onclick="show_font()" onmouseover="sound_icon('Select font')">
  <img src="images/buttons/reset.png" class="top-buttons reset" title="Reset Changes" onclick="reset_all()" onmouseover="sound_icon('Reset changes')">
  <div id="google_translate_element"></div>
</div>
		
	<div class="gtco-loader"></div>