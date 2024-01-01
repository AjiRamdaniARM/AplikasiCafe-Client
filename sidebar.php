
<div class="d-flex jusitify-content-center items-center">


<div class="d-flex flex-column m-2 rounded flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img width="30" src="assets/img/logo.jpeg" class="rounded" alt="logo">&nbsp;
      <span class="fs-4">Oniichan </span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="?admin=admin" class="nav-link active bg-danger ">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="?admin=produk" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Produk 
        </a>
      </li>
      <li>
        <a href="?admin=pemesanan" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Pemesanan 
        </a>
      </li>
      <li>
        <a href="?admin=meja" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        Meja Cafe
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Laporan
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://www.pngmart.com/files/21/Admin-Profile-Vector-PNG-Clipart.png" alt="profile" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="?admin=akun">Create User</a></li>
        <li><a class="dropdown-item" href="#">Logout</a></li>
      </ul>
    </div>
  </div>


<?php
  if (isset($_GET['admin'])) {
    $admin = $_GET['admin'];
    include "admin/" . $admin . ".php";
} else {
    header(`location:dashbord.php`);
}
?>  


</div>
 <!-- <a href="?admin=akun"   onclick="showSizes()" ><i class="bi bi-person-gear"></i> Akun Admin</a>  -->