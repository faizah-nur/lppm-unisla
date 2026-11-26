<style>
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
    .fi-sidebar-item-active>a,
    .fi-sidebar-item-active>button {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.12) 0%, rgba(16, 185, 129, 0.03) 100%) !important;
        border-left: 3.5px solid var(--unisla-primary-600) !important;
        color: var(--unisla-primary-700) !important;
        font-weight: 600 !important;
        border-radius: 0 0.75rem 0.75rem 0 !important;
        box-shadow: 0 1px 2px rgba(16, 185, 129, 0.05);
    }

    .dark .fi-sidebar-item-active>a,
    .dark .fi-sidebar-item-active>button {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.22) 0%, rgba(16, 185, 129, 0.05) 100%) !important;
        border-left: 3.5px solid var(--unisla-primary-500) !important;
        color: #6ee7b7 !important;
    }

    .fi-sidebar-item>a:hover,
    .fi-sidebar-item>button:hover {
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

    /* 6. LOGIN PAGE - CLEAN BASIC WHITE */
    body.fi-body:has(.fi-simple-main) {
        background-color: #f8fafc !important;
        background-image: none !important;
        min-height: 100vh;
    }

    .dark body.fi-body:has(.fi-simple-main) {
        background-color: #0f172a !important;
        background-image: none !important;
    }

    /* Basic White Login Card */
    .fi-simple-main {
        background-color: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 1rem !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05) !important;
        padding: 2rem !important;
    }

    .dark .fi-simple-main {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3) !important;
    }

    /* Remove colorful accent bar */
    .fi-simple-main::before {
        display: none !important;
        content: none !important;
    }
</style>
