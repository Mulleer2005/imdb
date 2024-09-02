document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var nameValue = document.getElementById('name').value;
    var birthdateValue = document.getElementById('birthdate').value;

    var formData = {
        name: nameValue,
        birthdate: birthdateValue,
    };

    fetch('http://imdb.test/api/directors/store', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    })
    .then(resposta => resposta.json())
    .then(data => {
        document.getElementById('resposta').innerHTML = '';
        for (var camp in data.missatges) {
            var elementMissatge = document.createElement('p');
            elementMissatge.textContent = data.missatges[camp];
            if (data.isValid) {
                elementMissatge.style.color = 'green';
            } else {
                elementMissatge.style.color = 'red';
            }
            document.getElementById('resposta').appendChild(elementMissatge);
        }
    })
    .catch(console.error);
});
