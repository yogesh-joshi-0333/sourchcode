/* START windows after load javascript */

  window.addEventListener("load", function(){});

/* END */

/* check request from mobile or desktop OR current Devide is Mobile or PC */

function isMobileDevice() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};





/* OverRide Ajax Send Data  One Types Of Hacking  */

(function(){
    // overwrite the "send" method, but keep the original implementation in a variable
    var origSend = XMLHttpRequest.prototype.send;
    XMLHttpRequest.prototype.send = function(data){
        // check if onreadystatechange property is set (which is used for callbacks)
        if (typeof this.onreadystatechange === "function") {
            // overwrite callback function
            var origOnreadystatechange = this.onreadystatechange;
            this.onreadystatechange = function(){
                if (this.readyState === 4) {
                    console.log("start");
                }
                origOnreadystatechange();
                if (this.readyState === 4) {
                    console.log("end");
                }
            };
        }
        console.log(data);
        origSend.call(this, data);
    };
})();

/* END */


/* Some other  FUnction TO Get Other ajax Data Using Javascript closure to prevent global access to this stuff */
(function(){
    // creates a new callback function that also executes the original callback
    var SuccessCallback = function(origCallback){
        return function(data, textStatus, jqXHR) {
            console.log("start");
            if (typeof origCallback === "function") {
                origCallback(data, textStatus, jqXHR);
            }
            console.log("end");
        };
    };

    // store the original AJAX function in a variable before overwriting it
    var jqAjax = $.ajax;
    $.ajax = function(settings){
        // override the callback function, then execute the original AJAX function
        settings.success = new SuccessCallback(settings.success);
        jqAjax(settings);
    };
})();

/* End */

/* Get Any Ajax Response Data */

jQuery(document).ajaxSend(function(event, xhr, options){
    console.log('event',event);
    console.log('xhr',xhr);
    console.log('options',options);
});

/* END  */



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

/* anount in word in gujarati with paisa */

    function Rs(amount) {
      var words = new Array();
      words[0] = 'Zero'; words[1] = 'One'; words[2] = 'Two'; words[3] = 'Three'; words[4] = 'Four'; words[5] = 'Five'; words[6] = 'Six'; words[7] = 'Seven'; words[8] = 'Eight'; words[9] = 'Nine'; words[10] = 'Ten'; words[11] = 'Eleven'; words[12] = 'Twelve'; words[13] = 'Thirteen'; words[14] = 'Fourteen'; words[15] = 'Fifteen'; words[16] = 'Sixteen'; words[17] = 'Seventeen'; words[18] = 'Eighteen'; words[19] = 'Nineteen'; words[20] = 'Twenty'; words[30] = 'Thirty'; words[40] = 'Forty'; words[50] = 'Fifty'; words[60] = 'Sixty'; words[70] = 'Seventy'; words[80] = 'Eighty'; words[90] = 'Ninety'; var op;
      amount = amount.toString();
      var atemp = amount.split('.');
      var number = atemp[0].split(',').join('');
      var n_length = number.length;
      var words_string = '';
      if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
          received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
          n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
            if (n_array[i] == 1) {
              n_array[j] = 10 + parseInt(n_array[j]);
              n_array[i] = 0;
            }
          }
        }
        value = '';
        for (var i = 0; i < 9; i++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
            value = n_array[i] * 10;
          } else {
            value = n_array[i];
          }
          if (value != 0) {
            words_string += words[value] + ' ';
          }
          if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Crores ';
          }
          if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Lakhs ';
          }
          if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Thousand ';
          }
          if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
            words_string += 'Hundred and ';
          } else if (i == 6 && value != 0) {
            words_string += 'Hundred ';
          }
        }
        words_string = words_string.split(' ').join(' ');
      }
      return words_string; 
    }
  function RsPaise(n) {
      nums = n.toString().split('.')
      var whole = Rs(nums[0])
      if (nums[1] == null) nums[1] = 0;
      if (nums[1].length == 1) nums[1] = nums[1] + '0';
      if (nums[1].length > 2) { nums[1] = nums[1].substring(2, length - 1) }
      if (nums.length == 2) {
        if (nums[0] <= 9) { nums[0] = nums[0] * 10 } else { nums[0] = nums[0] };
        var fraction = Rs(nums[1])
        if (whole == '' && fraction == '') { op = 'Zero only'; }
        if (whole == '' && fraction != '') { op = 'Paise ' + fraction + ' only'; }
        if (whole != '' && fraction == '') { op = 'Indian Rupee ' + whole + ' only'; }
        if (whole != '' && fraction != '') { op = 'Indian Rupee ' + whole + 'and Paise ' + fraction + 'only'; }
      }
      return op;
    }
/* End Code */

/* replace Broken image to default image in hole Site  */
document.addEventListener("DOMContentLoaded", function(event) {
   document.querySelectorAll('img').forEach(function(img){
  	img.onerror = function(){this.setAttribute("src", "<?=home_url()?>/wp-content/uploads/2021/05/Rectangle-210.jpg");};
   });
});
/* */
