<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
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

    @section("title", "List of Developers")

    @section("content")
    <div>
        <a href="/developer/add">
            <button class="bg-green-400 text-white px-[2rem] py-[1rem] rounded-lg shadow-lg hover:scale-110 transition-all duration-300">
                Add Developer
            </button>
        </a>
        <table class="min-w-full mt-[1rem] divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">First Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider">Last Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase text-center tracking-wider" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($developers as $developer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $developer->firstName }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $developer->lastName }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/developer/update/{{ $developer->id }}">
                                <button class="bg-blue-500 hover:bg-blue-700 transition duration-300 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                            </a>
                            <a href="/developer/delete/{{ $developer->id }}">
                                <button class="bg-red-500 hover:bg-red-700 transition duration-300 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>