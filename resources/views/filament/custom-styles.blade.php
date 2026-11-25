<style>
    /* =========================================================
       CUSTOM UNISLA THEME FOR FILAMENT ADMIN PANEL
       Aligned with Litbang Pemas UNISLA Public Website Theme
       ========================================================= */

    :root {
        --unisla-primary-950: #022c22;
        --unisla-primary-900: #064e3b;
        --unisla-primary-800: #065f46;
        --unisla-primary-700: #047857;
        --unisla-primary-600: #059669;
        --unisla-primary-500: #10b981;
        --unisla-amber-400: #fbbf24;
        --unisla-amber-500: #f59e0b;
    }

    /* 1. BRAND LOGO SECTION */
    .fi-sidebar-header {
        border-bottom: 1px solid rgba(16, 185, 129, 0.12) !important;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.03) 0%, transparent 100%);
    }

    .dark .fi-sidebar-header {
        border-bottom: 1px solid rgba(16, 185, 129, 0.15) !important;
    }

    /* 2. SIDEBAR NAVIGATION ACTIVE & HOVER STATES */
    .fi-sidebar-item-active > a,
    .fi-sidebar-item-active > button {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.12) 0%, rgba(16, 185, 129, 0.03) 100%) !important;
        border-left: 3.5px solid var(--unisla-primary-600) !important;
        color: var(--unisla-primary-700) !important;
        font-weight: 600 !important;
        border-radius: 0 0.75rem 0.75rem 0 !important;
        box-shadow: 0 1px 2px rgba(16, 185, 129, 0.05);
    }

    .dark .fi-sidebar-item-active > a,
    .dark .fi-sidebar-item-active > button {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.22) 0%, rgba(16, 185, 129, 0.05) 100%) !important;
        border-left: 3.5px solid var(--unisla-primary-500) !important;
        color: #6ee7b7 !important;
    }

    .fi-sidebar-item > a:hover,
    .fi-sidebar-item > button:hover {
        border-radius: 0.75rem !important;
        transition: all 0.2s ease;
    }

    .fi-sidebar-group-label {
        font-size: 0.7rem !important;
        font-weight: 700 !important;
        letter-spacing: 0.075em !important;
        text-transform: uppercase !important;
        color: var(--unisla-primary-700) !important;
    }

    .dark .fi-sidebar-group-label {
        color: #34d399 !important;
    }

    /* 3. TOPBAR ENHANCEMENTS */
    .fi-topbar {
        border-bottom: 1px solid rgba(16, 185, 129, 0.12) !important;
        backdrop-filter: blur(8px) !important;
    }

    /* 4. BUTTONS & PILLS */
    .fi-btn-primary {
        background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
        box-shadow: 0 2px 4px rgba(4, 120, 87, 0.2) !important;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .fi-btn-primary:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        box-shadow: 0 4px 10px rgba(4, 120, 87, 0.3) !important;
        transform: translateY(-1px);
    }

    /* 5. TABLES & CARDS POLISHING */
    .fi-ta-ctn {
        border-radius: 1rem !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05) !important;
        overflow: hidden;
    }

    .fi-section {
        border-radius: 1rem !important;
    }

    /* 6. LOGIN PAGE HARMONIZATION (Matches Public Hero & Footer) */
    body.fi-body:has(.fi-simple-main) {
        background: radial-gradient(circle at 15% 15%, rgba(16, 185, 129, 0.25), transparent 40%),
                    radial-gradient(circle at 85% 85%, rgba(245, 158, 11, 0.15), transparent 45%),
                    linear-gradient(145deg, #022c22 0%, #064e3b 50%, #041a12 100%) !important;
        min-height: 100vh;
        position: relative;
    }

    /* Login Card Glassmorphism */
    .fi-simple-main {
        background: rgba(255, 255, 255, 0.96) !important;
        border: 1px solid rgba(16, 185, 129, 0.25) !important;
        border-radius: 1.5rem !important;
        box-shadow: 0 25px 50px -12px rgba(2, 44, 34, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.3) !important;
        backdrop-filter: blur(16px) !important;
        padding: 2.25rem 2rem !important;
    }

    .dark .fi-simple-main {
        background: rgba(6, 78, 59, 0.88) !important;
        border: 1px solid rgba(52, 211, 153, 0.25) !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6) !important;
    }

    /* Accent highlight bar on login container */
    .fi-simple-main::before {
        content: "";
        position: absolute;
        top: 0;
        left: 2rem;
        right: 2rem;
        height: 3px;
        background: linear-gradient(90deg, #10b981 0%, #fbbf24 50%, #10b981 100%);
        border-radius: 9999px;
    }
</style>
