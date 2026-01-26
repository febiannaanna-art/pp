<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.php" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.5rem; color: #696cff;">Sneat Admin</span>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

    <li class="menu-item <?= ($current_page == 'index.php') ? 'active' : ''; ?>">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>

    <li class="menu-item <?= (strpos($current_page, 'blog') !== false) ? 'active' : ''; ?>">
      <a href="blog_data.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div>Manajemen Blog</div>
      </a>
    </li>

    <li class="nav-item">
    <a class="nav-link <?= ($current_page == 'pesan_masuk.php') ? 'active' : ''; ?>" href="pesan_masuk.php">
        <div><i class="bx bx-envelope"></i> Pesan Masuk</div>
        <?php if($pesan_baru > 0): ?>
            <span class="badge rounded-pill bg-danger" style="font-size: 0.7rem; padding: 0.35em 0.6em; margin-left: 5px;">
                <?= $pesan_baru; ?>
            </span>
        <?php endif; ?>
    </a>
</li>

    <li class="menu-item <?= (strpos($current_page, 'project') !== false) ? 'active' : ''; ?>">
      <a href="project_data.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-rocket"></i>
        <div>Manajemen Project</div>
      </a>
    </li>

    <li class="menu-item <?= (strpos($current_page, 'about') !== false) ? 'active' : ''; ?>">
      <a href="about_data.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Manajemen About</div>
      </a>
    </li>

    <li class="menu-item <?= (strpos($current_page, 'skills') !== false) ? 'active' : ''; ?>">
      <a href="skills_data.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-code-alt"></i>
        <div>Manajemen Skills</div>
      </a>
    </li>

    <li class="menu-item <?= (strpos($current_page, 'education') !== false) ? 'active' : ''; ?>">
      <a href="education_data.php" class="menu-link">
        <i class="menu-icon bx bx-book text-info fs-3"></i>
        <div>Manajemen Education</div>
      </a>
    </li>
  </ul>
</aside>