<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Winner</title>
</head>
<body>
    <h1>Select Winner</h1>

    <p>{{$countParticipants}}</p>

    <form action="{{ route('competition.selectwinner', $competitions->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        @if($countParticipants == 0)
            <p>Gaada orang</p>
        @elseif($countParticipants == 1)
            <label for="winner1">Juara 1</label>
            <select name="winner1" id="winner1">
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
                @endforeach
            </select>

        @elseif($countParticipants == 2)
            <label for="winner1">Juara 1</label>
            <select name="winner1" id="winner1">
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
                @endforeach
            </select>

            <label for="winner2">Juara 2</label>
            <select name="winner2" id="winner2">
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
                @endforeach
            </select>

        @else
        <label for="winner1">Juara 1</label>
            <select name="winner1" id="winner1">
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
                @endforeach
            </select>

            <label for="winner2">Juara 2</label>
            <select name="winner2" id="winner2">
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
                @endforeach
            </select>
        <label for="winner3">Juara 3</label>
        <select name="winner3" id="winner3">
            @foreach ($participants as $participant)
                <option value="{{ $participant->id }}">{{ $participant->fullname }}</option>
            @endforeach
        </select>
        @endif
        <button type="submit">Submit</button>
    </form>
    @if ($errors->any())
    <script>
        var errorMessage = @json($errors->all());
        alert(errorMessage.join('\n'));
    </script>
    @endif
</body>
</html>
