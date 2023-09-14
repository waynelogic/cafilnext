<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новая запись #{{ $formRecord->id }} на сайте</title>
    <style>
        table {
            font-family: Calibri, Helvetica, sans-serif;
            width: 650px;
            border-top: 7px solid #FF8630;
            border-collapse: collapse;
            text-align: center;
        }
        td, th {
            border: 1px solid #FF8630;
            padding: 10px;
            vertical-align: top;
            line-height: 1.2;
        }
    </style>
</head>
<body>
<main>
    <h2>Новая запись #{{ $formRecord->id }} на сайте</h2>
    <table>
        <thead>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formRecord->form_data as $key => $value)
                <tr>
                    <td>{{ $value }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</main>
</body>
</html>
