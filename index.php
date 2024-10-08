<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #37b7c3;
            background-image: radial-gradient(#ebf4f6 2px, transparent 2px), radial-gradient(#ebf4f6 2px, transparent 2px);
            background-size: 61px 61px;
            background-position: 0 0, 30.5px 30.5px;
        }

        .container {
            background-color: #71c9ce;
            border: 2px solid white;
            border-radius: 20px;
            padding: 30px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
        }

        .link-button {
            display: block;
            padding: 10px;
            background-color: #71c9ce;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .link-button:hover {
            background-color: #00796B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang Di Quiz</h1>
        <a href="biodata.php" class="link-button">Start</a>
        <a href="view_ranking.php" class="link-button">View Ranking</a>
    </div>
</body>
</html>
