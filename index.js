const form = document.querySelector("form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const submitButton = document.querySelector("#submit");

console.dir(nameInput);
console.log(new FormData(form));

submitButton.addEventListener("click", (event) => {
  event.preventDefault();

  fetch(`http://localhost/webcapz/api.php`, {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: {
      username: nameInput.value,
      email: emailInput.value,
    },
  })
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((err) => console.error(err));
});
