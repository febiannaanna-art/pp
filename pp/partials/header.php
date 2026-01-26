<section id="hero" class="hero section">
    <img src="admin/assets/img/gambar1.jpeg" alt="Celsi Febiana" class="hero-bg">
    
    <div class="container text-center content-box">
        <h2 class="welcome-text">WELCOME TO MY PORTFOLIO</h2>
        <h1 class="main-name">HI, I'M <span class="highlight">CELSI FEBIANA</span></h1>
        <p class="sub-text">I am a Student at SMK Muhammadiyah 2 Bantul</p>
        
        <div class="mt-4">
<a href="#about" class="btn btn-primary rounded-pill px-4 py-2">Get Started</a>        </div>
    </div>
</section>

<style>
    .hero {
        position: relative;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center; 
        justify-content: center; 
        overflow: hidden;
        color: white;
        text-align: center;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -2;
    }

    .hero::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); 
        z-index: -1;
    }

    .content-box {
        position: relative;
        z-index: 1;
        width: 100%;
        padding: 0 15px;
    }

    .welcome-text {
        font-size: 1.2rem;
        letter-spacing: 3px;
        font-weight: 400;
        margin-bottom: 10px;
    }

    .main-name {
        font-size: 4.5rem; 
        font-weight: 800;
        margin: 10px 0;
        line-height: 1.2;
    }

    .highlight {
        color: #4e73df; 
    }

    .sub-text {
        font-size: 1.25rem;
        opacity: 0.9;
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #3756b5;
        transform: translateY(-3px);
    }
</style>