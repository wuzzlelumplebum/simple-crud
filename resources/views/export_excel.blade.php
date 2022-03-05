<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Employees List Excel Report</title>
        <style>
            table{
                width: 100%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
            }
            h2, th {
                text-align: center;
            }
            td {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h2>Employees List Data</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>E-mail Address</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $key=1
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $key++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>