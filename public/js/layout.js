document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.querySelector('button[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIconOpen = mobileMenuButton.querySelector('svg.block');
    const menuIconClose = mobileMenuButton.querySelector('svg.hidden');
    const userMenuButton = document.querySelector('#user-menu-button');
    const userMenu = document.querySelector('[role="menu"]');
  
    // Toggle mobile menu visibility on button click
    mobileMenuButton.addEventListener('click', function () {
      mobileMenu.classList.toggle('hidden');
      menuIconOpen.classList.toggle('hidden');
      menuIconClose.classList.toggle('hidden');
    });
  
    // Toggle user menu visibility on user icon click
    userMenuButton.addEventListener('click', function () {
      userMenu.classList.toggle('hidden');
    });
  
      // Close user menu when clicking outside
    document.addEventListener('click', function (event) {
      if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
        userMenu.classList.add('hidden');
      }
    });
  
    // BMI Calculator
    const weightInput = document.getElementById('weightInput');
    const heightInput = document.getElementById('heightInput');
    const bmiButton = document.getElementById('bmiButton');
    const bmiOutput = document.getElementById('bmiOutput');
  
    if (weightInput && heightInput && bmiButton && bmiOutput) {
      bmiButton.addEventListener('click', function () {
        const weight = parseFloat(weightInput.value);
        const height = parseFloat(heightInput.value) / 100;
  
        if (!weight || !height || weight <= 0 || height <= 0) {
          bmiOutput.textContent = "⚠️ Please enter valid numbers.";
          return;
        }
  
        const bmi = (weight / (height * height)).toFixed(1);
        let category = '';
        if (bmi < 18.5) category = "Underweight";
        else if (bmi < 24.9) category = "Normal weight";
        else if (bmi < 29.9) category = "Overweight";
        else category = "Obese";
        bmiOutput.textContent = `Your BMI is ${bmi} (${category})`;
        weightInput.value = '';
        heightInput.value = '';
      });
    }
});