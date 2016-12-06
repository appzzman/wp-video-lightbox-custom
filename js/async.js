/**Gets info of the vimeo video*/
function httpGetVideoAsync(theUrl, image, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText,image);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
	
}

	
/**Get Image View*/
function getVimeoImage(id){
		var image = document.getElementById("1");
		httpGetVideoAsync("http://vimeo.com/api/v2/video/"+id+".json", image, function callback(text, newImage){
			console.log(text)
			var object = eval('(' + text + ')');
			newImage.src = object[0]["thumbnail_medium"];	
		})
}


