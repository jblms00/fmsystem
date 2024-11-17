$(document).ready(function () {
    fetchNotifications();
});

function fetchNotifications() {
    $.ajax({
        url: "../../phpscripts/get-inventory-notification.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var notificationList = $("#notification-list");
            notificationList.empty();

            if (response.status === "success") {
                response.notifications.forEach(function (notification) {
                    var notificationItem = `
                        <li>
                            <h3>${formatDate(notification.datetime)}</h3>
                            <h4 class="text-success">NEWLY OPENED</h4>
                            <h4>${notification.franchisee}</h4>
                            <h4>${notification.location}</h4>
                            <button type="button" onclick="handleAddStock('${
                                notification.notification_id
                            }', '${notification.ac_id}', '${notification.franchisee}', '${
                        notification.location
                    }')" class="add-stock">Add stock</button>
                        </li>
                    `;
                    notificationList.append(notificationItem);
                });
            } else {
                notificationList.append(
                    `<li class="text-danger text-center">${response.message}</li>`
                );
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching notifications:", error);
            var notificationList = $("#notification-list");
            notificationList.append(
                `<li class="text-danger text-center">Failed to load notifications.</li>`
            );
        },
    });
}

function handleAddStock(notificationId, acId, franchisee, branch) {
    // Mark notification as resolved via AJAX
    $.ajax({
        url: "../../phpscripts/get-inventory-notification.php",
        method: "POST",
        data: { notification_id: notificationId },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                // Refresh the notification list after resolving
                fetchNotifications();

                // Navigate to the inventory page
                window.location.href = `inventoryNewReport?id=${acId}&franchisee=${franchisee}&branch=${branch}`;
            } else {
                console.error("Failed to resolve notification:", response.message);
                alert("Failed to resolve notification. Please try again.");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error resolving notification:", error);
            alert("Error occurred while resolving the notification.");
        },
    });
}

function formatDate(datetime) {
    var date = new Date(datetime);
    return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "numeric",
        day: "numeric",
    });
}
