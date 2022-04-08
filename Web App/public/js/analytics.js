
window.onload = function() {
    var username = document.getElementById("username");
    var age = document.getElementById("age");
    var gender = document.getElementById("gender");
    
    username.innerHTML = sessionStorage.getItem('username');
    age.innerHTML = sessionStorage.getItem('age');
    gender.innerHTML = (sessionStorage.getItem('gender') == 0) ? "Male" : "Female";
};
