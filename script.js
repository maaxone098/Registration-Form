$(document).ready(function () {
    $("#registrationForm").on("submit", function (e) {
        let isValid = true;
        $("#output").html("<p>Thank you for submitting the form!</p>");
        $("input, textarea").each(function () {
            if ($(this).val().trim() === "") {
                alert("Please fill all fields!");
                isValid = false;
                return false; // Break loop
            }
        });

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
        }
    });
    $("#registrationForm")[0].reset();
});
