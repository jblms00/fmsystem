console.log("JavaScript loaded"); // Add this to check if the script loads

document.addEventListener("DOMContentLoaded", function () {
    // Function to create a new transaction form
    function createTransactionForm() {
        const originalForm = document.querySelector(".transaction-form");
        const newForm = originalForm.cloneNode(true);

        // Reset form fields
        newForm.querySelectorAll('input').forEach(input => {
            input.value = '';
        });

        return newForm;
    }

    // Function to add a new transaction form
    function addTransactionForm() {
        const transactionFormsContainer = document.getElementById("transaction-forms-container");
        const newForm = createTransactionForm();
        transactionFormsContainer.appendChild(newForm);
    }

    // Attach click event to the "Add Transaction" button
    const addTransactionButton = document.getElementById("add-transaction-btn");
    if (addTransactionButton) {
        addTransactionButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default button behavior
            addTransactionForm(); // Add a new transaction form
        });
    }
});
