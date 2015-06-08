// $(function(){

	// var sender = $('form[name="enviardados"]');
	// var loader = $('.resposta');
	
		/*
	sender.submit(function(){
		$.ajax({
			data:	$(this).serialize(),
			type:	'POST',
			url:	"php/controller.php",
			success: function( resposta ){
					loader.empty().html('<pre>'+resposta+'</pre>');
			}
			
		});
		return false;	
	});
*/	
	// sender.submit(function(){
	// 	$(this).ajaxSubmit({
	// 		url:	"php/controller.php",
	// 		target: loader	
	// 	});
	// 	return false;	
	// });
	

	
	// sender.submit(function(){
		
	// 	$(this).ajaxSubmit({
	// 		url:	"php/controller.php",
	// 		data:	{acao: 'cadastro', envia: 'true'},
	// 		//target: loader,
	// 		//type: 	"GET"
	// 		beforeSerialize:	function(){
	// 				loader.empty().text("Obtendo dados.");
	// 			},
				
	// 		beforeSubmit:		function(){
	// 				loader.empty().text('Carregando...');
	// 			},
				
	// 		//clearForm: true LIMPA
	// 		resetForm: true, //REAJUSTA
	// 		dataType: null, //XML, json, script
			
	// 		error: function(){
	// 				loader.empty().text('Erro ao enviar');
	// 			},
				
	// 		//forceSync: false
			
	// 		success: function( sucesso ){
	// 			loader.empty().html('<pre>' + sucesso + '</pre>');
	// 		},
			
	// 		complete: function(){
	// 				loader.append('Concluido..');
	// 		},
			
	// 		uploadProgress: function(evento, posicao, total, porcentoCompleto){
	// 				loader.html(porcentoCompleto);
	// 		}
	// 	});
				
	// 	return false;	
	// });
// });
Shadowbox.init();
$(function(){
	var debugger_span = $('#debug');
	var sender = $('form[name="uploader"]');
	var filename_span = $(".filename");

  var progressbar = $("#progressbar"),
      bar         = progressbar.find('.uk-progress-bar');

	var modal 	= $('.modal');
	var menu	= $('.menu li a');
	var lista	= $('.lista');
	var loader	= $('.loading');

	menu.closest('li').removeClass('uk-active');
	
	lista.hide();
	loader.hide();
	modal.hide();

	var local = window.location.hash;
	local = local.replace('#','');
	if(!local){ local = 'tudo'; }
	
	menu.click(function(){
		var este = $(this);
		menu.closest('li').removeClass('uk-active');
		este.closest('li').addClass('uk-active');
		var local = este.attr('href');
		local = local.replace('#','');
		if(local != 'cadastro'){
			lerdados( local );
		}else{
			modal.fadeIn("slow");
			return false;
		}
	});
	
	$('.closemodal').click(function(){
		var local = window.location.hash;
		local = local.replace('#','');
		lerdados( local );
		modal.delay(300).fadeOut("slow");
		return false;			
	});
	
	function lerdados( local ){
		$.ajax({
			url: 'php/controller.php',
			data: 'acao=ler&tipo='+local,
			type: 'POST',
			error: function(){ alert('Erro ao ler dados!'); },
			beforeSend: function(){ loader.fadeIn("fast"); },
			//success: function( resposta ){ lista.empty().append( resposta ).fadeIn("slow"); },
			success: function( resposta ){
				lista.fadeTo(300,0.2,function(){
					$(this).html( resposta ).fadeTo(1000,1);
				});	
			},
			complete: function(){ loader.fadeOut("slow"); }
		});	
	}
	lerdados( local );
		
	lista.on('click','.actionedit',function(){
		alert('Editar: ' + $(this).attr('href') );	
		return false;
	});	
	
	lista.on('click','.actiondelete',function(){
		var id = $(this).attr('href');
		var li = lista.find('li[class*="j_'+id+'"]');
		$.ajax({
			url: 'php/controller.php',
			data: 'acao=deletar&delid='+id,
			type: 'POST',
			error: function(){ alert('Erro ao ler dados!'); },
			beforeSend: function(){ li.find('.li-box').css("background","#FCC"); },
			success: function( resposta ){ 
				li.fadeOut("slow",function(){
					var local = window.location.hash;
					local = local.replace('#','');
					window.setTimeout(function(){ lerdados( local ); },500);	
				});
			},
			complete: function(){ loader.fadeOut("slow"); }
		});
		return false;	
	});	
	
	lista.on('click','a[rel*="shadowbox"]',function(){
		Shadowbox.open(this);
		return false;	
	});

  // var settings    = {
  //     params: $('form[name="uploader"] :input').serializeArray(),
  //     action: 'php/controller.php', // upload url

  //     allow : '*.(jpg|jpeg|gif|png)', // allow only images

  //     loadstart: function() {
  //         bar.css("width", "0%").text("0%");
  //         progressbar.removeClass("uk-hidden");
  //     },

  //     progress: function(percent) {
  //         percent = Math.ceil(percent);
  //         bar.css("width", percent+"%").text(percent+"%");
  //     },

  //     allcomplete: function(response) {

  //         bar.css("width", "100%").text("100%");

  //         setTimeout(function(){
  //             progressbar.addClass("uk-hidden");
  //         }, 250);

  //         alert("Upload Completed");
  //         // loader.empty().html(response);
  //     }
  // };

  /* var select = UIkit.uploadSelect($("#upload-select"), settings),
      drop   = UIkit.uploadDrop($("#upload-drop"), settings);
  $.UIkit.uploadSelect($("#upload-select1"), settings); */

  sender.submit(function(){
  	$(this).ajaxSubmit({
  		url: 'php/controller.php',
  		data: {acao: "cadastro"},
      beforeSubmit: function() {
      	debugger_span.fadeIn(1000);
      	debugger_span.removeClass().addClass('uk-alert').find('p').empty().html('<img src="img/load.gif" width="20" alt="Aguarde carregamento..." title="Aguarde carregamento...">&nbsp;Aguarde carregamento... ');
        bar.css("width", "0%").text("0%");
        progressbar.removeClass("uk-hidden").css('display','none').fadeIn('fast');
      },
      error: function(){},
      resetForm: true,
      uploadProgress: function(evt, pos, total, percent) {
          percent = Math.ceil(percent);
          bar.css("width", percent+"%").text(percent+"%");
      },      
      success: function(response){
      	debugger_span.addClass('uk-alert-success').find('p').html(response);
      	filename_span.empty();
 				bar.css("width", "100%").text("100%");
        setTimeout(function(){
            progressbar.fadeOut("slow",function(){
            	$(this).addClass("uk-hidden");
            	debugger_span.fadeOut(1000,function(){
            		$(this).addClass("uk-hidden");
            	});
            });
        }, 1000);
        if(response == '1'){
        	debugger_span.find('p').html('Arquivo enviado com sucesso');
        } else {
        	debugger_span.addClass('uk-alert-danger').find('p').html(response);
        }
        // alert("Upload Completed");      	
      },
  	});
  	return false;
  });

  $("#upload-select1").change(function(){
  	$(".filename").html( $(this).val().replace(/^.*[\\\/]/, '') );
  });

});