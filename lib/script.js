


function formValidation(event) {
    event.preventDefault();

    let password = event.target.password.value;
    let uppercaseRegex = /[A-Z]/;

    if (password.length < 8 || !uppercaseRegex.test(password)) {
        alert("Het wachtwoord moet minimaal 8 karakters bevatten en minimaal 1 hoofdletter hebben.");
        return false;
    }

    alert("Form Submitted");
}

formValidation();
