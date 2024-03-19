<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>Bienvenido</h1>
        <ul>
            <li><a href="{{ route('TypeEquipments.index') }}">TypeEquipments</a></li>
            <li><a href="{{ route('areas.index') }}">Areas</a></li>
            <li><a href="{{ route('typevehicles.index') }}">TypeVehicles</a></li>
            <li><a href="{{ route('positions.index') }}">Positions</a></li>
        </ul>
    </div>
</body>
</html>
