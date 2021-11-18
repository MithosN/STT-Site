 $(window).load(function() {
                new $.popup({                
                    title       : '',
                    content         : '<a><img src="img/popup.jpg" alt="Image" class="pop_img" style="width:100%; height: auto;"></a><small>Autoclose delay in 15 seconds.</small>', 
					html: true,
					autoclose   : true,
					closeOverlay:true,
					closeEsc: true,
					buttons     : false,
                    timeout     : 15000
                });
            });