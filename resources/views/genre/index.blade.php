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

    @section("title", "List of Genres")

    @section("content")   
    <div>
        <a href="/genre/add">
            <button class="bg-green-400 text-white px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition-all duration-300">Add Genre</button>
        </a>
        <table class="min-w-full mt-[1rem] divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($genres as $genre)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $genre->genreName }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($genre)
                                <a href="/genre/update/{{ $genre->id }}">
                                    <button class="bg-blue-500 hover:bg-blue-700 transition duration-300 text-white font-bold py-2 px-4 rounded">Edit</button>
                                </a>
                                @endif
                                @if ($genre)
                                <a href="/genre/delete/{{ $genre->id }}">
                                    <button class="bg-red-500 hover:bg-red-700 transition duration-300 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </a>
                                @endif
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection 
</body>
</html>