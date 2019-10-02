/*$(document).ready(function(){

		$("#logotipo").on("mouseover",function(){

			$("#banner h1").addClass("efeito");


		

		}).on("mouseout",function(){

			$("#banner h1").removeClass("efeito");
			




		});*/
$(document).ready(function(){

		$("#input-search").on("focus",function(){

			$("li.search").addClass("ativo");



		}).on("blur",function(){



			$("li.search").removeClass("ativo");

		});


		$(".noti").owlCarousel({
			autoPlay: 3000,

			items: 4,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3]





		});

		
		
		var owl = $(".noti").data('owlCarousel');

		$('#btn-news-prev').on("click", function(){

			owl.prev();

		});

		$('#btn-news-next').on("click", function(){
			owl.next();
//
		});


		$("#btn-bars").on("click", function(){

			$("header").toggleClass("open-menu");


		});

		$("#menu-mobile-mask, .btn-close").on("click", function(){

			$("header").removeClass("open-menu");

		});

		$("#btn-search").on("click", function(){


			$("header").toggleClass("open-search");
			$("#input-search-mobile").focus();

		});

		/*$('#main').click(function (e){
        var target = $(e.target);
        if(!target.closest('#nav').length && $('#wrapper').hasClass("open-menu")) toggleNav();
      });*/


	



	
		  var owl = $("#caro");
		  owl.owlCarousel();

		$(".next").click(function(){
    	 owl.trigger("owl.next");
  		})
  		$(".prev").click(function(){
   		 owl.trigger("owl.prev");
  		})
		

	});