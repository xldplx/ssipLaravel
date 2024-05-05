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
            <form action="/genre/save" method="POST">
                @csrf
                @if (!empty($genre->id))
                <input type="hidden" name="id" value="{{ $genre->id }}">    
                @endif
                <div class="mb-4">
                    <label for="genreName" class="block text-gray-700 text-sm font-bold mb-2">Genre Name</label>
                    <input type="text" name="genreName" id="" placeholder="Enter the Genre Name" value="{{ isset($genre) ? $genre->genreName : old('genreName') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Save</button>
                    <a href="/genre" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                </div>
                <div>
                    @if (!empty($errors))
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            </form>
        </div>
    </div>
    @endsection
</body>
</html>