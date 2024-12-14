$(document).ready(function() {
    $("#submitBtn").click(function(event) {
        // Fetch values from the input fields
        const earTagNumber = $("#earTagNumber").val();
        const gender = $("#gender").val();
        const breed = $("#breed").val();
        const age = $("#age").val();
        const color = $("#color").val();
        const milkingCapacity = $("#milkingCapacity").val();
        const monthOfSemen = $("#monthOfSemen").val();
        const semenBreed = $("#semenBreed").val();// Correct selector

        // Validate if all fields are filled
        if (!earTagNumber || !gender || !breed || !age || !color || !milkingCapacity || !monthOfSemen || !semenBreed) {
            alert("Please fill out all the fields!");
            event.preventDefault(); // Prevent form submission
        }
    });
});
