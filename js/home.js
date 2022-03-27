document.getElementById('game-start').addEventListener("click", function() {
	document.querySelector('.game-form').style.display = "flex";
});

document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.game-form').style.display = "none";
});