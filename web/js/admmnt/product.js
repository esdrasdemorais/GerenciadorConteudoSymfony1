var tagArr = {};

$(document).ready(function() {

$("#tag").autocomplete({
    source: "/tag/searchTag",
    minLength: 3,
    select: function( event, ui ) {
        /*console.log( ui.item ?
            "Selected: " + ui.item.value + " aka " + ui.item.id :
            "Nothing selected, input was " + this.value 
        );*/
	//tagArr.push({ui.item.id : ui.item.id});
	tagArr[ui.item.id] = ui.item.id;	
	
	$("#tags").val(JSON.stringify(tagArr));
	$("#tagList").html($("#tagList").html() + "<span id=\"t_" + ui.item.id + "\">"
		+ ui.item.value + " <a href=\"javascript:void(0)\" id=\"tr_"
		+ ui.item.id + "\" onclick=\"removeTag(" + ui.item.id + ")"
		+ "\">[-]</a></span>");
    }
});

});

function removeTag(key) {
	delete tagArr[key];
	$("#tags").val(JSON.stringify(tagArr));
	console.log(tagArr, $("#tags").val());
	$("#t_" + key).remove();
}

    /*source: new function(this.value, new ) {
	$.ajax({
	    	// the URL for the request
	    	url: "/tag/search",
	    	// the data to send (will be converted to a query string)
	    	data: {
	            tag: this.value.length
	    	},
	    	// whether this is a POST or GET request
	    	type: "GET",
	    	// the type of data we expect back
	    	dataType : "json",
	    	// code to run if the request succeeds;
	    	// the response is passed to the function
	    	success: function( json ) {
		    //$( "</h1>" ).text( json.title ).appendTo( "body" );
		    //$( "<div class=\"content\"/>").html( json.html ).appendTo( "body" );
		    alert(json);
		},
	    	// code to run if the request fails; the raw request and
	    	// status codes are passed to the function
	    	error: function( xhr, status, errorThrown ) {
	            alert( "Sorry, there was a problem!" );
	            console.log( "Error: " + errorThrown );
	            console.log( "Status: " + status );
	            console.dir( xhr );
	    	},
	        // code to run regardless of success or failure
	        complete: function( xhr, status ) {
	    	    //alert( "The request is complete!" );
		}
	})
    })*/
