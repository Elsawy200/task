<!-- preview.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include any other CSS files or stylesheets -->
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-4">User Preview</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title">User Information</h2>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->firstName.' '.$user->lastName }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Form Progress</h2>
        </div>
        <div class="card-body">
            @if($user)
                <p><strong>Step 1:</strong> First Name - {{ $user->firstName }}</p>
                <p><strong>Step 2:</strong> Last Name  - {{ $user->lastName }}</p>
                <p><strong>Step 3:</strong> Phone - {{ $user->phone }}</p>

            @else
                <p>No form progress found.</p>
            @endif
        </div>

        <form style="margin: 20px"  method="post">
            @csrf
            <a  href="{{route('step3')}}"  class="btn btn-dark btn-block">back</a>
        </form>
    </div>

    @if(session('msg'))
        <div class="alert alert-success mt-4" role="alert">
            {{ session('msg') }}
        </div>
    @endif
</div>

</body>
</html>
