<div>
    Sidebar from includes
    <a href="/home">Dashboard</a>
    @if (auth()->user()->is_admin)
    <a href="/assign-task">Assign Task</a>
    <a href="/users">Users</a>
    @endif
    <a href="#">valor del menú 4</a>
    <a href="#">valor del menú 5</a>
</div>