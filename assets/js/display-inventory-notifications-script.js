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
                    var notificationItem = "";

                    if (
                        notification.activity_type == "new_agreement_contract"
                    ) {
                        notificationItem = `
                        <li>
                            <h3>${formatDate(notification.datetime)}</h3>
                            <h4 class="text-success">NEWLY OPENED</h4>
                            <h4>${notification.franchisee}</h4>
                            <h4>${notification.location}</h4>
                            <button type="button" class="add-stock">Add stock</button>
                        </li>
                    `;
                    }

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

function formatDate(datetime) {
    var date = new Date(datetime);
    return date.toLocaleDateString("en-US", {
        year: "numeric",
        month: "numeric",
        day: "numeric",
    });
}
