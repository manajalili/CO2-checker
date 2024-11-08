<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Measure Page</title>
</head>
<body>
    <form action="/" method="GET">
        <label for="zone">Enter Zone:</label>
        <input type="text" id="zone" name="zone" placeholder="Enter zone (e.g., DE)" required>
        
        <button type="submit">Submit</button>
    </form>
    <h1>CO2 Intensity Info</h1>
    
    <p>Zone: {{ $zone }}</p>
    <p>Carbon Intensity: {{ $carbonIntensity }}</p>
    <p>Color: {{ $color }}</p>
</body>
</html>