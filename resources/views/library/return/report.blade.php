<!DOCTYPE html>
<html>
<head>
    <title>Book Return Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        h2, h4{
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            padding: 10px;
            text-align: center;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        .badge {
            padding: 5px;
            color: white;
            border-radius: 3px;
        }
        .bg-warning {
            background-color: orange;
        }
        .bg-success {
            background-color: green;
        }
    </style>
</head>
<body>
    <h2>Book Return Report</h2>
    <h4>Filtered from {{ $startDate }} to {{ $endDate }}</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Patron</th>
                <th>Description</th>
                <th>Checkout Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Penalty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filterByDate as $index => $filter)
                <tr class="align-middle">
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>{{ $filter->classroom_name }} - ({{ $filter->identity_number }}) - {{ $filter->name }}</td>
                    <td>{{ $filter->description }}</td>
                    <td>{{ $filter->checkout_date }}</td>
                    <td>{{ $filter->due_date }}</td>
                    <td>
                        @if($filter->status == 'borrowing')
                            <span class="badge bg-warning">{{ $filter->status }}</span>
                        @elseif($filter->status == 'returned')
                            <span class="badge bg-success">{{ $filter->status }}</span>
                        @endif
                    </td>
                    <td>
                        @if($filter->status == 'borrowing')
                            @php
                                $dueDate = \Carbon\Carbon::parse($filter->due_date);
                                $today = \Carbon\Carbon::now();
                                $penalty = $today->diffInDays($dueDate); 
                                $penaltyRate = 1000;
                                $penaltyAmount = $penalty * $penaltyRate; 
                            @endphp
                            @if ($penalty > 0)
                                {{ $penaltyAmount }} 
                            @else
                                0
                            @endif
                        @else
                            0
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
