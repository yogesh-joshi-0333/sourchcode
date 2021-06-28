/* start break for loop forchfully */


    if (category.length !== 0) 
    {
        if (typeof currentElement.cat !== "undefined" && currentElement.cat.length > 0) 
        {
          /* loop lable */ outerloop: for (var i = 0; i < currentElement.cat.length; i++) 
          {
            if(category.indexOf(currentElement.cat[i]) !== -1) 
            {
              flag = true;
              // return true ;
              break outerloop; /* loop lable */
            }
          }
        }
    } 
/* end code */

function setTime(){
//this function ensures that the user enter the correct format
var time = "19:00";
var fields = time.split(':');
var min = fields[0];
var sec = fields[1];

if(time === ''){
jQuery(".status").html("Please enter time. eg 1:50");
}else{
if(min < 61 && sec < 61){
jQuery(".status").html("Counting");
console.log("condition true");
count(min, sec, sec);
}else{
jQuery(".status").html("Invalid time. eg 1:50");
}
}
}

function count(min, sec, secLeft){
//this function is the count control is will check if the count down is finish
if(min > 0 || secLeft > 0){
if(secLeft == 0){
min -= 1;
sec = 60;
}

jQuery("#timeLabel #min").html(min);
countDown(min, sec);
}else{
jQuery(".status").html("Let's try that again (:");
localStorage.removeItem("time");
alert("finish");
jQuery("#timeBtn").disabled = false;
jQuery("#time").disabled = false;
}
}

function countDown(min, sec){
//this function runs the seconds count
var time = sec;
jQuery("#sec").html(time);
var interval = setInterval(function(){
jQuery("#sec").html( -- time);
rememberMe(min, time);
if (time == 0) {
clearInterval(interval);
count(min, sec, "00");
}
}, 1000);
}

function rememberMe(min, sec){
//this function stores the time as a local storage incase the page refresh
if (typeof(Storage) !== "undefined") {
localStorage.setItem("time", min+':'+sec);
}else{
jQuery(".status").html("Ooh my, your browser doesn't support web storage");
}
}

function isTimeSet(){
//this function checks if there is a time set
if(localStorage.getItem("time") != null){
var time = localStorage.getItem("time");
var fields = time.split(':');
min = fields[0];
sec = fields[1];
jQuery(".status").html("Counting....");
jQuery("#timeBtn").disabled = true;
jQuery("#time").disabled = true;
count(min, sec, sec);
}
}
jQuery(document).ready(function(){
jQuery('<h1 id="timeLabel"><span id="min">00</span>:<span id="sec">00</span></h1>').insertBefore(jQuery('div#sidebar-cart form.Cart.Drawer__Content .Drawer__Footer')).last();
setTime();
isTimeSet();
});

/* trigger manually any input */
  jQuery(document).on('click','ul.cst-variation li.variation-box',function(){
    jQuery('ul.cst-variation li.variation-box').removeClass('active');
    jQuery(this).addClass('active');
    var variant_id = jQuery(this).attr('data-variant-id');
	chnage_option(variant_id);
  });


function triggerChangeEvent(option) {
  // set selected property
  option.selected = true;
  
  // raise event on parent <select> element
  if ("createEvent" in document) {
    var evt = document.createEvent("HTMLEvents");
    evt.initEvent("change", false, true);
    option.parentNode.dispatchEvent(evt);
  }
  else {
    option.parentNode.fireEvent("onchange");
  }
}

function chnage_option(id) {
  const sel = 'option[value="'+id+'"]'
  const optionEl = document.querySelector(sel);
  triggerChangeEvent(optionEl);
}

/* end trigger manually*/

/*on scroll color chnage */

var scroll_pos = 0;
$(document).scroll(function() {
scroll_pos = $(this).scrollTop();
var color_val = scroll_pos / 900;
$("header.site-header.border-bottom.logo--left").css('background-color', 'rgba(0, 0, 0,'+color_val+')');
});

/* START sort element using javascript */

var alphabeticallyOrderedDivs = $('div#search_result article').sort(function(a, b) {
	return String.prototype.localeCompare.call($(a).data('user_name').toLowerCase().trim(), $(b).data('user_name').toLowerCase().trim());
});
	
var container = $("div#search_result");
container.detach().empty().append(alphabeticallyOrderedDivs);
jQuery(container).insertAfter(jQuery('.wpb_wrapper .wpb_text_column.wpb_content_element'));

/* END sort element using javascript */

// DEVELOPER UNABLE TO CHECK CODE JS

$(document).keydown(function (event) {
if (event.keyCode == 123) { 
return false;
} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
return false;
}
});								
$(document).ready(function() {

$(document)[0].oncontextmenu = function() { return false; }

$(document).mousedown(function(e) {
if( e.button == 2 ) {
alert('Sorry, this functionality is disabled!');
return false;
} else {
return true;
}
});
});




// Google address search 

        google_place_search(document.getElementById('origin'));
        google_place_search(document.getElementById('destination'));
        
        function google_place_search(input)
        {
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed',   function () {
            
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var long = place.geometry.location.lng();
                console.log(lat + ", " + long);
            });
        }








/* Ajax form submission with image */


jQuery("form").submit(function(e)    {
e.preventDefault();
e.stopImmediatePropagation();
	e.stopPropagation();	


        var formdata = new FormData();
        var img = jQuery('input[name="channel_img"]')[0].files[0];
        var title = jQuery('#channel_name').val();
        var cat = jQuery('#cat').val();
        var detail = jQuery('#channel_detail').val();
        
        formdata.append("img", img);
        formdata.append("title", title);
        formdata.append("cat", cat);
        formdata.append("detail", detail);
        formdata.append("action", 'create_cst_post');
        formdata.append("type", 'wpstream_product');
        
          jQuery.ajax({
            type: 'POST',
            url: '<?=admin_url("admin-ajax.php")?>',
            traditional: true,
            processData: false,
	contentType: false,
            data:formdata,
            success: function (response)
	{
		post_id = response.post_id;
 console.log(response);
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
             
            }
        });
});


/*  element view on screen event */

jQuery(window).scroll(function() {
    var top_of_element = jQuery("#video-8186-1_html5").offset().top;
    var bottom_of_element = jQuery("#video-8186-1_html5").offset().top + jQuery("#video-8186-1_html5").outerHeight();
    var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
    var top_of_screen = jQuery(window).scrollTop();

    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
        jQuery('#video-8186-1_html5').trigger('play');
            var video = jQuery('#video-8186-1_html5').get(0);
            if ( video.paused ) {               jQuery('#video-8186-1_html5').trigger('play');
            } 
    } else {
       
    }
});

/*  remove emoji code javascript*/
const line_text = jQuery(this).val();

  resp = Array.from(line_text, x => {let theUnicode = x.charCodeAt(0).toString(16); while (theUnicode.length < 4) {theUnicode = '0' + theUnicode; } if (theUnicode < '00ff') {return x;}}).join('');


jQuery(this).val(resp);


Sending mail with javascript code

$.ajax({
 type: “POST”,
 url: “https://mandrillapp.com/api/1.0/messages/send.json”,
 data: {
   ‘key’: ‘YOUR API KEY HERE’,
   ‘message’: {
     ‘from_email’: ‘YOUR@EMAIL.HERE’,
     ‘to’: [
         {
           ‘email’: ‘RECIPIENT_NO_1@EMAIL.HERE’,
           ‘name’: ‘RECIPIENT NAME (OPTIONAL)’,
           ‘type’: ‘to’
         },
         {
           ‘email’: ‘RECIPIENT_NO_2@EMAIL.HERE’,
           ‘name’: ‘ANOTHER RECIPIENT NAME (OPTIONAL)’,
           ‘type’: ‘to’
         }
       ],
     ‘autotext’: ‘true’,
     ‘subject’: ‘YOUR SUBJECT HERE!’,
     ‘html’: ‘YOUR EMAIL CONTENT HERE! YOU CAN USE HTML!’
   }
 }
}).done(function(response) {
  console.log(response); // if you're into that sorta thing
});
==============================================


/**************** for scrolling UP and DOWN ******************/


var lastScrollTop = 0;
    $(window).on('scroll', function() {
        st = $(this).scrollTop();
        if(st < lastScrollTop) {
            console.log('up 1');
        }
        else {
            console.log('down 1');
        }
        lastScrollTop = st;
    })

/************** APPLY CSS IN IFRAME ****************/

$('#id').load(function(){
$("#id").contents().find("#buddypress").css("margin-top", "-100px");
});


/********* Uploading files and images with AJAX ***********/
$('#bac-img').change(function(){
if (this.files && this.files[0] ){				    	
		        var reader = new FileReader();
		        //var p_id = jQuery("#post_ID").val();
		        reader.readAsDataURL(this.files[0]);
		    }
		    var file_data = jQuery('#bac-img').prop('files')[0];  
			var form_data = new FormData();                  
			form_data.append('bacimg', file_data); 
			$.ajax({
			url: '../wp-content/themes/Divi/custom_calender/image-upload-ajax.php', 
			dataType: 'text',  
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(response){
					}	});
		      });
          
          /****** upload image PROGRESS BAR ******/
/*** adding this in ajax code before success ******/
xhr: function() {
          var myXhr = jQuery.ajaxSettings.xhr();
           if(myXhr.upload){
                       myXhr.upload.addEventListener('progress',progress, false);
                    }
              return myXhr;
        },
success: function(response){
	 jQuery("#progBar").hide();
}


function progress(e){
        if(e.lengthComputable){
            jQuery('progress').attr({value:e.loaded,max:e.total});
            var percentage = (e.loaded / e.total) * 100;
            jQuery('#prog').html(percentage.toFixed(0)+'%');
        }
    }
 
    function resetProgressBar() {
        jQuery('#prog').html('0%');
        jQuery('progress').attr({value:0,max:100});
    }
/**********************************End Code*************************************************/


/******************************check div content size**********************/
<script>
$.fn.textWidth = function(text, font) {
    if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
    $.fn.textWidth.fakeEl.text(text || this.val() || this.text()).css('font', font || this.css('font'));
    return $.fn.textWidth.fakeEl.width();
};
 
$('.text-preview').on('keypress', function(event) {
  if(event.keyCode==13){
   		event.preventDefault();
  }
  
  
  if($(this).textWidth() > $('.text-preview').width()-30 ){
    event.preventDefault();
  }
}).trigger('input');
</script>

/******************************end check div content size**********************/

/******************************Get Exact mouse position in canvas ******************************/
function getRelativeMousePosition(event, target) {
			target = target || event.target;
			var rect = target.getBoundingClientRect();

			return {
			    x: event.clientX - rect.left,
			    y: event.clientY - rect.top,
			}
		}

		// assumes target or event.target is canvas
function getNoPaddingNoBorderCanvasRelativeMousePosition(event, target) {
			target = target || event.target;
			var pos = getRelativeMousePosition(event, target);

			pos.x = pos.x * target.width  / target.clientWidth;
			pos.y = pos.y * target.height / target.clientHeight;

			return pos;  
		}
       	const pos = getNoPaddingNoBorderCanvasRelativeMousePosition(e, canvas);

  		mouse_at.x = pos.x;
  		mouse_at.y = pos.y;


/******************************End code ******************************/
/******************* Admin Ajax wordpress *************************/
var url = "<?php echo admin_url('admin-ajax.php'); ?>";

    jQuery.ajax({

           type: 'post',
           url: url,
           data: {action:'action_name',form_data:jQuery("#idForm").serialize()},
           success: function(data)           {	

           }
         });

function function_name(){

	die();

}


/********************************* Set & destroy cookie in jQuery **********************************/
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script type="text/javascript">
	$("#add").click(function(){
		$.cookie('login-vault', '1');
	});
	$("#delete").click(function(){
		 var date = new Date();
         var m = 10;
		 date.setTime(date.getTime() - (m * 60 * 1000));
		 $.cookie('login-vault', '1', { expires: date });
	});
/******************************** End cookie in jQuery ************************************/
/**************** for scrolling UP and DOWN ******************/


var lastScrollTop = 0;
    $(window).on('scroll', function() {
        st = $(this).scrollTop();
        if(st < lastScrollTop) {
            console.log('up 1');
        }
        else {
            console.log('down 1');
        }
        lastScrollTop = st;
    })

/************** APPLY CSS IN IFRAME ****************/

$('#id').load(function(){
$("#id").contents().find("#buddypress").css("margin-top", "-100px");
});
/********* Uploading files and images with AJAX ***********/
$('#bac-img').change(function(){
if (this.files && this.files[0] ){				    	
		        var reader = new FileReader();
		        //var p_id = jQuery("#post_ID").val();
		        reader.readAsDataURL(this.files[0]);
		    }
		    var file_data = jQuery('#bac-img').prop('files')[0];  
			var form_data = new FormData();                  
			form_data.append('bacimg', file_data); 
			$.ajax({
			url: '../wp-content/themes/Divi/custom_calender/image-upload-ajax.php', 
			dataType: 'text',  
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(response){
					}	});
		      });
          
          
/******************************check div content size**********************/
<script>
$.fn.textWidth = function(text, font) {
    if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
    $.fn.textWidth.fakeEl.text(text || this.val() || this.text()).css('font', font || this.css('font'));
    return $.fn.textWidth.fakeEl.width();
};
 
$('.text-preview').on('keypress', function(event) {
  if(event.keyCode==13){
   		event.preventDefault();
  }
  
  
  if($(this).textWidth() > $('.text-preview').width()-30 ){
    event.preventDefault();
  }
}).trigger('input');
</script>

/******************************end check div content size**********************/

/****************************** Start  Console warning Code **********************/
var warning = function() {};
warning.toString = function() {
    if (this.opened) {
        chrome.runtime.sendMessage({type: 'warning'});
        console.log('%c WARNING :','color:red;font-size:18px;');
        console.log('%c DO NOT PASTE CODE IN THIS CONSOLE (EXCEPT IF YOU KNOW WHAT YOU ARE DOING). IT COULD BE USED TO STEAL YOUR DATA AND RUN MALICIOUS CODE','color:red;font-size:12px;');
    }
    this.opened = true;
};

/****************************** END  Console warning Code **********************/
console.log('%c', warning);




/***************** copy text on click function *********************/

 function copyToClipboard() {
    var success = true,
      range = document.createRange(),
      selection;

    // For IE.
    if (window.clipboardData) {
      window.clipboardData.setData("Text", "<?php echo home_url( $wp->request ); ?>");
    } else {
      // Create a temporary element off screen.
      var tmpElem = $('<div>');
      tmpElem.css({
        position: "absolute",
        left: "-1000px",
        top: "-1000px",
      });
      // Add the input value to the temp element.
      tmpElem.text("<?php echo home_url( $wp->request ); ?>");
      $("body").append(tmpElem);
      // Select temp element.
      range.selectNodeContents(tmpElem.get(0));
      selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      // Lets copy.
      try {
        success = document.execCommand("copy", false, null);
      }
      catch (e) {
        copyToClipboardFF(input.val());
      }
      if (success) {
        alert("Shareble Link Copy");
        // remove temp element.
        tmpElem.remove();
      }
    }
  }
 
/***************** END copy text on click function *********************/
