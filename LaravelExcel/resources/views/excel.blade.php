<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Import/Export Excel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 mt-5">
                <div class="p-5 border-2 border border-secondary rounded">
                    <h2>User data: </h2>
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('import-user') }}">
                        @csrf

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <label>Select File</label>
                        <input type="file" name="file" class="form-control" />
                        <div class="mt-5">
                            <button type="submit" class="btn btn-info">Import</button>
                            <a href="{{ route('export-user') }}" class="btn btn-primary float-right">Export Excel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>