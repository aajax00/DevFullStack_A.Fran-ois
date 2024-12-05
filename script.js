window.addEventListener("mousemove", (e) => {
    let cursor = document.getElementById("cursor");
    setTimeout(() => {
        cursor.style.top = `${e.clientY}px`;
        cursor.style.left = `${e.clientX}px`;
    }, 50)
})

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// afficher ou masquer le lien de déconnexion
function toggleLogout() {
    var decoLink = document.getElementById("deco-link"); 

    // Vérifie si le lien de déconnexion est actuellement caché ou visible
    if (decoLink.style.display === 'none') {
        decoLink.style.display = 'inline'; 
    } else {
        decoLink.style.display = 'none'; 
    }
}
