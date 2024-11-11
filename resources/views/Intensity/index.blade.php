<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Measure Page</title>
</head>
<body>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <br>
    <form action="/" method="GET">
        <label for="zone">Enter Zone:</label>
        <input type="text" id="zone" name="zone" placeholder="Enter zone (e.g., DE)" required>
        <button type="submit">Submit</button>
    </form>
    <h1>CO2 Intensity Info</h1>
    
    @if(isset($zone) && isset($carbonIntensity) && isset($color))
        <p >Zone: {{ $zone }}</p>
        <p>Carbon Intensity: {{ $carbonIntensity }}</p>
        <p style="
            color: 
                @if($color === 'RED') #FF0000;
                @elseif($color === 'GREEN') #008000;
                @elseif($color === 'YELLOW') #FFA500;
                @endif
            font-weight: bold;">{{ $color }}</p>
    @endif
</body>
</html>