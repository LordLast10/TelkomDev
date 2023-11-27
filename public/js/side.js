const signUpButton = document.getElementById('tes');
const signInButton = document.getElementById('tes2');
const container = document.getElementById('container');


signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});


