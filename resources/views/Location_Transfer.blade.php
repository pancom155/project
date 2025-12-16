<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System - Location Transfer</title>
    
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

               /* Sidebar Styling */
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
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: #f8f9fa;
            margin-left: 260px;
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


        
        /* Location Transfer Specific Styles */
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

        /* Transaction Container */
        .transaction-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
        }

        .section-title i {
            color: var(--primary);
        }

        /* Transaction Information Table */
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .transaction-table td {
            padding: 12px 15px;
            font-size: 14px;
            color: var(--dark);
            border-bottom: 1px solid var(--border-color);
        }

        .transaction-table td:first-child {
            font-weight: 600;
            color: var(--secondary);
            width: 30%;
        }

        .transaction-table .highlight {
            background-color: #f0f7ff;
            font-weight: 600;
            color: var(--primary);
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
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

        /* Two Column Layout */
        .two-column-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* Remarks Section */
        .remarks-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--border-color);
        }

        .remarks-textarea {
            width: 100%;
            min-height: 120px;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            resize: vertical;
        }

        .remarks-textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        /* Status Section */
        .status-section {
            background: #f0f7ff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid var(--primary);
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .status-storage {
            background: #dbeafe;
            color: #1e40af;
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

        /* Cost Transfer Section */
        .cost-transfer-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .transfer-type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .transfer-type {
            padding: 8px 20px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: white;
            color: var(--secondary);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .transfer-type:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .transfer-type.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Asset ID Display */
        .asset-id-display {
            font-family: monospace;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
            margin: 10px 0;
            padding: 10px;
            background: #f8fafc;
            border-radius: 6px;
            border: 1px solid var(--border-color);
        }

        /* Responsive */
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

            .two-column-form {
                grid-template-columns: 1fr;
            }
            
            .transaction-table td:first-child {
                width: 40%;
            }
        }

        .mobile-menu-toggle {
            display: none;
        }

        /* Hide original sidebar-section-title for sections with toggles */
        .sidebar-section:has(.section-title-toggle) > .sidebar-section-title {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Mobile menu toggle button -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="bi bi-list"></i>
    </button>

     <!-- Sidebar -->
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

                <div class="sidebar-dropdown-item active" data-section="location-transfer" onclick="window.location.href='{{ route('location_transfer') }}'">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Location Transfer</span>
                </div>
              
                  <div class="sidebar-dropdown-item " data-section="asset-replacement" onclick="window.location.href='{{ route('asset_replacement') }}'">
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


    <!-- Main Content - Location Transfer Interface -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h1 class="page-title">
                        <i class="bi bi-arrow-left-right"></i>
                        Location Transfer
                    </h1>
                    <p class="page-subtitle">Transfer assets between locations and update asset information</p>
                </div>
                <div class="current-user-section">
                    <div class="user-label">Current User:</div>
                    <div class="user-value">bmla</div>
                </div>
            </div>
        </div>

        <!-- Transaction Container -->
        <div class="transaction-container">
            <!-- Transaction Information Section -->
            <h3 class="section-title">
                <i class="bi bi-info-circle"></i>
                TRANSACTION INFORMATION
            </h3>
            
            <table class="transaction-table">
                <tr>
                    <td>Transfer ID:</td>
                    <td class="highlight">TRN-2020-000000005</td>
                    <td>Transfer Date:</td>
                    <td>06/16/20</td>
                </tr>
                <tr>
                    <td>Requestor:</td>
                    <td colspan="3">barla</td>
                </tr>
            </table>

            <!-- Asset Details Section -->
            <h3 class="section-title" style="margin-top: 30px;">
                <i class="bi bi-box"></i>
                ASSET DETAILS
            </h3>
            
            <!-- Asset ID Display -->
            <div class="asset-id-display">
                CPX00000000360
            </div>
            
            <div class="two-column-form">
                <div class="form-group">
                    <label class="form-label">AMR ID:</label>
                    <input type="text" class="form-control readonly" value="-" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Serial No.:</label>
                    <input type="text" class="form-control readonly" value="CP800228" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Description:</label>
                    <input type="text" class="form-control readonly" value="Toshiba barcode printer" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Category:</label>
                    <input type="text" class="form-control readonly" value="COMPUTER & PRINTER" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Sub Category:</label>
                    <input type="text" class="form-control readonly" value="Printer" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Employee ID:</label>
                    <input type="text" class="form-control" value="21342">
                </div>
                <div class="form-group">
                    <label class="form-label">End User SID:</label>
                    <input type="text" class="form-control" value="ABC DEF">
                </div>
                <div class="form-group">
                    <label class="form-label">Local Cost Center:</label>
                    <input type="text" class="form-control" value="0">
                </div>
            </div>

            <!-- Current Location Section -->
            <h3 class="section-title" style="margin-top: 30px;">
                <i class="bi bi-geo-alt"></i>
                CURRENT LOCATION
            </h3>
            
            <div class="two-column-form">
                <div class="form-group">
                    <label class="form-label">Site:</label>
                    <input type="text" class="form-control readonly" value="TBD" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Floor:</label>
                    <input type="text" class="form-control readonly" value="" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Area/Workstation:</label>
                    <input type="text" class="form-control readonly" value="Area C" readonly>
                </div>
            </div>

            <!-- Location Transfer Section -->
            <h3 class="section-title" style="margin-top: 30px;">
                <i class="bi bi-arrow-right-circle"></i>
                LOCATION TRANSFER
            </h3>
            
            <!-- Transfer Type Selector -->
            <div class="transfer-type-selector">
                <div class="transfer-type active" data-type="location">
                    Location Transfer
                </div>
                <div class="transfer-type" data-type="cost">
                    Cost Transfer
                </div>
            </div>
            
            <div class="two-column-form" id="locationTransferForm">
                <div class="form-group">
                    <label class="form-label">Location:</label>
                    <select class="form-select">
                        <option value="">Select New Location</option>
                        <option value="HQ">Headquarters</option>
                        <option value="BRANCH_A">Branch A</option>
                        <option value="BRANCH_B">Branch B</option>
                        <option value="WAREHOUSE">Warehouse</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">ITAF No.:</label>
                    <input type="text" class="form-control" placeholder="Enter ITAF number">
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
                        <option value="ANNEX">Annex Building</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Floor:</label>
                    <select class="form-select">
                        <option value="">Select Floor</option>
                        <option value="1">1st Floor</option>
                        <option value="2">2nd Floor</option>
                        <option value="3">3rd Floor</option>
                        <option value="4">4th Floor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Area/Workstation:</label>
                    <input type="text" class="form-control" placeholder="Enter area or workstation">
                </div>
                <div class="form-group">
                    <label class="form-label">Net Book Value (USD):</label>
                    <input type="text" class="form-control" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label class="form-label">Date Fully Depreciated:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Warranty End Date:</label>
                    <input type="date" class="form-control">
                </div>
            </div>

            <!-- Cost Transfer Form (Hidden by default) -->
            <div class="two-column-form" id="costTransferForm" style="display: none;">
                <div class="form-group">
                    <label class="form-label">From Cost Center:</label>
                    <select class="form-select">
                        <option value="">Select From Cost Center</option>
                        <option value="CC001">CC001 - Operations</option>
                        <option value="CC002">CC002 - IT Department</option>
                        <option value="CC003">CC003 - Finance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">To Cost Center:</label>
                    <select class="form-select">
                        <option value="">Select To Cost Center</option>
                        <option value="CC001">CC001 - Operations</option>
                        <option value="CC002">CC002 - IT Department</option>
                        <option value="CC003">CC003 - Finance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Transfer Amount (USD):</label>
                    <input type="text" class="form-control" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label class="form-label">Effective Date:</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Approval Required:</label>
                    <select class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <!-- Remarks Section -->
            <div class="remarks-section">
                <label class="form-label">Remarks:</label>
                <textarea class="remarks-textarea" placeholder="Enter any remarks or notes about this transfer..."></textarea>
            </div>

            <!-- Status Section -->
            <div class="status-section">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <label class="form-label">Current Status:</label>
                        <div class="status-badge status-storage">
                            <i class="bi bi-box"></i>
                            In Storage
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Last Updated:</label>
                        <div>06/16/2020</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-success" id="submitTransferBtn">
                    <i class="bi bi-check-circle"></i>
                    Submit Transfer
                </button>
                <button class="btn btn-primary" id="saveDraftBtn">
                    <i class="bi bi-save"></i>
                    Save as Draft
                </button>
                <button class="btn btn-outline" id="cancelBtn">
                    <i class="bi bi-x-circle"></i>
                    Cancel
                </button>
                <button class="btn btn-warning" id="resetBtn">
                    <i class="bi bi-arrow-clockwise"></i>
                    Reset Form
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
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-open');
            });
            
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
            
            // Initialize with TRANSACTIONS menu open and Location Transfer active
            document.getElementById('transactionsToggle').click();
            document.getElementById('transactionsMenu').classList.add('open');
            document.querySelector('[data-section="location-transfer"]').classList.add('active');
            document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
            
            // Transfer Type Selection
            const transferTypes = document.querySelectorAll('.transfer-type');
            const locationTransferForm = document.getElementById('locationTransferForm');
            const costTransferForm = document.getElementById('costTransferForm');
            
            transferTypes.forEach(type => {
                type.addEventListener('click', function() {
                    // Remove active class from all types
                    transferTypes.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked type
                    this.classList.add('active');
                    
                    // Show/hide appropriate form
                    const transferType = this.getAttribute('data-type');
                    if (transferType === 'location') {
                        locationTransferForm.style.display = 'grid';
                        costTransferForm.style.display = 'none';
                    } else if (transferType === 'cost') {
                        locationTransferForm.style.display = 'none';
                        costTransferForm.style.display = 'grid';
                    }
                });
            });
            
            // Set today's date for date fields
            const today = new Date().toISOString().split('T')[0];
            document.querySelectorAll('input[type="date"]').forEach(dateInput => {
                if (!dateInput.value) {
                    dateInput.value = today;
                }
            });
            
            // Submit Transfer Button
            document.getElementById('submitTransferBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to submit this location transfer?')) {
                    showSuccessMessage('Location transfer submitted successfully! The request has been sent for approval.');
                    
                    // Simulate form reset
                    setTimeout(() => {
                        document.querySelectorAll('.form-control:not(.readonly)').forEach(input => {
                            if (input.type !== 'date') {
                                input.value = '';
                            }
                        });
                        document.querySelector('.remarks-textarea').value = '';
                    }, 2000);
                }
            });
            
            // Save Draft Button
            document.getElementById('saveDraftBtn').addEventListener('click', function() {
                showSuccessMessage('Transfer draft saved successfully!');
            });
            
            // Cancel Button
            document.getElementById('cancelBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
                    // Reset form
                    document.querySelectorAll('.form-control:not(.readonly)').forEach(input => {
                        if (input.type !== 'date') {
                            input.value = '';
                        }
                    });
                    document.querySelector('.remarks-textarea').value = '';
                    
                    // Reset transfer type to Location Transfer
                    transferTypes.forEach(t => t.classList.remove('active'));
                    document.querySelector('.transfer-type[data-type="location"]').classList.add('active');
                    locationTransferForm.style.display = 'grid';
                    costTransferForm.style.display = 'none';
                    
                    showSuccessMessage('Form has been reset.');
                }
            });
            
            // Reset Button
            document.getElementById('resetBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to reset the form?')) {
                    // Reset form
                    document.querySelectorAll('.form-control:not(.readonly)').forEach(input => {
                        if (input.type !== 'date') {
                            input.value = input.defaultValue || '';
                        } else {
                            input.value = today;
                        }
                    });
                    document.querySelector('.remarks-textarea').value = '';
                    
                    showSuccessMessage('Form has been reset.');
                }
            });
            
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