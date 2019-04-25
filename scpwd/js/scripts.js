const $cImg = $('#widget_content');
const $body = $('body');
var zoomLevel = 0;
var startmp3 = 0;
var seltext = "";
var base_url = "http://localhost:82/";
var lang_convert = 0;

function reset_all(){
	window.location.reload();
}

function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); 
}
function apply_language(){
   clear_all(4,0);
   $body.css('padding-top','-55px');
   googleTranslateElementInit();
   lang_convert = 1;
  /*setTimeout(function(){
	$cImg.css('margin-top','0px');},5000);*/
}

function apply_magnify(){
	clear_all(3,0);
    var scaleNum = 2;
    $body.addClass('magnify');
    $cImg.addClass('element_to_magnify');
    $(".magnify_glass").css('display','block');	
    $(".magnify").jfMagnify();
	$('.magnify_glass').animate({
		'top':'1%',
		'left':'1%'
		},{
		duration: 2000, 
		progress: function(){
			$(".magnify").data("jfMagnify").update();
		}, 
		easing: "easeOutElastic"
	});
}

function apply_zoom(id){
  if(id == 1){
    clear_all(6,1);
    zoomLevel = zoomLevel + 2;
	if(zoomLevel >= 10){
		 zoomLevel = 10;
	   }
  } else{
   clear_all(7,1); 
   zoomLevel = zoomLevel - 2;
   if(zoomLevel < 0){
	 zoomLevel = 0;
   }
  }
  $cImg.css({ zoom: zoomLevel });
}

function apply_masking(){
    clear_all(1,0);
	$cImg.addClass("clip-me");
	$body.mousemove(function(e){  
		//alert(e.pageX);
	   //console.log(e.pageX,e.pageY);
	   var x1 = parseInt(e.pageY)-120;
	   var x2 = parseInt(e.pageY)+60;
	   var top1 = x1+"px";
	   var top2 = x2+"px";
	   //console.log(top1,top2,e.pageX);
	   //$body.css('clip', `${e.pageX}px ${e.pageY}px`);  
	   $cImg.css('clip','rect('+top1+', 1500px, '+top2+', 1px)');
	});
}

function apply_scaling(){
	clear_all(2,0);
    var element = document.createElement('div');
	element.className = 'scalediv';
	element.innerHTML = '&nbsp;';
	$cImg.append(element);
	const $scDiv = $('.scalediv');
	$cImg.mousemove(function(e){ 
	   //console.log(e.pageX,e.pageY);
	   var x1 = parseInt(e.pageY)-20;
	   var x2 = parseInt(e.pageY)+150;
	   var top1 = x1+"px";
	   var top2 = x2+"px";
	   //console.log(top1,top2,e.pageX);
	   $scDiv.css({'top':top1});
	});
}

function apply_mp3download(){
  clear_all(5,0);
  $(".audiomsg").show().delay(5000).fadeOut();
  startmp3 = 1;
}

function clear_all(id,flag){
    //$('.widgetbtns').css('background-color','#333');
    //$('.widgetbtns:nth-child('+id+')').css('background-color','#009900');
    $cImg.removeClass("clip-me");
    $cImg.removeClass('element_to_magnify');
    $('.scalediv').remove();
    $(".magnify_glass").css('display','none');
    $('.colortheme').css('display','none');
    $('.fontstheme').css('display','none');
    $body.removeClass('magnify');
    startmp3 = 0;
    lang_convert = 0;
    if(flag == 0){
        zoomLevel = 0;
		$cImg.css({ zoom: 0 });
    }
}

function getSelectionText(){
    var selectedText = ""
    if (window.getSelection){ // all modern browsers and IE9+
        selectedText = window.getSelection().toString()
    }
    return selectedText;
}

document.addEventListener('mouseup', function(){
        if(startmp3 == 1){
        var thetext = getSelectionText();
        if(seltext == thetext){}else{
			if (thetext.length > 0){ // check there's some text selected
				//console.log(thetext);
				//console.log("sel langualge = ",$('select.goog-te-combo').val());
				seltext = thetext;
				//console.log(escape(thetext));
				//responsiveVoice.speak(thetext);
				var sel_lang = "en";
				/*if($('select.goog-te-combo').val() == "" || $('select.goog-te-combo').val() == undefined){
					sel_lang = "en";
				}*/
				
				var url = base_url+"recordsound.php?q="+escape(thetext)+"&lang="+sel_lang;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					   if(xhttp.responseText.search('mp3') !== -1){
						   var resp_url = base_url+xhttp.responseText;
						   window.open(resp_url,target="_blank");
					   } else{
						alert("Sorry, not supported");
					   }
					}
				};
				xhttp.open("GET", url, true);
				xhttp.send();
			}
		}
      }
	}, false);
function sound_icon(thetext){
   responsiveVoice.speak(thetext);
}
function show_color(){
   $('.colortheme').css({display:'block'});
   $('.fontstheme').css({display:'none'});
}
function show_font(){
   $('.colortheme').css({display:'none'});
   $('.fontstheme').css({display:'block'});
}
function apply_font(fontid){
   $('body').css('font-family',fontid);
   $('h1').css('font-family', fontid);
   $('h2').css('font-family', fontid);
   $('h3').css('font-family', fontid);
   $('.fontstheme').css({display:'none'});
}

function apply_color(code){
   var sel_code = "#"+code;
   $('#widget_content').css({ 'background-color': sel_code });
   $("#gtco-header").css({ 'background-color': sel_code });
   $("#gtco-features").css({ 'background-color': sel_code });
   $("#gtco-header").css('background-image', 'none');
   $("div").css('background-image', 'none');
   $('.colortheme').css({display:'none'});
}

var spacing = 0;
function apply_spacing(id){
	if(id == 0){
      spacing = spacing - 2;
      //console.log(spacing);
      if(spacing < 0){spacing = 0;}
      if(spacing > 0){
        var sp = spacing+"px";
		$('h3').css('letterSpacing', sp);
		$('h1').css('letterSpacing', sp);
        $('h2').css('letterSpacing', sp);
        $('#widget_content').css('letterSpacing', sp);
      }
    }else{
        spacing = spacing + 2;
		//console.log(spacing);
        var sp = spacing+"px";
		$('h3').css('letterSpacing', sp);
        $('h1').css('letterSpacing', sp);
        $('h2').css('letterSpacing', sp);
        $('#widget_content').css('letterSpacing', sp);
	}
}

var lnheight = 17;
function apply_lnheight(id){
	if(id == 0){
      lnheight = lnheight - 2;
      //console.log(spacing);
      if(lnheight < 17){lnheight = 17;}
      if(lnheight > 0){
        var sp = lnheight+"px";
		$('h3').css('line-height', sp);
		$('h1').css('line-height', sp);
        $('h2').css('line-height', sp);
        $('#widget_content').css('line-height', sp);
      }
    }else{
        lnheight = lnheight + 2;
		//console.log(spacing);
        var sp = lnheight+"px";
		$('h3').css('line-height', sp);
        $('h1').css('line-height', sp);
        $('h2').css('line-height', sp);
        $('#widget_content').css('line-height', sp);
	}
}

var seltext = "";
document.onmouseup = function () {  
    //alert(lang_convert);
    var thetext = getSelectionText()
    if(lang_convert == 1){
         if(seltext == thetext){}else{ 
        seltext = thetext;
        var cur = $('select.goog-te-combo').val();
        var lang = 'US English Female';
        if(cur == 'hi'){lang = 'Hindi Female';}
        if(cur == 'ta'){lang = 'Tamil Male';}
        if(cur == 'ar'){lang = 'Arabic Female';}
        if(cur == 'zh-CN'){lang = 'Chinese Female';}
        if(cur == 'zh-TW'){lang = 'Chinese Female';}
        if(cur == 'da'){lang = 'Danish Female';}
        if(cur == 'nl'){lang = 'Dutch Female';}
        if(cur == 'fr'){lang = 'French Female';}
        if(cur == 'ko'){lang = 'Korean Female';}
        //alert($('select.goog-te-combo').val());
        responsiveVoice.speak(thetext,lang);
		//document.getElementById("sel").value = getSelectionText();
		/*var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		console.log(voices);
		//alert(voices[9]);
		msg.voice = voices[10]; // Note: some voices don't support altering params
		msg.voiceURI = 'native';
		msg.volume = 1; // 0 to 1
		msg.rate = 1; // 0.1 to 10
		msg.pitch = 0; //0 to 2
		msg.lang = 'en-US';//'es-SV';'Español (El Salvador)';//
		msg.text = getSelectionText();//'తెలుగు (భారతదేశం)';//'పొరబాటున TDP కి and YCP కి ఓటు వేస్తే మనకు మనమే ఉరి వెసుకున్నట్టే';//'Hello welcome to this World';
		console.log('test = ',msg.text);
		msg.onend = function (e) {
			console.log('Finished in ' + event.elapsedTime + ' seconds.');
		};
		speechSynthesis.speak(msg);*/
    }
   }
};

/*speechSynthesis.onvoiceschanged = function () {
            var voices = this.getVoices();
            console.log(voices[12]);
        };*/