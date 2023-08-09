<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 150px;
            height: 150px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid black;
            font-size: 90px;
            font-weight: bold;
            cursor: pointer;
        }
        td a {
            display: flex;
            text-decoration: none;
            color: black;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;

        }
        td a:hover {
            background: grey;
        }
        .btn-reset {
            display: block;
            padding: 10px 30px;
            width: fit-content;
            height: fit-content;

            font-size: 24px;
            font-weight: bold;
            cursor: pointer;

            border-radius: 9px;
            text-decoration: none;
            color: white;
            background-color: grey;
        }
        .btn-reset:hover {
            background-color: red;
        }

        .game-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            gap: 30px;
        }
        .page-title {
            font-size: 60px;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1 class="page-title">Tic Tac Toe</h1>
        <table>
            <tbody>
                <tr>
                    <td>-</td><td>-</td><td>-</td>
                </tr>
                <tr>
                    <td>-</td><td>-</td><td>-</td>
                </tr>
                <tr>
                    <td>-</td><td>-</td><td>-</td>
                </tr>
            <tbody>
        </table>
    </div>
</body>