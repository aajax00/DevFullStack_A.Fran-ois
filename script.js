window.addEventListener("mousemove", (e) => {
    let cursor = document.getElementById("cursor");
    setTimeout(() => {
        cursor.style.top = `${e.clientY}px`;
        cursor.style.left = `${e.clientX}px`;
    }, 50)
})