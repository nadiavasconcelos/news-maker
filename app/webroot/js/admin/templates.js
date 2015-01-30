var templates = {
	init : function(){
		templates.callclientes();

		$('#btnAddField').click(function(e){
			e.preventDefault();
			templates.addField();
		});

		templates.bindActionToDelField( $('.btnDelField') );
	},

	callclientes : function(){
		$.getJSON( "/news-maker/admin/clientes/callclientes", function( data ) {
			$("#TemplateClienteId").autocomplete({
			  source: data,
			  select: function(e, ui) {
			  		$("#TemplateTitulo").focus();
			  }
			});
		});
	},

	bindActionToDelField : function( $who ){
		$who.bind('click', null, function(event) {
			event.preventDefault();
			templates.delField( $(this) );
		});
	},

	addField : function(){
		// Pega o último campo dinâmico e duplica
		var $objLastBefore = $('.dynamicFields').last();
		var htmlField = $objLastBefore.html();
		var dataIndex = $objLastBefore.attr('data-index');
		$objLastBefore.after( '<div class="dynamicFields" data-index="'+ (eval(dataIndex)+1) +'" style="display:none;">' + htmlField + '</div>' );

		// Pega o novo campo dinâmico e muda a index
		var $objLastAfter = $('.dynamicFields').last();
		$objLastAfter.slideDown(400);
		$objLastAfter.find('input').each(function(){
			var name = $(this).attr('name');
			$(this).attr('name', name.replace(dataIndex, eval(dataIndex)+1) );
			$(this).attr('value', '');
			$(this).attr('id', '');
		});
		$objLastAfter.find('select').each(function(){
			var name = $(this).attr('name');
			$(this).attr('name', name.replace(dataIndex, eval(dataIndex)+1) );
			$(this).attr('id', '');
		});
		templates.bindActionToDelField( $objLastAfter.find('.btnDelField') );
	},

	delField : function(objBtn){
		var $divField = objBtn.closest('.dynamicFields');
		var idxField = $divField.attr('data-index');
		
		$divField.slideUp(400, function(){
			$(this).remove();
		});
	}
};

$(document).ready(function($) {
	templates.init();
});