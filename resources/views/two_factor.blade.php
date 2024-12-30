<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication</title>
</head>
<body>
    <h1>Two-Factor Authentication</h1>
    <form method="POST" action="{{ route('two-factor.verify') }}">
        @csrf
        <label for="two_factor_code">Enter the 6-digit code:</label>
        <input type="text" name="two_factor_code" id="two_factor_code" required>
        <button type="submit">Verify</button>
    </form>
    @if (session('two_factor_code'))
        <p>For development purposes, your code is: {{ session('two_factor_code') }}</p>
    @endif
</body>
</html>
