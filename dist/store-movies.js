document.getElementById("form").addEventListener("submit",function(l){l.preventDefault();for(var d=document.getElementById("titol").value,s=document.getElementById("resum").value,i=document.getElementById("portada").value,n=[],a=document.getElementById("tags").selectedOptions,e=0;e<a.length;e++)n.push(a[e].value);for(var r=[],c=document.getElementById("director").selectedOptions,e=0;e<c.length;e++)r.push(c[e].value);var m=document.getElementById("valoracio").value,v={titol:d,resum:s,portada:i,tags:n,director:r,valoracio:m};fetch("http://imdb.test/api/movies/store",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(v)}).then(t=>t.json()).then(t=>{document.getElementById("resposta").innerHTML="";for(var u in t.missatges){var o=document.createElement("p");o.textContent=t.missatges[u],t.isValid?o.style.color="green":o.style.color="red",document.getElementById("resposta").appendChild(o)}})});
