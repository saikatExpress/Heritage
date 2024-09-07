import './bootstrap';

Echo.private(`App.Models.User.${userId}`)
.notification((notification) => {
    console.log(notification.title + ' - ' + notification.content);
    // Display the notification in the UI (e.g., as a toast or in a notification list)
});

