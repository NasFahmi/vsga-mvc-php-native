document
  .getElementById("mahasiswaForm")
  .addEventListener("submit", function (event) {
    let isValid = true;
    let email = document.getElementById("inputEmail4");
    let password = document.getElementById("inputPassword4");
    let address = document.getElementById("inputAddress");
    let city = document.getElementById("inputCity");
    let state = document.getElementById("inputState");
    let zip = document.getElementById("inputZip");
    let check = document.getElementById("gridCheck");

    // Clear previous error messages
    document.querySelectorAll(".error").forEach(function (error) {
      error.remove();
    });

    // Email validation
    if (email.value === "") {
      isValid = false;
      showError(email, "Email is required.");
    } else if (!validateEmail(email.value)) {
      isValid = false;
      showError(email, "Invalid email format.");
    }

    // Password validation
    if (password.value === "") {
      isValid = false;
      showError(password, "Password is required.");
    } else if (password.value.length < 6) {
      isValid = false;
      showError(password, "Password must be at least 6 characters.");
    }

    // Address validation
    if (address.value === "") {
      isValid = false;
      showError(address, "Address is required.");
    }

    // City validation
    if (city.value === "") {
      isValid = false;
      showError(city, "City is required.");
    }

    // State validation
    if (state.value === "Choose...") {
      isValid = false;
      showError(state, "Please select a state.");
    }

    // Zip validation
    if (zip.value === "") {
      isValid = false;
      showError(zip, "Zip code is required.");
    } else if (!/^\d+$/.test(zip.value)) {
      isValid = false;
      showError(zip, "Zip code must be numeric.");
    }

    // Checkbox validation
    if (!check.checked) {
      isValid = false;
      showError(check, "You must agree before submitting.");
    }

    if (!isValid) {
      event.preventDefault();
    }else{
        alert('Selesai')
        location.href='../index.php'
    }
  });

function validateEmail(email) {
  const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return re.test(String(email).toLowerCase());
}

function showError(element, message) {
  const error = document.createElement("div");
  error.className = "error text-danger";
  error.innerText = message;
  element.parentNode.appendChild(error);
}
