<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teachers:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
</head>
<body class="font-['Teachers']">
    <nav class="border flex justify-center gap-[2rem] items-center py-[2rem]">
        <a href="/game">
            <button class="border px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition duration-300">Game</button>
        </a>
        <a href="/developer">
            <button class="border px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition duration-300">Developer</button>
        </a>
        <a href="/genre">
            <button class="border px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition duration-300">Genre</button>
        </a>
    </nav>
    <div class="flex justify-center items-center text-center py-[1rem]">
        @yield("content")
    </div>
</body>
</html>