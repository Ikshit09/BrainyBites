// Get the user ID from the URL
const urlParams = new URLSearchParams(window.location.search);
const userId = urlParams.get('user_id');

// Use the user ID in your JavaScript code
console.log(userId);