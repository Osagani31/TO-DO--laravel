
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorize Application</title>
</head>
<body>
    <main>
        <h1>Authorize Application</h1>

        <p>
            <strong>{{ $client->name }}</strong>
            is requesting permission to access your account.
        </p>

        @if (count($scopes) > 0)
            <h2>Requested permissions</h2>

            <ul>
                @foreach ($scopes as $scope)
                    <li>{{ $scope->description ?? $scope->id }}</li>
                @endforeach
            </ul>
        @else
            <p>No additional permissions requested.</p>
        @endif

        <form method="POST" action="{{ route('passport.authorizations.approve') }}">
            @csrf

            <input type="hidden" name="state" value="{{ $request->get('state') }}">
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">

            <button type="submit">Authorize</button>
        </form>

        <form method="POST" action="{{ route('passport.authorizations.deny') }}">
            @csrf
            @method('DELETE')

            <input type="hidden" name="state" value="{{ $request->get('state') }}">
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">

            <button type="submit">Deny</button>
        </form>
    </main>
</body>
</html>
