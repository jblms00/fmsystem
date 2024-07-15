$(document).ready(function () {
    console.log("JavaScript loaded"); // Add this to check if the script loads

    // Function to create a new transaction form
    function createTransactionForm() {
        const originalForm = $(".transaction-form").first();
        const newForm = originalForm.clone(true);

        // Reset form fields
        newForm.find("input").val("");

        return newForm;
    }

    // Function to add a new transaction form
    function addTransactionForm() {
        const transactionFormsContainer = $("#transaction-forms-container");
        const newForm = createTransactionForm();
        transactionFormsContainer.append(newForm);
    }

    // Attach click event to the "Add Transaction" button
    const addTransactionButton = $("#add-transaction-btn");
    if (addTransactionButton.length > 0) {
        addTransactionButton.on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior
            addTransactionForm(); // Add a new transaction form
        });
    }
});
