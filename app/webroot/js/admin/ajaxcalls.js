var call = {
	clientes : function(){
		$.getJSON( "/news-maker/admin/clientes/callclientes", function( data ) {
			return data;
		});
	},

	templates : function(client_id){
		if( !client_id ) var client_id = 0;
		console.log( client_id );
	}
};