
@section('header')

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container">

    <a class="navbar-brand m-8" href="dashboard.php"><img src="{{ asset('assets/img/logo.png') }}" width="70"></a>

    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('addUser') }}">Add User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="info.php">Summery</a>
        </li>

      </ul>

      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user'])): ?>
          <li class="nav-item">
            <p class="navbar-text me-2">Hello, <?= htmlspecialchars($_SESSION['user']); ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../backend/logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>

@endsection