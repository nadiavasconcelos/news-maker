var newsletters = {
	init : function(){
		newsletters.callclientes();
		$('#NewsletterTemplateId').attr('disabled', 'disabled');
	},

	callclientes : function(){
		$.getJSON( "/news-maker/admin/clientes/callclientes", function( data ) {
			$("#NewsletterClienteId").autocomplete({
			  source: data,
			  select: function(e, ui) {
			      	newsletters.calltemplates( ui.item.value );
			  }
			});
		});
	},

	calltemplates : function(cliente_id){
		$('#NewsletterTemplateId').attr('disabled', false).focus();
		$.getJSON( "/news-maker/admin/templates/calltemplates/" + cliente_id, function( data ) {
			$("#NewsletterTemplateId").autocomplete({
			  source: data,
			  select: function(e, ui) {
			      	newsletters.callfields( ui.item.value );
			  }
			});
		});
	},

	callfields : function(template_id){
		$.ajax({
			url: "/news-maker/admin/fields/callfields/" + template_id,
			dataType: 'json',
		})
		.done(function(data) {
			$.each(data, function(key, val) {
				if( val.Field.type == "text" ){
					// Input text
					var html = '<div class="control-group"><label class="control-label" for="">'+ val.Field.field +'</label><div class="controls"><input name="data[NewsletterField]['+key+'][value]" class="input-xlarge" type="text" value="" id="NewsletterField'+key+'Value"></div></div><input type="hidden" name="data[NewsletterField]['+key+'][field_id]" value="'+ val.Field.id +'">';
				}else{
					// Textarea
					var html = '<div class="control-group"><label class="control-label" for="">'+ val.Field.field +'</label><div class="controls"><textarea name="data[NewsletterField]['+key+'][value]" class="input-xlarge" id="NewsletterField'+key+'Value"></textarea></div></div><input type="hidden" name="data[NewsletterField]['+key+'][field_id]" value="'+ val.Field.id +'">';
				}
				$('#fsCamposDinamicos').append( html );
			});
		});
	}
};

$(document).ready(function($) {
	newsletters.init();
});