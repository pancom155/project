<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System - Pre-Asset Recognition</title>
    
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

        /* SIDEBAR CSS (from your code) */
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

        /* Hide original sidebar-section-title for sections with toggles */
        .sidebar-section:has(.section-title-toggle) > .sidebar-section-title {
            display: none;
        }

        /* Pre-Asset Recognition Specific Styles */
        .page-header {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--secondary);
            font-size: 14px;
        }

        /* User Info and Search */
        .user-info-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-badge {
            background: var(--primary-light);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
        }

        .search-container {
            display: flex;
            gap: 10px;
        }

        .search-input {
            padding: 8px 15px;
            border: 2px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            min-width: 250px;
        }

        .search-input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .btn-search {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Main Form Grid */
        .form-container {
            background: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 6px;
            padding: 15px;
            border: 1px solid var(--border-color);
        }

        .section-header {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--border-color);
        }

        .field-group {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .field-label {
            font-weight: 600;
            color: var(--secondary);
            font-size: 14px;
        }

        .field-value {
            font-weight: 500;
            color: var(--dark);
            font-size: 14px;
        }

        /* Vendor Details Grid */
        .vendor-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .vendor-section {
            background: #f8fafc;
            border-radius: 6px;
            padding: 15px;
            border: 1px solid var(--border-color);
        }

        /* Product Details */
        .product-details {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .product-field {
            background: #f8fafc;
            border-radius: 6px;
            padding: 15px;
            border: 1px solid var(--border-color);
        }

        .product-field .field-label {
            display: block;
            margin-bottom: 5px;
        }

        .product-field .field-value {
            font-size: 15px;
            font-weight: 600;
        }

        /* Delivery Master Files Table */
        .table-container {
            background: white;
            border-radius: 8px;
            padding: 0;
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-top: 25px;
        }

        .table-header {
            background: #f8fafc;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table th {
            background: #f1f5f9;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--border-color);
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--secondary);
        }

        .data-table tr:hover {
            background: #f8fafc;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
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
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--light);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .form-grid,
            .vendor-grid,
            .product-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .user-info-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .search-container {
                width: 100%;
            }
            
            .search-input {
                min-width: 0;
                flex: 1;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
            
            .btn {
                flex: 1;
                min-width: 120px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile menu toggle button -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar (from your code) -->
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

                <div class="sidebar-dropdown-item " data-section="bulk-upload" onclick="window.location.href='{{ route('bulk_upload') }}'">
                    <i class="bi bi-upload"></i>
                    <span>Bulk Upload</span>
                </div>

                <div class="sidebar-dropdown-item " data-section="location-transfer" onclick="window.location.href='{{ route('location_transfer') }}'">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Location Transfer</span>
                </div>
                   <div class="sidebar-dropdown-item " data-section="asset-replacement" onclick="window.location.href='{{ route('asset_replacement') }}'">
                    <i class="bi bi-arrow-repeat"></i>
                    <span>Asset Replacement</span>
                </div>
                <div class="sidebar-dropdown-item " data-section="asset-disposal" onclick="window.location.href='{{ route('asset_disposal') }}'">
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
                <div class="sidebar-dropdown-item active " data-section="pre-asset-recognition" onclick="window.location.href='{{ route('pre_asset_recognition') }}'">
                    <i class="bi bi-check-circle"></i>
                    <span>Pre-Asset Recognition</span>
                </div>
                 <div class="sidebar-dropdown-item " data-section="loan-asset" onclick="window.location.href='{{ route('loan_asset') }}'">
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
                <div class="sidebar-dropdown-item  badge-item"  onclick="window.location.href='{{ route('my_approval_queue') }}'">
                   <i class="bi bi-inboxes"></i>
                    <span>My Approval Queue</span>
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

    <!-- Main Content - Pre-Asset Recognition Interface -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">
                    <i class="bi bi-check-circle"></i>
                    Pre-Asset Recognition
                </h1>
                <p class="page-subtitle">Record and recognize assets before full asset registration</p>
            </div>
        </div>

        <!-- User Info and Search Section -->
        <div class="form-container">
            <div class="user-info-section">
                <div class="user-info">
                    <span style="font-weight: 600;">Current User :</span>
                    <span class="user-badge">bmla</span>
                </div>
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search DR No., Vendor, etc...">
                    <button class="btn-search" id="searchBtn">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <div class="form-container">
            <!-- Delivery Details -->
            <div class="form-grid">
                <div class="form-section">
                    <div class="section-header">Delivery Details</div>
                    <div class="field-group">
                        <span class="field-label">Delivery Date :</span>
                        <span class="field-value">04/16/20</span>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Cargo :</span>
                        <span class="field-value">Atrasla</span>
                    </div>
                    <div class="field-group">
                        <span class="field-label">DR No. :</span>
                        <span class="field-value">100056</span>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Consignee's Name :</span>
                        <span class="field-value">Symbol</span>
                    </div>
                    <div class="field-group">
                        <span class="field-label">Shippers Name :</span>
                        <span class="field-value">DSAF F050</span>
                    </div>
                </div>

                <!-- Vendor Details -->
                <div class="form-section">
                    <div class="section-header">Vendor Details (Delivery Receipt)</div>
                    <div class="vendor-grid">
                        <div class="vendor-section">
                            <div class="field-group">
                                <span class="field-label">Vendor :</span>
                                <span class="field-value">BSMAC</span>
                            </div>
                            <div class="field-group">
                                <span class="field-label">PO Number :</span>
                                <span class="field-value">9339933</span>
                            </div>
                        </div>
                        <div class="vendor-section">
                            <div class="field-group">
                                <span class="field-label">Delivery Date :</span>
                                <span class="field-value">04/15/20</span>
                            </div>
                            <div class="field-group">
                                <span class="field-label">DR No. :</span>
                                <span class="field-value">1035991</span>
                            </div>
                        </div>
                        <div class="vendor-section">
                            <div class="field-group">
                                <span class="field-label">Delivery Address:</span>
                                <span class="field-value"></span>
                            </div>
                            <div class="field-group">
                                <span class="field-label">Quantity :</span>
                                <span class="field-value">3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="product-details">
                <div class="product-field">
                    <span class="field-label">Brand :</span>
                    <span class="field-value">TOSHIBA</span>
                </div>
                <div class="product-field">
                    <span class="field-label">Serial Number :</span>
                    <span class="field-value">PRO023</span>
                </div>
                <div class="product-field">
                    <span class="field-label">Received By :</span>
                    <span class="field-value">MIDBANCE</span>
                </div>
                <div class="product-field">
                    <span class="field-label"></span>
                    <span class="field-value">Symbol</span>
                </div>
            </div>

            <!-- Delivery Master Files Table -->
            <div class="table-container">
                <div class="table-header">
                    <h3 class="table-title">Delivery Master Files</h3>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Add New Delivery
                    </button>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>DR No.</th>
                                <th>Cargo</th>
                                <th>Delivery Date</th>
                                <th>Consignee</th>
                                <th>Shipper</th>
                                <th>Vendor Name</th>
                                <th>Vendor DR Date</th>
                                <th>Vendor DR Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>100056</strong></td>
                                <td>Atrasla</td>
                                <td>04/16/20</td>
                                <td>Symbol</td>
                                <td>DSAF F050</td>
                                <td>ACCESS FRONTIER TECH INC.</td>
                                <td>02/26/20</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>1035991</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>ABENSON</td>
                                <td>03/26/20</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>ALL HOME</td>
                                <td>03/26/20</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>03/24/20</td>
                                <td></td>
                                <td></td>
                                <td>HILT INC</td>
                                <td>03/24/20</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>03/26/20</td>
                                <td>dgf</td>
                                <td>i</td>
                                <td>ALCARD PLASTICS PHIL. INC.</td>
                                <td>03/26/20</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>03/20/20</td>
                                <td></td>
                                <td>usdrq</td>
                                <td>ABENSON</td>
                                <td>03/20/20</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-success" id="recognizeBtn">
                    <i class="bi bi-check-circle"></i>
                    Recognize Asset
                </button>
                <button class="btn btn-primary" id="saveBtn">
                    <i class="bi bi-save"></i>
                    Save Record
                </button>
                <button class="btn btn-warning" id="editBtn">
                    <i class="bi bi-pencil"></i>
                    Edit
                </button>
                <button class="btn btn-outline" id="clearBtn">
                    <i class="bi bi-x-circle"></i>
                    Clear Form
                </button>
                <div style="margin-left: auto;">
                    <button class="btn btn-outline" id="printBtn">
                        <i class="bi bi-printer"></i>
                        Print
                    </button>
                    <button class="btn btn-outline" id="exportBtn">
                        <i class="bi bi-download"></i>
                        Export
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
            
            // Initialize with TRANSACTIONS menu open and Pre-Asset Recognition active
            const transactionsToggle = document.getElementById('transactionsToggle');
            if (transactionsToggle) {
                transactionsToggle.click();
                document.getElementById('transactionsMenu').classList.add('open');
                document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
            }
            
            // Set active section (Pre-Asset Recognition)
            const preAssetItem = document.querySelector('[data-section="pre-asset-recognition"]');
            if (preAssetItem) {
                preAssetItem.classList.add('active');
            }
            
            // Search functionality
            const searchBtn = document.getElementById('searchBtn');
            const searchInput = document.querySelector('.search-input');
            
            if (searchBtn) {
                searchBtn.addEventListener('click', function() {
                    if (searchInput.value.trim() === '') {
                        alert('Please enter search criteria for Delivery Receipts.');
                        searchInput.style.borderColor = '#ef4444';
                        return;
                    }
                    
                    searchInput.style.borderColor = '';
                    showMessage(`Searching for: ${searchInput.value}`, 'info');
                    
                    // Simulate search
                    setTimeout(() => {
                        showMessage('Found 6 matching delivery records', 'success');
                    }, 1000);
                });
            }
            
            // Recognize Asset button
            const recognizeBtn = document.getElementById('recognizeBtn');
            if (recognizeBtn) {
                recognizeBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to recognize this asset? This will move it to the asset registration queue.')) {
                        showMessage('Asset recognized successfully! Ready for full asset registration.', 'success');
                    }
                });
            }
            
            // Save Record button
            const saveBtn = document.getElementById('saveBtn');
            if (saveBtn) {
                saveBtn.addEventListener('click', function() {
                    if (confirm('Save this pre-asset recognition record?')) {
                        showMessage('Record saved successfully!', 'success');
                    }
                });
            }
            
            // Clear Form button
            const clearBtn = document.getElementById('clearBtn');
            if (clearBtn) {
                clearBtn.addEventListener('click', function() {
                    if (confirm('Clear all form data? This action cannot be undone.')) {
                        showMessage('Form cleared successfully.', 'info');
                    }
                });
            }
            
            // Print button
            const printBtn = document.getElementById('printBtn');
            if (printBtn) {
                printBtn.addEventListener('click', function() {
                    window.print();
                });
            }
            
            // Export button
            const exportBtn = document.getElementById('exportBtn');
            if (exportBtn) {
                exportBtn.addEventListener('click', function() {
                    showMessage('Exporting data to CSV file...', 'info');
                    setTimeout(() => {
                        showMessage('Data exported successfully!', 'success');
                    }, 1500);
                });
            }
            
            // Table row click functionality
            const tableRows = document.querySelectorAll('.data-table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    // Remove active class from all rows
                    tableRows.forEach(r => r.classList.remove('active'));
                    
                    // Add active class to clicked row
                    this.classList.add('active');
                    
                    // Get DR No. from the row
                    const drNo = this.querySelector('td:first-child').textContent.trim();
                    if (drNo) {
                        showMessage(`Selected DR No.: ${drNo}`, 'info');
                    }
                });
            });
            
            // Add active class styling
            const style = document.createElement('style');
            style.textContent = `
                .data-table tr.active {
                    background-color: #dbeafe !important;
                }
                .data-table tr.active td {
                    color: #1e40af;
                    font-weight: 500;
                }
            `;
            document.head.appendChild(style);
            
            // Message function
            function showMessage(message, type = 'info') {
                // Remove existing message
                const existingMsg = document.querySelector('.message-toast');
                if (existingMsg) existingMsg.remove();
                
                const colors = {
                    'info': '#3b82f6',
                    'success': '#10b981',
                    'warning': '#f59e0b',
                    'error': '#ef4444'
                };
                
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message-toast';
                messageDiv.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: ${colors[type]};
                    color: white;
                    padding: 12px 18px;
                    border-radius: 6px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 1000;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    animation: slideIn 0.3s ease;
                `;
                
                messageDiv.innerHTML = `
                    <span>${message}</span>
                `;
                
                document.body.appendChild(messageDiv);
                
                setTimeout(() => {
                    messageDiv.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => messageDiv.remove(), 300);
                }, 3000);
            }
            
            // Add CSS animations
            const animationStyle = document.createElement('style');
            animationStyle.textContent = `
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
            document.head.appendChild(animationStyle);
        });
    </script>
</body>
</html>