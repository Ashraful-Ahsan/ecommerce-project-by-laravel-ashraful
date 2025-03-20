<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
    <header class="header">
        @include('admin.header')
    </header>

    @include('admin.sidebar')

    <!-- Page Content -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>Contact Messages</h2>
            </div>
        </div>

        <div class="container-fluid">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messeges as $messege)
                        <tr>
                            <td>{{ $messege->id }}</td>
                            <td>{{ $messege->name }}</td>
                            <td>{{ $messege->email }}</td>
                            <td>{{ $messege->phone ?? 'N/A' }}</td>
                            <td>{{ $messege->message }}</td>
                            <td>{{ $messege->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                <form action="{{ route('contact.destroy', $messege->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No messages found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript files -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>
