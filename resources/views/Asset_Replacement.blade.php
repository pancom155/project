<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System - Asset Replacement</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --sidebar-bg: #1e293b;
            --sidebar-text: #cbd5e1;
            --sidebar-hover: #334155;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', system-ui, sans-serif;
            color: #334155;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling - EXACTLY AS PROVIDED */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header .logo {
            font-weight: 700;
            font-size: 22px;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-header .logo i {
            color: var(--primary-light);
        }

        .sidebar-section {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-section-title {
            padding: 0 20px 10px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #94a3b8;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu-item:hover {
            background: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--primary-light);
        }

        .sidebar-menu-item.active {
            background: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--primary-light);
        }

        .sidebar-menu-item i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .sidebar-menu-item span {
            font-size: 14px;
        }

        .sidebar-menu-item.badge-item {
            justify-content: space-between;
        }

        .sidebar-menu-item .badge {
            background: var(--primary-light);
            font-size: 11px;
            padding: 2px 6px;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
            width: calc(100% - 260px);
            background-color: #f8f9fa;
        }

        /* Dropdown menu styling */
        .sidebar-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .sidebar-dropdown.open {
            max-height: 2000px;
        }

        .sidebar-dropdown-item {
            padding: 8px 20px 8px 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 13px;
            border-left: 3px solid transparent;
        }

        .sidebar-dropdown-item:hover {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar-dropdown-item.active {
            background: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--primary-light);
        }

        .sidebar-dropdown-item i {
            font-size: 14px;
            width: 20px;
            text-align: center;
        }

        /* Section title with toggle */
        .section-title-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 0 20px 10px;
        }

        .section-title-toggle:hover {
            color: white;
        }

        .toggle-icon {
            font-size: 10px;
            transition: transform 0.3s;
        }

        .toggle-icon.open {
            transform: rotate(90deg);
        }

        /* Nested dropdown */
        .sidebar-nested-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .sidebar-nested-dropdown.open {
            max-height: 2000px;
        }

        .sidebar-nested-item {
            padding: 8px 20px 8px 70px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 13px;
            border-left: 3px solid transparent;
        }

        .sidebar-nested-item:hover {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar-nested-item.active {
            background: var(--sidebar-hover);
            color: white;
            border-left: 3px solid var(--primary-light);
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 20px 15px;
            }
            
            .mobile-menu-toggle {
                display: block !important;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 999;
                background: var(--primary);
                color: white;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 5px;
                font-size: 20px;
                cursor: pointer;
            }
        }

        .mobile-menu-toggle {
            display: none;
        }

        /* Asset Replacement Specific Styles */
        .page-header {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid var(--primary);
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--secondary);
            font-size: 14px;
        }

        .current-user-section {
            background: var(--primary-light);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            display: inline-flex;
            flex-direction: column;
            gap: 5px;
        }

        .user-label {
            font-weight: 600;
            font-size: 13px;
        }

        .user-value {
            font-size: 14px;
        }

        /* Replacement Container */
        .replacement-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .section-header {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-header i {
            color: var(--primary);
        }

        /* Two Column Layout */
        .two-column-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Three Column Layout */
        .three-column-form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 14px;
            display: block;
        }

        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
            transition: all 0.3s;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .form-control.readonly {
            background-color: #f8fafc;
            color: #64748b;
            cursor: not-allowed;
        }

        /* Search Box */
        .search-box {
            position: relative;
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .search-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary);
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Replacement ID Display */
        .replacement-id {
            font-family: monospace;
            font-size: 22px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
            margin: 15px 0;
            padding: 12px;
            background: #f8fafc;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            text-align: center;
        }

        /* Asset Info Display */
        .asset-info-display {
            background: #f0f7ff;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid var(--primary);
        }

        .asset-info-row {
            display: grid;
            grid-template-columns: 150px 1fr 150px 1fr;
            gap: 15px;
            margin-bottom: 10px;
        }

        .asset-info-label {
            font-weight: 600;
            color: var(--secondary);
            font-size: 14px;
        }

        .asset-info-value {
            font-weight: 500;
            color: var(--dark);
            font-size: 14px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--light);
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
        }

        /* Notes Section */
        .notes-section {
            margin-top: 20px;
        }

        .notes-textarea {
            width: 100%;
            min-height: 80px;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            resize: vertical;
        }

        .notes-textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        /* Status Badge */
        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .two-column-form {
                grid-template-columns: 1fr;
            }
            
            .three-column-form {
                grid-template-columns: 1fr;
            }
            
            .asset-info-row {
                grid-template-columns: 1fr;
                gap: 5px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .mobile-menu-toggle {
                display: block !important;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 999;
                background: var(--primary);
                color: white;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 5px;
                font-size: 20px;
                cursor: pointer;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
        }

        /* Hide original sidebar-section-title for sections with toggles */
        .sidebar-section:has(.section-title-toggle) > .sidebar-section-title {
            display: none;
        }

        /* Asset Section Styling */
        .asset-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--border-color);
        }
    </style>
</head>
<body>
    <!-- Mobile menu toggle button -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar (EXACTLY AS PROVIDED - NO CHANGES) -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="bi bi-box-seam"></i>
                <span>Asset System</span>
            </div>
        </div>
        
        <!-- TRANSACTIONS Section -->
        <div class="sidebar-section">
            <div class="section-title-toggle" id="transactionsToggle">
                <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-arrow-left-right"></i>
                    TRANSACTIONS
                </div>
                <i class="bi bi-chevron-right toggle-icon"></i>
            </div>
            <div class="sidebar-dropdown" id="transactionsMenu">
                <div class="sidebar-dropdown-item" data-section="new-assets" onclick="window.location.href='{{ route('home') }}'">
                    <i class="bi bi-plus-circle"></i>
                    <span>New Assets</span>
                </div>

                <div class="sidebar-dropdown-item" data-section="open-records" onclick="window.location.href='{{ route('or') }}'">
                    <i class="bi bi-folder2-open"></i>
                    <span>Open Records</span>
                </div>

                <div class="sidebar-dropdown-item" data-section="bulk-upload" onclick="window.location.href='{{ route('bulk_upload') }}'">
                    <i class="bi bi-upload"></i>
                    <span>Bulk Upload</span>
                </div>

                <div class="sidebar-dropdown-item" data-section="location-transfer" onclick="window.location.href='{{ route('location_transfer') }}'">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Location Transfer</span>
                </div>
              
                <div class="sidebar-dropdown-item active" data-section="asset-replacement" onclick="window.location.href='{{ route('asset_replacement') }}'">
                    <i class="bi bi-arrow-repeat"></i>
                    <span>Asset Replacement</span>
                </div>

               
                
                <div class="sidebar-dropdown-item" data-section="asset-disposal">
                    <i class="bi bi-trash"></i>
                    <span>Asset Disposal</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="form-8105">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Form 8105 (Farm IN)</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="form-8106">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Form 8106 (Farm OUT)</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="pre-asset-recognition">
                    <i class="bi bi-check-circle"></i>
                    <span>Pre-Asset Recognition</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="loan-assets">
                    <i class="bi bi-arrow-up-right"></i>
                    <span>Loan Assets</span>
                </div>
            </div>
        </div>
        
        <!-- APPROVAL QUEUES Section -->
        <div class="sidebar-section">
            <div class="section-title-toggle" id="approvalQueuesToggle">
                <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-clipboard-check"></i>
                    APPROVAL QUEUES
                </div>
                <i class="bi bi-chevron-right toggle-icon"></i>
            </div>
            <div class="sidebar-dropdown" id="approvalQueuesMenu">
                <div class="sidebar-dropdown-item badge-item">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <i class="bi bi-inboxes"></i>
                        <span>My Approval Queue</span>
                    </div>
                    <span class="badge">12</span>
                </div>
            </div>
        </div>
        
        <!-- REPORTS Section -->
        <div class="sidebar-section">
            <div class="section-title-toggle" id="reportsToggle">
                <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-bar-chart-line"></i>
                    REPORTS
                </div>
                <i class="bi bi-chevron-right toggle-icon"></i>
            </div>
            <div class="sidebar-dropdown" id="reportsMenu">
                <div class="sidebar-dropdown-item" data-section="purchase-report">
                    <i class="bi bi-file-text"></i>
                    <span>Purchase Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="lcc-transfer-report">
                    <i class="bi bi-file-text"></i>
                    <span>LCC Transfer Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="location-transfer-report">
                    <i class="bi bi-file-text"></i>
                    <span>Location Transfer Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="consolidated-peza-report">
                    <i class="bi bi-file-text"></i>
                    <span>Consolidated PEZA Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="site-asset-report">
                    <i class="bi bi-file-text"></i>
                    <span>Site Asset Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="capitalization-report">
                    <i class="bi bi-file-text"></i>
                    <span>Capitalization Report</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="audit-trails">
                    <i class="bi bi-file-text"></i>
                    <span>Audit Trails</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="statistic-reports">
                    <i class="bi bi-file-text"></i>
                    <span>Statistic Reports</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="inventory-count-summary">
                    <i class="bi bi-file-text"></i>
                    <span>Inventory Count Summary</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="missing-assets">
                    <i class="bi bi-file-text"></i>
                    <span>Missing Assets</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="mislocated-asset">
                    <i class="bi bi-file-text"></i>
                    <span>Mislocated Asset</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="loan-asset-report">
                    <i class="bi bi-file-text"></i>
                    <span>Loan Asset</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="disposal-report">
                    <i class="bi bi-file-text"></i>
                    <span>Disposal</span>
                </div>
                <div class="sidebar-dropdown-item" data-section="replace-report">
                    <i class="bi bi-file-text"></i>
                    <span>Replace</span>
                </div>
            </div>
        </div>
        
        <!-- ADMINISTRATION Section -->
        <div class="sidebar-section">
            <div class="section-title-toggle" id="administrationToggle">
                <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-gear"></i>
                    ADMINISTRATION
                </div>
                <i class="bi bi-chevron-right toggle-icon"></i>
            </div>
            <div class="sidebar-dropdown" id="administrationMenu">
                <!-- Master Files -->
                <div class="sidebar-dropdown-item section-title-toggle" id="masterFilesToggle">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="bi bi-folder"></i>
                        <span>Master Files</span>
                    </div>
                    <i class="bi bi-chevron-right toggle-icon"></i>
                </div>
                <div class="sidebar-nested-dropdown" id="masterFilesMenu">
                    <div class="sidebar-nested-item" data-section="asset-master-file">
                        <i class="bi bi-file-earmark"></i>
                        <span>Asset Master File</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="category-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Category Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="sub-category-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Sub-Category Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="vendor-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Vendor Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="manufacturer-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Manufacturer Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="site-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Site Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="business-entity">
                        <i class="bi bi-file-earmark"></i>
                        <span>Business Entity</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="condition-master-files">
                        <i class="bi bi-file-earmark"></i>
                        <span>Condition Master Files</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="peza-transaction-type">
                        <i class="bi bi-file-earmark"></i>
                        <span>Peza Transaction Type</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="location">
                        <i class="bi bi-file-earmark"></i>
                        <span>Location</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="lcc-approver">
                        <i class="bi bi-file-earmark"></i>
                        <span>LCC Approver</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="documents-library">
                        <i class="bi bi-file-earmark"></i>
                        <span>Documents Library</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="ad-group-approver">
                        <i class="bi bi-file-earmark"></i>
                        <span>AD Group Approver</span>
                    </div>
                </div>
                
                <!-- Barcode -->
                <div class="sidebar-dropdown-item section-title-toggle" id="barcodeToggle">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="bi bi-upc-scan"></i>
                        <span>Barcode</span>
                    </div>
                    <i class="bi bi-chevron-right toggle-icon"></i>
                </div>
                <div class="sidebar-nested-dropdown" id="barcodeMenu">
                    <div class="sidebar-nested-item" data-section="asset-tag-printing">
                        <i class="bi bi-printer"></i>
                        <span>Asset Tag Printing</span>
                    </div>
                </div>
                
                <!-- Access Control -->
                <div class="sidebar-dropdown-item section-title-toggle" id="accessControlToggle">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="bi bi-shield-lock"></i>
                        <span>Access Control</span>
                    </div>
                    <i class="bi bi-chevron-right toggle-icon"></i>
                </div>
                <div class="sidebar-nested-dropdown" id="accessControlMenu">
                    <div class="sidebar-nested-item" data-section="news-feed">
                        <i class="bi bi-newspaper"></i>
                        <span>News Feed</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="site-resources">
                        <i class="bi bi-collection"></i>
                        <span>Site Resources</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="organization-chart">
                        <i class="bi bi-diagram-3"></i>
                        <span>Organization Chart</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="backup-process">
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Backup Process</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="contact-information">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Contact Information</span>
                    </div>
                </div>
                
                <!-- Sync -->
                <div class="sidebar-dropdown-item section-title-toggle" id="syncToggle">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="bi bi-arrow-repeat"></i>
                        <span>Sync</span>
                    </div>
                    <i class="bi bi-chevron-right toggle-icon"></i>
                </div>
                <div class="sidebar-nested-dropdown" id="syncMenu">
                    <div class="sidebar-nested-item" data-section="upload-to-mobile">
                        <i class="bi bi-upload"></i>
                        <span>Upload To Mobile</span>
                    </div>
                    <div class="sidebar-nested-item" data-section="download-from-mobile">
                        <i class="bi bi-download"></i>
                        <span>Download From Mobile</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CONSUMABLES Section -->
        <div class="sidebar-section">
            <div class="section-title-toggle" id="consumablesToggle">
                <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="bi bi-box"></i>
                    CONSUMABLES
                </div>
                <i class="bi bi-chevron-right toggle-icon"></i>
            </div>
            <div class="sidebar-dropdown" id="consumablesMenu">
                <div class="sidebar-dropdown-item" data-section="consumables-management">
                    <i class="bi bi-box-seam"></i>
                    <span>Consumables Management</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content - Asset Replacement Interface -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h1 class="page-title">
                        <i class="bi bi-arrow-repeat"></i>
                        Asset Replacement
                    </h1>
                    <p class="page-subtitle">Replace existing assets with new ones</p>
                </div>
                <div class="current-user-section">
                    <div class="user-label">Current User:</div>
                    <div class="user-value">barla</div>
                    <div class="user-label">Active Directory Group:</div>
                    <div class="user-value">FANS-Admin</div>
                </div>
            </div>
        </div>

        <!-- Replacement Container -->
        <div class="replacement-container">
            <!-- Replacement ID Display -->
            <div class="replacement-id">
                REP-2020-00000004
            </div>

            <!-- Basic Information Section -->
            <div class="section-header">
                <i class="bi bi-info-circle"></i>
                ASSET REPLACEMENT INFORMATION
            </div>

            <div class="three-column-form">
                <div class="form-group">
                    <label class="form-label">Replacement ID:</label>
                    <input type="text" class="form-control readonly" value="REP-2020-00000004" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Replace Date:</label>
                    <input type="text" class="form-control readonly" value="04/16/20" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Requestor:</label>
                    <input type="text" class="form-control readonly" value="barla" readonly>
                </div>
            </div>

            <!-- Asset to be Replaced Section -->
            <div class="section-header" style="margin-top: 30px;">
                <i class="bi bi-box"></i>
                ASSET TO BE REPLACED
            </div>

            <!-- Search Box for Existing Asset -->
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search by Asset ID, Serial No. or Description..." id="searchAsset">
                <button class="search-button" id="searchButton">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <!-- Asset Information Display -->
            <div class="asset-info-display">
                <div class="asset-info-row">
                    <div class="asset-info-label">Asset ID:</div>
                    <div class="asset-info-value">CPX00000000446</div>
                    <div class="asset-info-label">AMR ID:</div>
                    <div class="asset-info-value">-</div>
                </div>
                <div class="asset-info-row">
                    <div class="asset-info-label">Serial No.:</div>
                    <div class="asset-info-value">abc</div>
                    <div class="asset-info-label">Description:</div>
                    <div class="asset-info-value">HP Printer</div>
                </div>
                <div class="asset-info-row">
                    <div class="asset-info-label">Category:</div>
                    <div class="asset-info-value">COMPUTER & PRINTER</div>
                    <div class="asset-info-label">Sub Category:</div>
                    <div class="asset-info-value">Printer</div>
                </div>
                <div class="asset-info-row">
                    <div class="asset-info-label">Employee ID:</div>
                    <div class="asset-info-value">21342</div>
                    <div class="asset-info-label">End User SID:</div>
                    <div class="asset-info-value">ABC DEF</div>
                </div>
                <div class="asset-info-row">
                    <div class="asset-info-label">Local Cost Center:</div>
                    <div class="asset-info-value">0</div>
                    <div class="asset-info-label">Site:</div>
                    <div class="asset-info-value">TBD</div>
                </div>
                <div class="asset-info-row">
                    <div class="asset-info-label">Floor:</div>
                    <div class="asset-info-value">-</div>
                    <div class="asset-info-label">Area/Workstation:</div>
                    <div class="asset-info-value">B</div>
                </div>
            </div>

            <!-- Notes Section for Asset to be Replaced -->
            <div class="notes-section">
                <label class="form-label">Notes:</label>
                <textarea class="notes-textarea" placeholder="Enter notes about the asset to be replaced..."></textarea>
            </div>

            <!-- Replacement Asset Section -->
            <div class="section-header" style="margin-top: 40px;">
                <i class="bi bi-arrow-right-circle"></i>
                REPLACEMENT ASSET
            </div>

            <!-- Search Box for Replacement Asset -->
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search for replacement asset..." id="searchReplacement">
                <button class="search-button" id="searchReplacementButton">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <!-- Replacement Asset Form -->
            <div class="two-column-form">
                <div class="form-group">
                    <label class="form-label">Location:</label>
                    <select class="form-select">
                        <option value="">Select Location</option>
                        <option value="TBD" selected>TBD</option>
                        <option value="HQ">Headquarters</option>
                        <option value="BRANCH">Branch Office</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">ITAF No.:</label>
                    <input type="text" class="form-control" placeholder="Enter ITAF number">
                </div>
                <div class="form-group">
                    <label class="form-label">New Serial:</label>
                    <input type="text" class="form-control" placeholder="Enter new serial number">
                </div>
                <div class="form-group">
                    <label class="form-label">Description:</label>
                    <input type="text" class="form-control" placeholder="Enter asset description">
                </div>
                <div class="form-group">
                    <label class="form-label">Employee ID:</label>
                    <input type="text" class="form-control" placeholder="Enter employee ID">
                </div>
                <div class="form-group">
                    <label class="form-label">End User SID:</label>
                    <input type="text" class="form-control" placeholder="Enter end user SID">
                </div>
                <div class="form-group">
                    <label class="form-label">Site:</label>
                    <select class="form-select">
                        <option value="">Select Site</option>
                        <option value="TBD" selected>TBD</option>
                        <option value="MAIN">Main Building</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Floor:</label>
                    <select class="form-select">
                        <option value="">Select Floor</option>
                        <option value="1">1st Floor</option>
                        <option value="2">2nd Floor</option>
                        <option value="3">3rd Floor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Area/Workstation:</label>
                    <input type="text" class="form-control" placeholder="Enter area or workstation">
                </div>
                <div class="form-group">
                    <label class="form-label">Remarks:</label>
                    <input type="text" class="form-control" placeholder="Enter any remarks">
                </div>
            </div>

            <!-- Status Display -->
            <div style="margin-top: 20px; padding: 15px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--border-color);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <label class="form-label">Current Status:</label>
                        <div class="status-badge status-pending">
                            <i class="bi bi-clock"></i>
                            Pending Replacement
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Created On:</label>
                        <div>04/16/2020</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-success" id="searchBtn">
                    <i class="bi bi-search"></i>
                    Search
                </button>
                <button class="btn btn-primary" id="replaceBtn">
                    <i class="bi bi-arrow-repeat"></i>
                    Replace
                </button>
                <button class="btn btn-warning" id="submitBtn">
                    <i class="bi bi-check-circle"></i>
                    Submit
                </button>
                <button class="btn btn-outline" id="closeBtn">
                    <i class="bi bi-x-circle"></i>
                    Close
                </button>
                <div style="margin-left: auto;">
                    <button class="btn btn-outline">
                        <i class="bi bi-printer"></i>
                        Print
                    </button>
                    <button class="btn btn-outline">
                        <i class="bi bi-house"></i>
                        Home
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            
            // Mobile menu toggle
            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('mobile-open');
                });
            }
            
            // Main section toggles
            const mainSections = ['transactionsToggle', 'approvalQueuesToggle', 'reportsToggle', 'administrationToggle', 'consumablesToggle'];
            
            mainSections.forEach(sectionId => {
                const toggle = document.getElementById(sectionId);
                if (toggle) {
                    toggle.addEventListener('click', function() {
                        const menuId = sectionId.replace('Toggle', 'Menu');
                        const menu = document.getElementById(menuId);
                        const icon = this.querySelector('.toggle-icon');
                        
                        // Toggle menu
                        menu.classList.toggle('open');
                        icon.classList.toggle('open');
                    });
                }
            });
            
            // Nested dropdown toggles (for Administration section)
            const nestedToggles = ['masterFilesToggle', 'barcodeToggle', 'accessControlToggle', 'syncToggle'];
            
            nestedToggles.forEach(toggleId => {
                const toggle = document.getElementById(toggleId);
                if (toggle) {
                    toggle.addEventListener('click', function(e) {
                        e.stopPropagation(); // Prevent parent dropdown from closing
                        
                        const menuId = toggleId.replace('Toggle', 'Menu');
                        const menu = document.getElementById(menuId);
                        const icon = this.querySelector('.toggle-icon');
                        
                        // Toggle menu
                        menu.classList.toggle('open');
                        icon.classList.toggle('open');
                    });
                }
            });
            
            // Initialize with TRANSACTIONS menu open and Asset Replacement active
            document.getElementById('transactionsToggle').click();
            document.getElementById('transactionsMenu').classList.add('open');
            document.querySelector('[data-section="asset-replacement"]').classList.add('active');
            document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
            
            // Search functionality for existing asset
            const searchButton = document.getElementById('searchButton');
            const searchAsset = document.getElementById('searchAsset');
            
            if (searchButton) {
                searchButton.addEventListener('click', function() {
                    if (searchAsset.value.trim() === '') {
                        alert('Please enter search criteria for the asset to be replaced.');
                        return;
                    }
                    
                    // Simulate search - in real app, this would make an API call
                    showSuccessMessage(`Searching for asset: ${searchAsset.value}`);
                    
                    // Simulate finding an asset (with delay)
                    setTimeout(() => {
                        showSuccessMessage('Asset found: CPX00000000446 - HP Printer');
                        // Here you would update the form with the found asset data
                    }, 1000);
                });
            }
            
            // Search functionality for replacement asset
            const searchReplacementButton = document.getElementById('searchReplacementButton');
            const searchReplacement = document.getElementById('searchReplacement');
            
            if (searchReplacementButton) {
                searchReplacementButton.addEventListener('click', function() {
                    if (searchReplacement.value.trim() === '') {
                        alert('Please enter search criteria for the replacement asset.');
                        return;
                    }
                    
                    // Simulate search
                    showSuccessMessage(`Searching for replacement asset: ${searchReplacement.value}`);
                    
                    // Simulate finding a replacement asset
                    setTimeout(() => {
                        showSuccessMessage('Replacement asset found: CPX00000000447 - HP LaserJet Printer');
                        // Here you would update the form with the found replacement asset data
                    }, 1000);
                });
            }
            
            // Replace button functionality
            const replaceBtn = document.getElementById('replaceBtn');
            if (replaceBtn) {
                replaceBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to replace this asset? This action cannot be undone.')) {
                        showSuccessMessage('Asset replacement process initiated. Please fill in the replacement asset details.');
                        
                        // Enable replacement asset form fields
                        document.querySelectorAll('#searchReplacement, .form-select, .form-control:not(.readonly)').forEach(field => {
                            field.disabled = false;
                        });
                    }
                });
            }
            
            // Submit button functionality
            const submitBtn = document.getElementById('submitBtn');
            if (submitBtn) {
                submitBtn.addEventListener('click', function() {
                    // Check if all required fields are filled
                    const requiredFields = document.querySelectorAll('.form-select, .form-control:not(.readonly)');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.disabled && field.value.trim() === '') {
                            isValid = false;
                            field.style.borderColor = 'var(--danger)';
                        } else {
                            field.style.borderColor = '';
                        }
                    });
                    
                    if (!isValid) {
                        alert('Please fill in all required fields for the replacement asset.');
                        return;
                    }
                    
                    if (confirm('Submit this asset replacement request?')) {
                        showSuccessMessage('Asset replacement request submitted successfully! The request has been sent for approval.');
                        
                        // Simulate form reset after submission
                        setTimeout(() => {
                            document.querySelectorAll('.form-control:not(.readonly)').forEach(input => {
                                input.value = '';
                            });
                            document.querySelectorAll('.form-select').forEach(select => {
                                select.selectedIndex = 0;
                            });
                            document.querySelectorAll('.notes-textarea').forEach(textarea => {
                                textarea.value = '';
                            });
                        }, 2000);
                    }
                });
            }
            
            // Close button functionality
            const closeBtn = document.getElementById('closeBtn');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to close? All unsaved changes will be lost.')) {
                        // Reset form
                        document.querySelectorAll('.form-control:not(.readonly)').forEach(input => {
                            input.value = '';
                        });
                        document.querySelectorAll('.form-select').forEach(select => {
                            select.selectedIndex = 0;
                        });
                        document.querySelectorAll('.notes-textarea').forEach(textarea => {
                            textarea.value = '';
                        });
                        
                        showSuccessMessage('Form has been cleared.');
                    }
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                        sidebar.classList.remove('mobile-open');
                    }
                }
            });
            
            function showSuccessMessage(message) {
                // Create toast notification
                const toast = document.createElement('div');
                toast.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: var(--success);
                    color: white;
                    padding: 15px 20px;
                    border-radius: 6px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 1000;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    animation: slideIn 0.3s ease;
                `;
                
                toast.innerHTML = `
                    <i class="bi bi-check-circle" style="font-size: 20px;"></i>
                    <span>${message}</span>
                `;
                
                document.body.appendChild(toast);
                
                // Remove toast after 5 seconds
                setTimeout(() => {
                    toast.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => toast.remove(), 300);
                }, 5000);
            }
            
            // Add CSS animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                @keyframes slideOut {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>