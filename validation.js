    document.getElementById("signupForm").addEventListener("submit", function(event) {
    var email = document.getElementById("signupEmail").value;
    var password = document.getElementById("signupPassword").value;
    var repeatedPassword = document.getElementById("repeatedPassword").value;

    //  regular expression of valid email
	var emailRegix = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegix.test(email)) {
        alert("Invalid email address");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // regular expression of valid password 
	var passwordRegix = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;

    if (!passwordRegix.test(password)) {
        alert("Password Rules: at least 8 characters, one uppercase character, one number, and one special character");
        // Don't submit form :)
        event.preventDefault(); 
        return;
    }

    // check if both passwords match
    if (password !== repeatedPassword) {
        alert("Passwords do not match");
        // Don't submit form :)
        event.preventDefault(); 
        return;
    }

    
});
