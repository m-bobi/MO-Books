function getSuggestions(input) {
  let url = "../html/getSuggestions.php?query=" + input;
  console.log(url);

  if (input.trim() === "") {
    document.getElementById("suggestionsContainer").innerHTML = "";
    return;
  }

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      let suggestionsContainer = document.getElementById(
        "suggestionsContainer"
      );
      suggestionsContainer.innerHTML = "";
      data.forEach((suggestion) => {
        let suggestionLink = document.createElement("a");
        suggestionLink.textContent = suggestion.title;
        if (suggestion.id !== undefined) {
          suggestionLink.href = "#product-" + suggestion.id;
        } else {
          // Handle the case where suggestion.id is undefined
          console.error("suggestion.id is undefined");
        }

        suggestionLink.addEventListener("click", function () {
          let productElement = document.getElementById(
            "product-" + suggestion.id
          );
          if (productElement) {
            productElement.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }
        });
        let suggestionDiv = document.createElement("div");
        suggestionDiv.className = "suggestion";
        suggestionDiv.appendChild(suggestionLink);
        suggestionsContainer.appendChild(suggestionDiv);
      });
    })
    .catch((error) => console.error("Error fetching suggestions:", error));
}
