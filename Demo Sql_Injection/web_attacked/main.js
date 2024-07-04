function clearErrorMessage() {
  let errorField = document.getElementById("errorMessage");
  if (errorField) {
    errorField.innerHTML = "";
    errorField.style.display = "none";
  }
}
