$(document).ready(function(){

	var base_url = $("input[name=base_url]").val();

	$.noty.defaults = {
	    layout: 'topRight',
	    theme: 'defaultTheme',
	    type: 'alert',
	    text: '', // can be html or string
	    dismissQueue: true, // If you want to use queue feature set this true
	    template: '<div class="noty_message"><div class="dashed"><span class="noty_text"></span><div class="noty_close"></div></div></div>',
	    animation: {
	        open: {height: 'toggle'},
	        close: {height: 'toggle'},
	        easing: 'swing',
	        speed: 500 // opening & closing animation speed
	    },
	    timeout: 3000, // delay for closing event. Set false for sticky notifications
	    force: false, // adds notification to the beginning of queue when set to true
	    modal: false,
	    maxVisible: 5, // you can set max visible notification for dismissQueue true option,
	    killer: false, // for close all notifications before show
	    closeWith: ['click'], // ['click', 'button', 'hover']
	    callback: {
	        onShow: function() {},
	        afterShow: function() {},
	        onClose: function() {},
	        afterClose: function() {}
	    },
	    buttons: false // an array of buttons
	};

	//subscriber add
	$("form[name=subscriber-add]").submit(function(){
		event.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: 'POST',
			dataType: 'json',
			data: {subscriber_email: $("input[name=subscriber_email]").val()},
		})
		.done(function(response) {
			var n = noty({text: response.message, type: response.type});
		})
	})

	//message send
	$("form[name=contact-form]").submit(function(){

		event.preventDefault();
		$.ajax({
			url: $(this).attr("action"),
			type: 'POST',
			dataType: 'json',
			data: {form_data: $(this).serialize()},
		})
		.done(function(response) {
			var n = noty({text: response.message, type: response.type});
		})
	})


	// Using custom configuration
	$('.carousel').each(function(){

		var num_items = typeof($(this).data("items")) != "undefined" ? $(this).data("items") : 4;

		$(this).find(".carousel-this").carouFredSel({
			// items: num_items,
			width: "100%",
			align: "center",
			scroll: {
				// items: num_items,
				duration: 800
			},
			play: false,
			prev : $(this).find(".carousel-prev"),
			next : $(this).find(".carousel-next")
		});
	});

	$(".slider").carouFredSel({
		items: 1,
		responsive: true,
		width: "100%",
		scroll : { 
			fx : "crossfade" ,
			duration: 800
		}
	});

	//notificacoes
	$("#notify-messages li").each(function(){
		noty({
			text: $(this).html(),
			type: $(this).data("type")
		});
	})
})