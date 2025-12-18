<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System - Bulk Upload</title>
    
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
        margin-left: 260px;
        padding: 20px;
        transition: all 0.3s ease;
        min-height: 100vh;
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

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: #f8f9fa;
        }

        /* Bulk Upload Specific Styles */
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

        /* Upload Container */
        .upload-container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .upload-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        /* File Upload Area */
        .file-upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            background: var(--light);
            transition: all 0.3s;
            cursor: pointer;
        }

        .file-upload-area:hover {
            border-color: var(--primary);
            background: #f0f7ff;
        }

        .file-upload-area.dragover {
            border-color: var(--primary);
            background: #e6f0ff;
        }

        .upload-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .upload-text {
            font-size: 16px;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .upload-hint {
            font-size: 14px;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .browse-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .browse-button:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        /* Upload Options */
        .upload-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .option-card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            background: white;
            transition: all 0.3s;
            cursor: pointer;
        }

        .option-card:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .option-card.active {
            border-color: var(--primary);
            background: #f0f7ff;
        }

        .option-icon {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .option-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .option-desc {
            font-size: 14px;
            color: var(--secondary);
        }

        /* Upload Table */
        .upload-table-container {
            background: white;
            border-radius: 10px;
            padding: 0;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            background: var(--light);
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .upload-table {
            width: 100%;
            border-collapse: collapse;
        }

        .upload-table th {
            background: #f8fafc;
            padding: 12px 15px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 1px solid var(--border-color);
            border-top: 1px solid var(--border-color);
        }

        .upload-table td {
            padding: 12px 15px;
            font-size: 13px;
            color: var(--dark);
            border-bottom: 1px solid var(--border-color);
        }

        .upload-table tbody tr:hover {
            background: #f8fafc;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-success {
            background: #d1fae5;
            color: #065f46;
        }

        .status-error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Type Selector */
        .type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .type-option {
            padding: 8px 20px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: white;
            color: var(--secondary);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .type-option:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .type-option.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Info Box */
        .info-box {
            background: #f0f7ff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            border-left: 4px solid var(--primary);
        }

        .info-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-content {
            font-size: 14px;
            color: var(--secondary);
            line-height: 1.6;
        }

        .info-list {
            margin: 15px 0;
            padding-left: 20px;
        }

        .info-list li {
            margin-bottom: 8px;
            color: var(--secondary);
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--secondary);
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

        /* Comments Section */
        .comments-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .comments-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .comments-box {
            width: 100%;
            min-height: 100px;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            resize: vertical;
        }

        .comments-box:focus {
            outline: none;
            border-color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .upload-table {
                display: block;
                overflow-x: auto;
            }
            
            .upload-options {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
        }

        /* File Preview */
        .file-preview {
            margin-top: 20px;
            padding: 15px;
            background: var(--light);
            border-radius: 8px;
            display: none;
        }

        .file-preview.show {
            display: block;
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .file-icon {
            font-size: 32px;
            color: var(--primary);
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .file-size {
            font-size: 13px;
            color: var(--secondary);
        }

        .remove-file {
            color: var(--danger);
            cursor: pointer;
            font-size: 18px;
        }

        .progress-bar {
            height: 8px;
            background: var(--border-color);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 10px;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary);
            width: 0%;
            transition: width 0.3s;
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Toggle (Added this missing element) -->
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

                <div class="sidebar-dropdown-item active" data-section="bulk-upload" onclick="window.location.href='{{ route('bulk_upload') }}'">
                    <i class="bi bi-upload"></i>
                    <span>Bulk Upload</span>
                </div>

                <div class="sidebar-dropdown-item " data-section="location-transfer" onclick="window.location.href='{{ route('location_transfer') }}'">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Location Transfer</span>
                </div>
              
                <div class="sidebar-dropdown-item" data-section="asset-replacement" onclick="window.location.href='{{ route('asset_replacement') }}'">
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
                 <div class="sidebar-dropdown-item  " data-section="pre-asset-recognition" onclick="window.location.href='{{ route('pre_asset_recognition') }}'">
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

    <!-- Main Content - Bulk Upload Interface -->
    <div class="main-content">
        <!-- [YOUR EXISTING BULK UPLOAD CONTENT STAYS EXACTLY THE SAME] -->
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h1 class="page-title">
                        <i class="bi bi-upload"></i>
                        Bulk Upload
                    </h1>
                    <p class="page-subtitle">Upload multiple assets using CSV/Excel template</p>
                </div>
                <div class="current-user-section">
                    <div class="user-label">Current User:</div>
                    <div class="user-value">bnln</div>
                    <div class="user-label">Active Directory Group:</div>
                    <div class="user-value">FAHS-Admin</div>
                </div>
            </div>
        </div>

        <!-- Upload Container -->
        <div class="upload-container">
            <!-- Upload Type Selection -->
            <div class="upload-section">
                <h3 class="section-title">
                    <i class="bi bi-gear"></i>
                    Upload Configuration
                </h3>
                
                <div class="type-selector">
                    <div class="type-option active" data-type="asset-new">
                        Asset (New)
                    </div>
                    <div class="type-option" data-type="pre-asset">
                        Pre-Asset Recognition
                    </div>
                    <div class="type-option" data-type="update">
                        Asset Update
                    </div>
                </div>

                <div class="upload-options">
                    <div class="option-card active" data-option="template">
                        <div class="option-icon">
                            <i class="bi bi-file-earmark-excel"></i>
                        </div>
                        <div class="option-title">Download Template</div>
                        <div class="option-desc">Download Excel template with required columns</div>
                    </div>
                    <div class="option-card" data-option="upload">
                        <div class="option-icon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="option-title">Upload File</div>
                        <div class="option-desc">Upload your completed template file</div>
                    </div>
                    <div class="option-card" data-option="validate">
                        <div class="option-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="option-title">Validate Data</div>
                        <div class="option-desc">Check for errors before processing</div>
                    </div>
                    <div class="option-card" data-option="process">
                        <div class="option-icon">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="option-title">Process Upload</div>
                        <div class="option-desc">Finalize and import the data</div>
                    </div>
                </div>
            </div>

            <!-- File Upload Area -->
            <div class="upload-section">
                <h3 class="section-title">
                    <i class="bi bi-cloud-arrow-up"></i>
                    File Upload
                </h3>
                
                <div class="file-upload-area" id="fileUploadArea">
                    <div class="upload-icon">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <div class="upload-text">
                        Drop your file here or click to browse
                    </div>
                    <div class="upload-hint">
                        Supported formats: .xlsx, .xls, .csv (Max file size: 10MB)
                    </div>
                    <button class="browse-button" id="browseButton">
                        <i class="bi bi-folder2-open"></i>
                        Browse Files
                    </button>
                    <input type="file" id="fileInput" accept=".xlsx,.xls,.csv" style="display: none;">
                </div>

                <!-- File Preview -->
                <div class="file-preview" id="filePreview">
                    <div class="file-info">
                        <div class="file-icon">
                            <i class="bi bi-file-excel"></i>
                        </div>
                        <div class="file-details">
                            <div class="file-name" id="fileName">bulk_upload_template.xlsx</div>
                            <div class="file-size" id="fileSize">2.4 MB</div>
                        </div>
                        <div class="remove-file" id="removeFile">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill" style="width: 100%"></div>
                    </div>
                </div>
            </div>

            <!-- Upload Preview Table -->
            <div class="upload-table-container">
                <div class="table-header">
                    <div class="table-title">
                        <i class="bi bi-table"></i>
                        Upload Preview
                    </div>
                    <div class="table-controls">
                        <div class="type-selector" style="margin-bottom: 0;">
                            <div class="type-option active" style="padding: 4px 12px; font-size: 12px;">
                                Type of Upload:
                            </div>
                            <div class="type-option active" style="padding: 4px 12px; font-size: 12px;">
                                Asset (New)
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="upload-table">
                    <thead>
                        <tr>
                            <th>Select File</th>
                            <th>AssetID</th>
                            <th>OracleNo</th>
                            <th>SerialNo</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </td>
                            <td>MAC00000000001</td>
                            <td>2016/MV/TSD/0130</td>
                            <td>CS: VKS344 / FREEDOM WHITE</td>
                            <td>2016 TOYOTA HILLIX PICK UP 2.4L 4X2 G A/T -05</td>
                            <td>
                                <span class="status-badge status-pending">
                                    <i class="bi bi-clock"></i>
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                </div>
                            </td>
                            <td>EQ000000000007</td>
                            <td>EG/0547</td>
                            <td>-</td>
                            <td>TURBO THREADMILL</td>
                            <td>
                                <span class="status-badge status-pending">
                                    <i class="bi bi-clock"></i>
                                    Pending
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Statistics Section -->
            <div class="stats-section">
                <div class="stat-card">
                    <div class="stat-value" id="rowCount">2</div>
                    <div class="stat-label">Row Count</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value" id="uploadCount">0</div>
                    <div class="stat-label">Upload Count</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value" id="successCount">0</div>
                    <div class="stat-label">Success</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value" id="errorCount">0</div>
                    <div class="stat-label">Errors</div>
                </div>
            </div>

            <!-- Information Box -->
            <div class="info-box">
                <h4 class="info-title">
                    <i class="bi bi-info-circle"></i>
                    Important Information
                </h4>
                <div class="info-content">
                    <p><strong>Please click on</strong> "Download Template" to get the required template format.</p>
                    <p>Maximum upload limit for the template is <strong>2500 rows</strong>.</p>
                    <p><strong>Note:</strong> Only .xlsx and .csv files are accepted for uploads.</p>
                    <p>Required columns in the template:</p>
                    <ul class="info-list">
                        <li>AssetID (must be unique)</li>
                        <li>OracleNo (format: YYYY/Department/Code)</li>
                        <li>SerialNo (serial number)</li>
                        <li>Description (asset description)</li>
                        <li>Category (asset category)</li>
                        <li>SubCategory (asset sub-category)</li>
                    </ul>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="comments-section">
                <h4 class="comments-title">
                    <i class="bi bi-chat-left-text"></i>
                    Comments
                </h4>
                <textarea class="comments-box" placeholder="Add any comments or notes about this upload..."></textarea>
                <p style="font-size: 12px; color: var(--secondary); margin-top: 10px;">
                    Add comments to describe the purpose of this bulk upload or any special instructions.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-success" id="downloadTemplateBtn">
                    <i class="bi bi-download"></i>
                    Download Template
                </button>
                <button class="btn btn-primary" id="validateBtn">
                    <i class="bi bi-check-circle"></i>
                    Validate Data
                </button>
                <button class="btn btn-warning" id="uploadBtn">
                    <i class="bi bi-cloud-upload"></i>
                    Start Upload
                </button>
                <button class="btn btn-outline" id="clearBtn">
                    <i class="bi bi-x-circle"></i>
                    Clear All
                </button>
                <div style="margin-left: auto;">
                    <button class="btn btn-outline">
                        <i class="bi bi-question-circle"></i>
                        Help
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
            
            // Initialize with TRANSACTIONS menu open and Bulk Upload active
            document.getElementById('transactionsToggle').click();
            document.getElementById('transactionsMenu').classList.add('open');
            document.querySelector('[data-section="bulk-upload"]').classList.add('active');
            document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                        sidebar.classList.remove('mobile-open');
                    }
                }
            });
            
            // Your existing bulk upload functionality
            // [KEEP ALL YOUR EXISTING BULK UPLOAD JAVASCRIPT HERE]
            // Menu item activation
            const menuItems = document.querySelectorAll('.sidebar-menu-item:not(.dropdown)');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (!this.classList.contains('dropdown')) {
                        // Remove active class from all items
                        menuItems.forEach(menuItem => {
                            menuItem.classList.remove('active');
                        });
                        
                        // Add active class to clicked item
                        this.classList.add('active');
                    }
                });
            });
            
            // Initialize dropdowns as open
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.classList.add('open');
            });
            
            // Upload Type Selection
            const typeOptions = document.querySelectorAll('.type-option');
            typeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    typeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    updateTableData(this.getAttribute('data-type'));
                });
            });
            
            // Upload Options
            const uploadOptions = document.querySelectorAll('.option-card');
            uploadOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const optionType = this.getAttribute('data-option');
                    handleOptionClick(optionType);
                });
            });
            
            // File Upload Handling
            const fileUploadArea = document.getElementById('fileUploadArea');
            const browseButton = document.getElementById('browseButton');
            const fileInput = document.getElementById('fileInput');
            const filePreview = document.getElementById('filePreview');
            const removeFile = document.getElementById('removeFile');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const progressFill = document.getElementById('progressFill');
            
            // Drag and drop events
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                fileUploadArea.classList.add('dragover');
            }
            
            function unhighlight() {
                fileUploadArea.classList.remove('dragover');
            }
            
            // Handle dropped files
            fileUploadArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            }
            
            // Browse button click
            browseButton.addEventListener('click', function() {
                fileInput.click();
            });
            
            // File input change
            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });
            
            // Remove file
            removeFile.addEventListener('click', function() {
                filePreview.classList.remove('show');
                fileInput.value = '';
                progressFill.style.width = '0%';
                updateRowCount(0);
            });
            
            function handleFiles(files) {
                if (files.length > 0) {
                    const file = files[0];
                    
                    // Check file type
                    const validTypes = ['.xlsx', '.xls', '.csv'];
                    const fileExtension = '.' + file.name.split('.').pop().toLowerCase();
                    
                    if (!validTypes.includes(fileExtension)) {
                        alert('Please upload only Excel or CSV files.');
                        return;
                    }
                    
                    // Check file size (10MB limit)
                    if (file.size > 10 * 1024 * 1024) {
                        alert('File size exceeds 10MB limit.');
                        return;
                    }
                    
                    // Display file info
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                    
                    // Show preview and simulate upload
                    filePreview.classList.add('show');
                    
                    // Simulate upload progress
                    let progress = 0;
                    const interval = setInterval(() => {
                        progress += 10;
                        progressFill.style.width = progress + '%';
                        
                        if (progress >= 100) {
                            clearInterval(interval);
                            simulateUploadSuccess(file);
                        }
                    }, 100);
                }
            }
            
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
            
            function simulateUploadSuccess(file) {
                // Simulate processing the file and updating the table
                updateRowCount(2); // Sample data from the image
                showSuccessMessage('File uploaded successfully! Data preview is available below.');
            }
            
            function updateRowCount(count) {
                const rowCount = document.getElementById('rowCount');
                rowCount.textContent = count;
            }
            
            function updateTableData(type) {
                // In a real application, this would fetch data based on the selected type
                console.log('Switching to upload type:', type);
            }
            
            function handleOptionClick(optionType) {
                switch(optionType) {
                    case 'template':
                        downloadTemplate();
                        break;
                    case 'upload':
                        // Already handled by file upload
                        break;
                    case 'validate':
                        validateData();
                        break;
                    case 'process':
                        processUpload();
                        break;
                }
            }
            
            function downloadTemplate() {
                // Simulate template download
                showSuccessMessage('Template download started. Check your downloads folder.');
                
                // In a real app, this would initiate a file download
                const link = document.createElement('a');
                link.href = '#';
                link.download = 'AssetMGR_Bulk_Upload_Template.xlsx';
                link.click();
            }
            
            function validateData() {
                // Simulate validation
                const successCount = document.getElementById('successCount');
                const errorCount = document.getElementById('errorCount');
                const uploadCount = document.getElementById('uploadCount');
                
                successCount.textContent = '2';
                errorCount.textContent = '0';
                uploadCount.textContent = '2';
                
                // Update table status
                const statusBadges = document.querySelectorAll('.status-badge');
                statusBadges.forEach(badge => {
                    badge.className = 'status-badge status-success';
                    badge.innerHTML = '<i class="bi bi-check-circle"></i> Valid';
                });
                
                showSuccessMessage('Data validation completed. 2 records validated successfully.');
            }
            
            function processUpload() {
                // Simulate upload processing
                showSuccessMessage('Upload processing started... This may take a few moments.');
                
                // Simulate progress
                setTimeout(() => {
                    showSuccessMessage('Upload completed successfully! 2 assets have been added to the system.');
                }, 2000);
            }
            
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
            
            // Button event listeners
            document.getElementById('downloadTemplateBtn').addEventListener('click', downloadTemplate);
            document.getElementById('validateBtn').addEventListener('click', validateData);
            document.getElementById('uploadBtn').addEventListener('click', processUpload);
            document.getElementById('clearBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to clear all data?')) {
                    filePreview.classList.remove('show');
                    fileInput.value = '';
                    progressFill.style.width = '0%';
                    updateRowCount(0);
                    
                    // Reset stats
                    document.getElementById('rowCount').textContent = '0';
                    document.getElementById('uploadCount').textContent = '0';
                    document.getElementById('successCount').textContent = '0';
                    document.getElementById('errorCount').textContent = '0';
                    
                    // Reset table status
                    const statusBadges = document.querySelectorAll('.status-badge');
                    statusBadges.forEach(badge => {
                        badge.className = 'status-badge status-pending';
                        badge.innerHTML = '<i class="bi bi-clock"></i> Pending';
                    });
                    
                    // Clear comments
                    document.querySelector('.comments-box').value = '';
                    
                    showSuccessMessage('All data has been cleared.');
                }
            });
        });
        
    </script>
</body>
</html>