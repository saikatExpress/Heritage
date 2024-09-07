<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .notification-list li {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .notification-list li:last-child {
            border-bottom: none;
        }
        .notification-title {
            font-weight: bold;
        }
        .notification-content {
            margin: 10px 0;
        }
        .notification-time {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Notifications</h1>

        <ul class="notification-list list-unstyled">
            <!-- Loop through notifications -->
            <li>
                <div class="notification-title">Notification Title</div>
                <div class="notification-content">Notification content goes here.</div>
                <div class="notification-time">Time ago</div>
            </li>
            <!-- Repeat for each notification -->
        </ul>

        <form action="/notifications/mark-as-read" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">Mark all as read</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
