<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Holiday Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #0d479d;
        }
        p {
            margin: 10px 0;
        }
        .plan-details {
            margin-top: 20px;
            border-top: 1px solid #aeaeae;
            padding-top: 10px;
        }
        ul {
            list-style-type: square;
            margin-left: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>{{ $plan->title }}</h1>
    <div class="plan-details">
        <p>{{ $plan->description }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($plan->date)->format('F j, Y') }}</p>
        <p><strong>Location:</strong> {{ $plan->location }}</p>

        @if($plan->participants)
            <p><strong>Participants:</strong></p>
            <ul>
                @foreach($plan->participants as $participant)
                    <li>{{ $participant->name }}, {{ $participant->email }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('F j, Y, g:i a') }}</p>
    </div>
</body>
</html>
