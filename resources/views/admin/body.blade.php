<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>

<style>
    .page-header {
        padding: 40px 0 20px;
        background: transparent;
    }
    
    .page-header h2 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #fff;
        font-weight: 800;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.5rem;
    }

    /* ✨ Premium Glow Statistic Cards */
    .stat-card {
        background: #161b22;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-bottom: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255, 255, 255, 0.12);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .stat-card .icon-box {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .stat-card .info-text {
        color: #8b949e;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .stat-card .main-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: #fff;
        margin: 0;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* 🌈 Global Glow Accents */
    .glow-blue { border-bottom: 3px solid #00b4d8; }
    .glow-blue .icon-box { background: rgba(0, 180, 216, 0.15); color: #00b4d8; }
    
    .glow-purple { border-bottom: 3px solid #a855f7; }
    .glow-purple .icon-box { background: rgba(168, 85, 247, 0.15); color: #a855f7; }
    
    .glow-orange { border-bottom: 3px solid #f59e0b; }
    .glow-orange .icon-box { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
    
    .glow-green { border-bottom: 3px solid #10b981; }
    .glow-green .icon-box { background: rgba(16, 185, 129, 0.15); color: #10b981; }

    /* Footer Modernization */
    .footer {
        background: #0d1117;
        padding: 30px 0;
        border-top: 1px solid #30363d;
        color: #6e7681;
        font-size: 0.9rem;
    }
</style>

<div class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">
            <i data-lucide="layout-dashboard" style="color: #00b4d8"></i> 
            Admin Overview
        </h2>
    </div>
</div>

<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-6">
                <div class="stat-card glow-blue">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box">
                            <i data-lucide="users"></i>
                        </div>
                        <span style="color: #00b4d8; font-size: 0.8rem; font-weight: 600;">Active Users</span>
                    </div>
                    <div>
                        <p class="info-text">Total Clients</p>
                        <h3 class="main-number">{{ $user }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="stat-card glow-purple">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box">
                            <i data-lucide="package"></i>
                        </div>
                        <span style="color: #a855f7; font-size: 0.8rem; font-weight: 600;">In Stock</span>
                    </div>
                    <div>
                        <p class="info-text">Products</p>
                        <h3 class="main-number">{{ $product }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="stat-card glow-orange">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box">
                            <i data-lucide="shopping-cart"></i>
                        </div>
                        <span style="color: #f59e0b; font-size: 0.8rem; font-weight: 600;">Sales Flow</span>
                    </div>
                    <div>
                        <p class="info-text">Total Orders</p>
                        <h3 class="main-number">{{ $orders }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="stat-card glow-green">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-box">
                            <i data-lucide="truck"></i>
                        </div>
                        <span style="color: #10b981; font-size: 0.8rem; font-weight: 600;">Completed</span>
                    </div>
                    <div>
                        <p class="info-text">Delivered</p>
                        <h3 class="main-number">{{ $delveried }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="footer">
    <div class="container-fluid text-center">
        <p class="no-margin-bottom">
            &copy; {{ date('Y') }} <strong>Central Admin Panel</strong>. All rights reserved.
        </p>
    </div>
</footer>

<script>
    // Initialize Lucide Icons
    lucide.createIcons();
</script>