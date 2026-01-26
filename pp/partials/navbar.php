<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_blog_page = ($current_page == 'blog.php' || $current_page == 'blog_detail.php');
?>

<nav class="navbar navbar-expand-lg fixed-top <?= $is_blog_page ? 'navbar-light bg-white shadow-sm' : 'navbar-dark'; ?>" id="mainNav">
    <div class="container">
        <a class="navbar-brand fw-normal" href="index.php" style="font-size: 1rem; letter-spacing: 0.5px;">
            CELSI<span class="text-primary">.</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-center ms-2">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link <?= $is_blog_page ? 'active text-primary' : ''; ?>" href="blog.php">Blog</a></li> 
                
                <li class="nav-item ms-2">
                    <a class="btn btn-primary rounded-pill px-3 py-1 shadow-sm fw-bold" style="font-size: 0.75rem;" href="index.php#contact">Contact Me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Mencegah konten tertutup navbar di halaman blog */
    <?php if ($is_blog_page): ?>
    body { 
        padding-top: 110px !important; 
    }
    #mainNav .nav-link, #mainNav .navbar-brand { color: #333 !important; }
    <?php endif; ?>

    #mainNav {
        transition: all 0.3s ease-in-out;
        padding: 10px 0;
    }

    .navbar-brand {
        font-weight: 400 !important;
    }

    .nav-link {
        font-weight: 400 !important;
        font-size: 0.85rem;
        padding: 0.5rem 0.6rem !important;
    }

    #mainNav.navbar-scrolled {
        background: rgba(255, 255, 255, 0.98) !important;
        padding: 7px 0;
    }
</style>

<script>
    <?php if (!$is_blog_page): ?>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        if (window.scrollY > 30) {
            nav.classList.add('navbar-scrolled', 'navbar-light');
            nav.classList.remove('navbar-dark');
        } else {
            nav.classList.remove('navbar-scrolled', 'navbar-light');
            nav.classList.add('navbar-dark');
        }
    });
    <?php endif; ?>
</script>