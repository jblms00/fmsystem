document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");
    const contentArea = document.getElementById("content-area");

    // Function to load content dynamically into #content-area
    function loadContentIntoArea(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                contentArea.innerHTML = data;
                attachEventListeners(); // Attach event listeners after content is loaded
            })
            .catch(error => console.error('Error loading content:', error));
    }

    // Event listener for nav links
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior (e.g., page reload)

            navLinks.forEach(nav => nav.classList.remove("active"));
            this.classList.add("active");

            let page = "";
            switch (this.id) {
                case "dashboard-link":
                    page = "dashboard.html";
                    break;
                case "franchising-link":
                    page = "contractModule/franchiseeagreement.html";
                    break;
                case "sales-link":
                    page = "salesPerformanceModule/sales.html";
                    break;
                    case "expenses-link":
                        page = "salesPerformanceModule/expenses.html";
                        break;
                case "inventory-link":
                    page = "inventoryModule/inventory2.html";
                    break;
                case "manpower-link":
                    page = "manpowerModule/manpower_dashboard.html";
                    break;
            }
            loadContentIntoArea(page); // Load content dynamically into #content-area
        });
    });

    // Function to attach event listeners to dynamically loaded content
    function attachEventListeners() {
        const newDocumentButton = document.getElementById("btn-new-document");
        if (newDocumentButton) {
            newDocumentButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default button behavior (e.g., form submission)

                loadContentIntoArea("contractModule/documentTypeSelection.html"); // Load the new document content dynamically
            });
        }

        const newFranchiseButton = document.getElementById("btn-franchise-document");
        if (newFranchiseButton) {
            newFranchiseButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default button behavior (e.g., form submission)

                loadContentIntoArea("contractModule/newDocumentFranchise.html"); // Load the new document content dynamically
            });
        }

        const newLeasingButton = document.getElementById("btn-leasing-document");
        if (newLeasingButton) {
            newLeasingButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default button behavior (e.g., form submission)

                loadContentIntoArea("contractModule/newDocumentLeasing.html"); // Load the new document content dynamically
            });
        }


        /* ------ SALES PERFORMANCE MODULE ------ */

          // Attach click event to the dineInSales link
          const dineInSalesLink = document.getElementById("dineInSales-link");
          if (dineInSalesLink) {
              dineInSalesLink.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  loadContentIntoArea("salesPerformanceModule/chooseFranchisee.html"); // Load dineInSales content dynamically
              });
          }

          // Attach click event to the dineInSales link
          const dineInSalesLinkFranchisee = document.getElementById("potCorFranchisee");
          if (dineInSalesLinkFranchisee) {
            dineInSalesLinkFranchisee.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  loadContentIntoArea("salesPerformanceModule/chooseBranches.html"); // Load dineInSales content dynamically
              });
          }

          // Attach click event to the dineInSales link
          const dineInSalesLinkFranchiseeBranch = document.getElementById("salesBranch");
          if (dineInSalesLinkFranchiseeBranch) {
            dineInSalesLinkFranchiseeBranch.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  loadContentIntoArea("salesPerformanceModule/dineInSales.html"); // Load dineInSales content dynamically
              });
          }


          // Attach click event to the takeOutSales link
          const takeOutSalesLink = document.getElementById("takeOutSales-link");
          if (takeOutSalesLink) {
            takeOutSalesLink.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  loadContentIntoArea("salesPerformanceModule/takeOutSales.html"); // Load takeOutSales content dynamically
              });
          }

          // Attach click event to the deliverySales link
          const deliverySalesLink = document.getElementById("deliverySales-link");
          if (deliverySalesLink) {
            deliverySalesLink.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  loadContentIntoArea("salesPerformanceModule/deliverySales.html"); // Load takeOutSales content dynamically
              });
          }

          // Attach click btn to the encodeSales link
          const encodeButton = document.getElementById("btn-encode-salesreport");
        if (encodeButton) {
            encodeButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default button behavior (e.g., form submission)

                loadContentIntoArea("salesPerformanceModule/encodeSales.html"); // Load the encodeSales content dynamically
            });
        }

        // Attach click event to the totalExpenses link
        const totalExpensesLink = document.getElementById("totalExpenses-link");
        if (totalExpensesLink) {
            totalExpensesLink.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default link behavior
                loadContentIntoArea("salesPerformanceModule/totalExpenses.html"); // Load totalExpenses content dynamically
            });
        }

         // Attach click event to the controllableExpenses link
         const controllableExpensesLink = document.getElementById("controllableExpenses-link");
         if (controllableExpensesLink) {
            controllableExpensesLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("salesPerformanceModule/chooseFranchisee.html"); // Load controllableExpenses content dynamically
             });
         }

        //   // Attach click event to the nonControllableExpenses link
        //   const nonControllableExpensesLink = document.getElementById("nonControllableExpenses-link");
        //   if (nonControllableExpensesLink) {
        //     nonControllableExpensesLink.addEventListener("click", function (event) {
        //           event.preventDefault(); // Prevent default link behavior
        //           loadContentIntoArea("salesPerformanceModule/totalExpenses.html"); // Load nonControllableExpenses content dynamically
        //       });
        //   }

          // Attach click btn to the addExpenses link
          const addButton = document.getElementById("btn-add-expense");
        if (addButton) {
            addButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default button behavior (e.g., form submission)

                loadContentIntoArea("salesPerformanceModule/addExpenses.html"); // Load the addExpenses content dynamically
            });
        }


         /* ------ MANPOWER MODULE ------ */

         // Attach click event to the unassigned link
         const unassignedLink = document.getElementById("unassigned-link");
         if (unassignedLink) {
            unassignedLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("manpowerModule/unassignedEmployees.html"); // Load unassigned content dynamically
             });
         }

         // Attach click event to the totalEmployees link
         const totalLink = document.getElementById("total-link");
         if (totalLink) {
            totalLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("manpowerModule/totalEmployees.html"); // Load totalEmployees content dynamically
             });
         }

         // Attach click event to the activeEmployees link
         const activeLink = document.getElementById("active-link");
         if (activeLink) {
            activeLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("manpowerModule/activeEmployees.html"); // Load activeEmployees content dynamically
             });
         }

         // Attach click event to the addEmployees link
         const addEmployeeLink = document.getElementById("add-employee-btn");
         if (addEmployeeLink) {
            addEmployeeLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("manpowerModule/addEmployee.html"); // Load addEmployee content dynamically
             });
         }

         // Attach click event to the certifications link
         const certTrackingLink = document.getElementById("certification-btn");
         if (certTrackingLink) {
            certTrackingLink.addEventListener("click", function (event) {
                 event.preventDefault(); // Prevent default link behavior
                 loadContentIntoArea("manpowerModule/certificationTracking.html"); // Load certificationTracking content dynamically
             });
         }

          

        // Retrieve rows after content is loaded
        const franchiseRows = document.querySelectorAll("#franchise-section tbody tr");
        const leasingRows = document.querySelectorAll("#leasing-section tbody tr");
        const salesRows = document.querySelectorAll("#sales-section tbody tr");
        const dineInRows = document.querySelectorAll("#dineIn-section tbody tr");
        const takeOutRows = document.querySelectorAll("#takeOut-section tbody tr");
        const deliveryRows = document.querySelectorAll("#delivery-section tbody tr");
        const expensesRows = document.querySelectorAll("#expenses-section tbody tr");
        const controllableRows = document.querySelectorAll("#controllable-section tbody tr");
        const nonControllableRows = document.querySelectorAll("#nonControllable-section tbody tr");

        // Attach click event to each franchise row
        franchiseRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior (e.g., navigating to another page)
                loadContentIntoArea("contractModule/franchiseDetails.html"); // Load franchise details dynamically
            });
        });

        // Attach click event to each leasing row
        leasingRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("contractModule/leasingDetails.html"); // Load leasing details dynamically
            });
        });

        
        /* ------ SALES PERFORMANCE MODULE ROWS ------ */

        // Attach click event to each all sales row
        salesRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/salesReport.html"); // Load report details dynamically
            });
        });

        // Attach click event to each dineIn row
        dineInRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/salesReport.html"); // Load report details dynamically
            });
        });

        // Attach click event to each takeOut row
        takeOutRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/salesReport.html"); // Load report details dynamically
            });
        });

        // Attach click event to each delivery row
        deliveryRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/salesReport.html"); // Load report details dynamically
            });
        });

        // Attach click event to each expense row
        expensesRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/viewExpenses.html"); // Load report details dynamically
            });
        });

        // Attach click event to each expense row
        controllableRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/viewExpenses.html"); // Load report details dynamically
            });
        });

         // Attach click event to each expense row
         nonControllableRows.forEach(row => {
            row.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default row click behavior
                loadContentIntoArea("salesPerformanceModule/viewExpenses.html"); // Load report details dynamically
            });
        });
    }

    // Load the default content (Dashboard) on initial load
    loadContentIntoArea("dashboard.html");
});
