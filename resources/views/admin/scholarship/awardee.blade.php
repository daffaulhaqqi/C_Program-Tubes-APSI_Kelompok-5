<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Awardee</title>
</head>
<body>
    <h1>Select Awardee</h1>

    <p>{{$countParticipants}}</p>

    <form action="{{ route('scholarship.selectawardee', $scholarships->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        @if($countParticipants == 0)
            <p>Gaada orang</p>
        @else
            <h2>Participants</h2>
            @foreach ($participants as $participant)
                <div>
                    <input type="checkbox" name="awardee[]" value="{{ $participant->id }}">
                    <label for="awardee[]">{{ $participant->fullname }}</label>
                </div>
            @endforeach
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
