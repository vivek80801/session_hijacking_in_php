<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable web app</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            height: 90vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        input, button {
            padding: 1rem;
            margin: 0.45rem;
            border-radius: 5%;
        }
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        button {
            font-weight: bold;
            font-size: 1.25rem;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 1s ease-in-out;
        }
        button:hover {
            background-color: skyblue;
            color: black;
        }
    </style>
</head>
<body>
