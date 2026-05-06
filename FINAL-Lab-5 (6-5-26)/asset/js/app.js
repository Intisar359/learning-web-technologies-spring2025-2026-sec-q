let btn = document.getElementById('btn');

btn.addEventListener('click', function() {
    let xhttp = new XMLHttpRequest();

    xhttp.open('GET', 'data.json', true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
 
            let user = JSON.parse(this.responseText);
            

            document.getElementById('output').innerHTML = 
                "Username: " + user.username + "<br>" +
                "Email: " + user.email + "<br>" +
                "Role: " + user.role;
        }
    };
});