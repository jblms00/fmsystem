$(document).ready(function () {
    const navLinks = $(".nav-link");
    const contentArea = $("#content-area");

    // Function to load content dynamically into #content-area
    function loadContentIntoArea(page) {
        $.ajax({
            url: page,
            method: "GET",
            dataType: "html",
            success: function (data) {
                contentArea.html(data);
                attachEventListeners(); // Attach event listeners after content is loaded
            },
            error: function (error) {
                console.error("Error loading content:", error);
            },
        });
    }

    // Event listener for nav links
    navLinks.each(function () {
        $(this).on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior (e.g., page reload)

            navLinks.removeClass("active");
            $(this).addClass("active");

            let page = "";

            switch (this.id) {
                case "dashboard-link":
                    page = "dashboard.php";
                    break;
                case "franchising-link":
                    page = "contract/franchiseeagreement.php";
                    break;
                case "sales-link":
                    page = "salesPerformance/sales.php";
                    break;
                case "expenses-link":
                    page = "salesPerformance/expenses.php";
                    break;
                case "inventory-link":
                    page = "inventory/inventory2.php";
                    break;
                case "manpower-link":
                    page = "manpower/manpower_dashboard.php";
                    break;
            }
            loadContentIntoArea(page); // Load content dynamically into #content-area
        });
    });

    // Function to attach event listeners to dynamically loaded content
    function attachEventListeners() {
        // Attach click event to the new document button
        $("#btn-new-document").on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior (e.g., form submission)
            loadContentIntoArea("contractModule/documentTypeSelection.php");
        });

        // Attach click event to the new franchise document button
        $("#btn-franchise-document").on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior (e.g., form submission)
            loadContentIntoArea("contractModule/newDocumentFranchise.php");
        });

        // Attach click event to the new leasing document button
        $("#btn-leasing-document").on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior (e.g., form submission)
            loadContentIntoArea("contractModule/newDocumentLeasing.php");
        });

        /* ------ SALES PERFORMANCE MODULE ------ */

        // Attach click event to the dineInSales link
        $("#dineInSales-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/chooseFranchisee.php");
        });

        // Attach click event to the dineInSales link for franchisee
        $("#potCorFranchisee").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/chooseBranches.php");
        });

        // Attach click event to the dineInSales link for franchisee branch
        $("#salesBranch").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/dineInSales.php");
        });

        // Attach click event to the takeOutSales link
        $("#takeOutSales-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/takeOutSales.php");
        });

        // Attach click event to the deliverySales link
        $("#deliverySales-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/deliverySales.php");
        });

        // Attach click btn to the encodeSales link
        $("#btn-encode-salesreport").on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior (e.g., form submission)
            loadContentIntoArea("salesPerformanceModule/encodeSales.php");
        });

        // Attach click event to the totalExpenses link
        $("#totalExpenses-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/totalExpenses.php");
        });

        // Attach click event to the controllableExpenses link
        $("#controllableExpenses-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("salesPerformanceModule/chooseFranchisee.php");
        });

        // Attach click event to the addExpenses link
        $("#btn-add-expense").on("click", function (event) {
            event.preventDefault(); // Prevent default button behavior (e.g., form submission)
            loadContentIntoArea("salesPerformanceModule/addExpenses.php");
        });

        /* ------ MANPOWER MODULE ------ */

        // Attach click event to the unassigned link
        $("#unassigned-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("manpowerModule/unassignedEmployees.php");
        });

        // Attach click event to the totalEmployees link
        $("#total-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("manpowerModule/totalEmployees.php");
        });

        // Attach click event to the activeEmployees link
        $("#active-link").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("manpowerModule/activeEmployees.php");
        });

        // Attach click event to the addEmployees link
        $("#add-employee-btn").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("manpowerModule/addEmployee.php");
        });

        // Attach click event to the certifications link
        $("#certification-btn").on("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            loadContentIntoArea("manpowerModule/certificationTracking.php");
        });

        // Retrieve rows after content is loaded
        $("#franchise-section tbody tr").on("click", function (event) {
            event.preventDefault(); // Prevent default row click behavior
            loadContentIntoArea("contractModule/franchiseDetails.php");
        });

        $("#leasing-section tbody tr").on("click", function (event) {
            event.preventDefault(); // Prevent default row click behavior
            loadContentIntoArea("contractModule/leasingDetails.php");
        });

        /* ------ SALES PERFORMANCE MODULE ROWS ------ */

        $(
            "#sales-section tbody tr, #dineIn-section tbody tr, #takeOut-section tbody tr, #delivery-section tbody tr"
        ).on("click", function (event) {
            event.preventDefault(); // Prevent default row click behavior
            loadContentIntoArea("salesPerformanceModule/salesReport.php");
        });

        $(
            "#expenses-section tbody tr, #controllable-section tbody tr, #nonControllable-section tbody tr"
        ).on("click", function (event) {
            event.preventDefault(); // Prevent default row click behavior
            loadContentIntoArea("salesPerformanceModule/viewExpenses.php");
        });
    }

    // Load the default content (Dashboard) on initial load
    loadContentIntoArea("dashboard.php");
});
