document.getElementById('game-start').addEventListener("click", function() {
	document.querySelector('.game-form').style.display = "flex";
});

document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.game-form').style.display = "none";
});

function ValidateForm()
{
    let age = document.querySelector('[name="user-age"]').value;
    let name = document.querySelector('[name="username"]').value;
    let gender = null;

    var radios = document.getElementsByName('gender');
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value;
            break;
        }
    }

    if (age > 0 && name.length > 0 && gender != null) {
        sessionStorage.setItem('username', name);
        sessionStorage.setItem('age', age);
        sessionStorage.setItem('gender', gender);
        window.location.href += 'analytics.html';
        return;
    }

    alert("Invalid Data!");
    returnToPreviousPage();
    return false;
 }