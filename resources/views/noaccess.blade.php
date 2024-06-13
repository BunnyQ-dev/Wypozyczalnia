<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brak dostępu</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .no-access-container {
            text-align: center;
            max-width: 80%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .no-access-container h1 {
            font-size: 24px;
            color: #ff0000;
            margin-bottom: 10px;
        }

        .no-access-container p {
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 768px) {
            .no-access-container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
<div class="no-access-container">
    <h1>Nie masz dostępu do tej strony</h1>
    <p>Prosimy o kontakt z administratorem w celu uzyskania dostępu.</p>
</div>
</body>
</html>
