function submitChat(){
	if(form1.uname.value == '' || form1.msg.value == '' ){
		alert("Name or message not typed");
	}
	else{
		form1.uname.readyState = true,
		form1.uname.style.border = 'none';

		var uname = encodeURIComponent(form1.uname.value);
		var msg = encodeURIComponent(form1.msg.value);
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;  
			}
	}

	xmlhttp.open('GET','add.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();
	}
}
$(document).ready(function(e){
	$.ajaxSetup({cache:false});

	setInterval(function(){
		$('#chatlogs').load('logs.php');
	},2000);
});

$(document).ready(function () {
	$(".fabtheme-owl-1").owlCarousel({
		autoWidth: false,
		items: 1,
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			576: {
				items: 1,
				nav: false
			},
			992: {
				items: 1,
				nav: false
			},
			1200: {
				items: 1,
				nav: false
			}
		}
	});
});
$(document).ready(function(){
	$(".fabtheme-owl-2").owlCarousel({
		items: 3,
		loop: true,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			576: {
				items: 1,
				nav: true
			},
			992: {
				items: 3,
				nav: true
			},
			1200: {
				items: 3,
				nav: true
			}
		}
	});
	var owl = $('.owl-carousel');
	owl.on('mousewheel', '.owl-stage', function (e) {
		if (e.deltaY>0) {
			owl.trigger('next.owl');
		} else {
			owl.trigger('prev.owl');
		}
		e.preventDefault();
	});
});
/* END OF OWL CAROUSEL */
/* COUNTER UP */
$(document).ready(function () {
	$('.fabtheme-counter-up').counterUp({
		delay: 10,
		time: 5000,
		offset: 100,
		beginAt: 0,
		formatter: function (n) {
			return n.replace(/,/g, '.');
		}
	});
});
/* END OF COUNTER UP */
/* WOW */
$(document).ready(function(){
	new WOW().init();
});
/* END OF WOW */
/* NAVIGATION BAR */
$(document).ready(function(){
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 10 ) {
	        $('#fabtheme-navbar').addClass('solid');
	    } else {
	        $('#fabtheme-navbar').removeClass('solid');
	    }
	    if ($(this).scrollTop() <= 0 ) {
	    	$('#fabtheme-navbar').hide();
	    }
	    else{
	    	$('#fabtheme-navbar').show();
	    }
	});
});
/* SMOOTH SCROLL */
	$(document).ready(function(){
		// Add smooth scrolling to all links
		$("a").on('click', function(event) {
			if (this.hash !== "") {
			  event.preventDefault();
			  var hash = this.hash;
			  $('html, body').animate({
			    scrollTop: $(hash).offset().top
			  }, 800, function(){
			    window.location.hash = hash;
			  });
			}
		});
	});
/* END OF SMOOTH SCROLL */
/* END OF NAVIGATION BAR */
/* SCROLL TOP */
$(window).scroll(function() {
    if ($(this).scrollTop() > 50 ) {
        $('.fabtheme-scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.fabtheme-scrolltop').stop(true, true).fadeOut();
    }
});
$(function(){
	$(".fabtheme-scroll").click(function(){
		$("html,body").animate({
			scrollTop:$(".fabtheme-thetop").offset().top - 0
		},3000, 'easeInOutExpo');
		return false;
	})
});
/* END OF SCROLL TOP */
/* END OF CUSTOM JS */


// filterSelection("all")
// function filterSelection(c) {
//   var x, i;
//   x = document.getElementsByClassName("card");
//   if (c == "all") c = "";
//   for (i = 0; i < x.length; i++) {
//     w3RemoveClass(x[i], "show");
//     if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
//   }
// }

// function w3AddClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
//   }
// }

// function w3RemoveClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     while (arr1.indexOf(arr2[i]) > -1) {
//       arr1.splice(arr1.indexOf(arr2[i]), 1);     
//     }
//   }
//   element.className = arr1.join(" ");
// }


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

function myFunction() {
	var moreText = document.getElementById("more");
	var btnTextA = document.getElementById("myBtn1");
	var btnTextB = document.getElementById("myBtn2");
  
	// if (btnTextA.innerHTML === "Show More") {
	//   btnTextA.innerHTML = "";
	//   btnTextA.style.display = "none";
	//   moreText.style.display = "inline";
	//   btnTextB.style.display = "inline";
	//   btnTextB.innerHTML = "Show Less"; 
	  
	// } else {
    //   btnTextB.innerHTML
	//   btnText.innerHTML = "Show Less"; 
	//   moreText.style.display = "inline";
	// }

	if(btnTextA.style.display == "inline"){
		btnTextA.style.display = "none";
		moreText.style.display = "inline";
		btnTextB.style.display = "inline";
	}else{
		btnTextB.style.display = "none";
		moreText.style.display = "none";
		btnTextA.style.display = "inline";
	}
  }

  function searchFilter(){
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data: 'keywords='+$('#searchInput').val()+'&filter='+$('#filterSelect').val(),
        beforeSend: function(){
            $('.loading-overlay').show();
        },
        success:function(html){
            $('.loading-overlay').hide();
            $('#userData').html(html);
        }
    });
}

// function myChat() {
// 	document.getElementByClass("msgbox").style.display = "block";
// }

// function myChat() {
// 	var x = document.getElementByClass("msgbox");
// 	if (x.style.display === "none") {
// 	//   x.style.visibility = "visible";
// 	  x.style.display = "block";
// 	} else {
// 	  x.style.display = "none";
// 	}

//   }

function openForm() {
	document.getElementById("myForm11").style.display = "block";
  }
  
  function closeForm() {
	document.getElementById("myForm11").style.display = "none";
  }
  