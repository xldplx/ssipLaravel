<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body class="font-['Teachers']">
    @extends("layouts.app")

    @section("title", "Add Game")

    @section("content")
    <div class="container mx-auto">
        <div class="max-w-md mx-auto bg-white p-8 my-8 rounded-lg shadow-lg">
            <form action="/game/save" method="POST">
                @csrf
                @if (!empty($game->id))
                <input type="hidden" name="id" value="{{ $game->id }}">
                @endif
                <div class="mb-4">
                    <label for="gameName" class="block text-gray-700 text-sm font-bold mb-2">Game Name</label>
                    <input type="text" name="gameName" id="gameName" placeholder="Enter Game Name" value="{{ isset($game) ? $game->gameName : old('gameName') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="developer_id" class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                    <select name="developer_id" id="" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                        @foreach ($developers as $developer)
                            <option value="{{ $developer->id }}" {{ isset($game) && $game->developer_id == $developer->id ? 'selected' : '' }}>
                                {{ $developer->firstName }} {{ $developer->lastName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="genre_id" class="block text-gray-700 text-sm font-bold mb-2">Genres</label>
                    <select name="genre_id" id="" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                        @foreach ($genres as $genre)
                        @if (isset($game) and in_array($genre->id, $game_genre))
                            <option value="{{ $genre->id }}" selected>{{ $genre->genreName }}</option>
                        @else
                            <option value="{{ $genre->id }}">{{ $genre->genreName }}</option>    
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Save</button>
                    <a href="/game" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                </div>
            </form>
            <div class="mt-4">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
</body>
</html>