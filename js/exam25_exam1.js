// Create arrays for different menus
var menuA = ["--Select--","Data Structure", "ADBMS", "Operating System","Computer Network"];
var menuB = ["--Select--","C++", "PHP", "Data Mining/Warhouse", "E-commerce"];
var menuC = ["--Select--"];

// Get the first and second menu elements
var firstMenu = document.getElementById("firstMenu");
var secondMenu = document.getElementById("secondMenu");

// Create a function to update the second menu
function updateSecondMenu() {
  // Get the value of the first menu
  var firstValue = firstMenu.value;

  // Clear the second menu
  secondMenu.innerHTML = "";

  // Create a variable to store the options for the second menu
  var secondOptions;

  // Assign the options based on the value of the first menu
  if (firstValue == "BCA SEM-3") {
    secondOptions = menuA;
  } else if (firstValue == "BCA SEM-4") {
    secondOptions = menuB;
  } else if (firstValue == "Select") {
    secondOptions = menuC;
  }

  // Loop through the options and create option elements
  for (var i = 0; i < secondOptions.length; i++) {
    // Create a new option element
    var option = document.createElement("option");

    // Set the value and text of the option
    option.value = secondOptions[i];
    option.text = secondOptions[i];

    // Append the option to the second menu
    secondMenu.appendChild(option);
  }
}

// Add an event listener to the first menu to call the function when it changes
firstMenu.addEventListener("change", updateSecondMenu);
