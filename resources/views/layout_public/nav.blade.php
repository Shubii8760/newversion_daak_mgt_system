<div class="m-4">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Daak_Management_system</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('complaint') }}" class="nav-item nav-link">Application</a>
                    <a href="#" class="nav-item nav-link">All_Application</a>

                </div>
                <div class="navbar-nav ms-auto">
                    <a href="{{route('logout') }}" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</div>
