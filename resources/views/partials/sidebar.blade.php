<div class="sidebar p-3" style="width: 250px;">
    <h4>Admin Panel</h4>
    <hr>
    <a href="{{ route('admin.dashboard') }}" class="d-block mb-2">Dashboard</a>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit" class="btn-danger btn-sm w-100">Logout</button>
    </form>
</div>
