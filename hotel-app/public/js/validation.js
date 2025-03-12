document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("reservationForm");

  form.addEventListener("submit", function (event) {
    let isValid = true;

    // Validación del nombre
    const nameInput = document.getElementById("name");
    if (nameInput.value.trim().length < 3) {
      nameInput.classList.add("is-invalid");
      isValid = false;
    } else {
      nameInput.classList.remove("is-invalid");
    }

    // Validación del correo electrónico
    const emailInput = document.getElementById("email");
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(emailInput.value.trim())) {
      emailInput.classList.add("is-invalid");
      isValid = false;
    } else {
      emailInput.classList.remove("is-invalid");
    }

    // Validación del teléfono
    const phoneInput = document.getElementById("phone");
    const phonePattern = /^\d{10}$/;
    if (!phonePattern.test(phoneInput.value.trim())) {
      phoneInput.classList.add("is-invalid");
      isValid = false;
    } else {
      phoneInput.classList.remove("is-invalid");
    }

    // Validación de la fecha
    const dateInput = document.getElementById("date");
    if (!dateInput.value.trim()) {
      dateInput.classList.add("is-invalid");
      isValid = false;
    } else {
      dateInput.classList.remove("is-invalid");
    }

    // Validación del número de personas
    const guestsInput = document.getElementById("guests");
    if (parseInt(guestsInput.value) < 1) {
      guestsInput.classList.add("is-invalid");
      isValid = false;
    } else {
      guestsInput.classList.remove("is-invalid");
    }

    if (!isValid) {
      event.preventDefault();
    }
  });

  // Eliminar errores cuando el usuario escriba
  document.querySelectorAll(".form-control").forEach((input) => {
    input.addEventListener("input", function () {
      this.classList.remove("is-invalid");
    });
  });
});
