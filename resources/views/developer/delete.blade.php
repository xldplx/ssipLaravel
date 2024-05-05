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

    @section("title", "Delete Developer")

    @section("content")
    <div class="container mx-auto">
        <div class="max-w-md mx-auto bg-white p-8 my-8 rounded-lg shadow-lg">
            <form action="/developer/delete/{{ $developer->id }}" method="POST" class="space-y-8">
                @csrf
                <div>
                    <h1 class="font-bold text-gray-700">Are you sure you want to delete:</h1>
                    <h1>Developer: {{ $developer->firstName }} {{ $developer->lastName }}?</h1>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Delete</button>
                    <a href="/developer" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
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
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>