//var dominioApi = 'http://localhost/my-json-server/';
function CallApiRest(){	
	var self = document.querySelector("#ruta").value;	
	var select = document.querySelector("#sltipo").value;
	console.log("Combo : " , select);
fetch("/"+ self + '/modelo/consumirApirest.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    body: "tipo=" + select
  })
  .then(response => response.text())
  .then(data => 
  	{
  		document.querySelector("#filaRespuesta").innerHTML = data
  		//console.log(data);
  	});
}


function ExportarJson(){
	var self = document.querySelector("#ruta").value;
	//console.log("Ruta: " ,  self);
	fetch("/"+ self + '/modelo/ExportarJson.php', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    body: "nombreArchivo=Respuesta1"
  })
  .then(response => response.text())
  .then(data => 
  	{  		
  		console.log(data);
  		
  	});

}

function selectFolder(e) {
   for (var i = 0; i < e.target.files.length; i++) {
      var s = e.target.files[i].name + '\n';
      s += e.target.files[i].size + ' Bytes\n';
      s += e.target.files[i].type;
      alert(s);
   }
}