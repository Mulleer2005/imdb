document.getElementById("form").addEventListener("submit",function(s){s.preventDefault();for(var o=[],n=document.getElementById("titol").selectedOptions,t=0;t<n.length;t++)o.push(n[t].value);var l={titol:o};fetch("http://imdb.test/api/movies/unstore",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(l)}).then(e=>e.json()).then(e=>{document.getElementById("resposta").textContent=e.message,e.isValid?document.getElementById("resposta").style.color="green":document.getElementById("resposta").style.color="red"})});