<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-['Teachers']">
    @extends("layouts.app")

    @section("title", "List of Games")

    @section("content")
    <div>
        <div>
            <a href="/game/add">
                <button class="bg-green-400 text-white px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition-all duration-300">Add Game</button>
            </a>
            <table class="min-w-full mt-[1rem] divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">Game Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">Developer</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">Genres</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($games as $game)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $game->gameName }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $game->developer ? $game->developer->firstName . ' ' . $game->developer->lastName : 'No Developer' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ implode(", ", $game->genres()->pluck("genreName")->toArray()) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($game)
                                <a href="/game/update/{{ $game->id }}">
                                    <button class="bg-blue-500 hover:bg-blue-700 transition duration-300 text-white font-bold py-2 px-4 rounded">Edit</button>
                                </a>
                                @endif
                                @if ($game)
                                <a href="/game/delete/{{ $game->id }}">
                                    <button class="bg-red-500 hover:bg-red-700 transition duration-300 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>
</html>
