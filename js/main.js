jQuery(function() {
	$(".hamburger").on("click", function() {
	  if($(".toggle_btn").hasClass("open")) {
		$(this).find('p').text("MENU");
	  } else {
		$(this).find('p').text("CLOSE");
	  }
	  $(".toggle_btn").toggleClass("open");
	  $("nav").slideToggle();
	});

	$(".hide").on('click', function() {
	  $(".dev").hide();
	});

	$(".tabs li").on("click", function() {
	  const id = $(this).data("id");
	  $(".active").removeClass("active");
	  $(this).addClass("active");
	  $(`.tab-content #${id}`).addClass("active");
	});
});