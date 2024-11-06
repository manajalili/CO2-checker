@extends('welcome')

@section('content')
<h2>Carbon Intensity Report</h2>

@if(isset($carbonIntensity))
        <p style="
            color: 
                @if($color === 'RED') #FF0000;
                @elseif($color === 'GREEN') #008000;
                @elseif($color === 'YELLOW') #FFA500;
                @endif
            font-weight: bold;">
            Carbon Intensity: {{ $carbonIntensity }} gCO2eq/kWh
        </p>
    @else
        <p>{{ $error ?? 'No data available' }}</p>
    @endif
@endsection