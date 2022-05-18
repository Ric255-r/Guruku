<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    {{--{{ $rate }}--}}
{{--{{round($query->avg('rating'), 1)}} <br>--}}
    @foreach ($kelas as $query => $item)
        <p>{{ $item->kelas }}</p> /
        @php
            $total = 0;
            $counter = 0;
        @endphp
        @foreach ($rating as $query => $value)
            @if ($value->id_kelas == $item->id)
                @php
                    $total += intval($value->rating);
                    $counter++;
                @endphp
                {{-- <div style="">{{ $tam = $query->rating }}</div>
                <p id="ai"></p> --}}
                {{--{{ $tam }}--}}
                {{--{{ $beh = $query->rating->sum('rating') }}--}}
                {{--{{ $mbek = round($query->avg('rating'),1) }}--}}
                {{--{{ round($query->avg('rating'),1) }}--}}
                {{--{{ $query->sum('rating') }}--}}
                {{--{{ $beh }}--}}
                {{--{{ round($query->avg('rating'),1) }}--}}
                {{--{{ round($teng->avg('rating'),1) }}--}}
            @endif
        @endforeach
        @php
            if($total == null){

            }else{
                $lala = $total / $counter;
                echo $lala;
            }
        @endphp
    @endforeach
    <script>

    </script>
</body>
</html>
