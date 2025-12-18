<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Asset Management System - My Approval Queue</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
  --border-color: #e2e8f0;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #f1f5f9;
  font-family: 'Segoe UI', system-ui, sans-serif;
  color: #334155;
  overflow-x: hidden;
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

/* My Approval Queue Specific Styles */
.page-header {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-left h1 {
    font-size: 24px;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 5px;
}

.header-left .timestamp {
    color: var(--secondary);
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.header-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 5px;
}

.user-info {
    font-size: 14px;
    color: var(--dark);
}

.user-info strong {
    color: var(--primary);
}

.ad-group-info {
    font-size: 13px;
    color: var(--secondary);
}

/* Dashboard Cards */
.dashboard-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.card-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-count {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary);
}

/* Approval Sections */
.approval-sections {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.approval-section {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.section-header {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-title {
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.select-all {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    cursor: pointer;
}

.remark-input {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
}

.remark-input input {
    border: 1px solid rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.1);
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    width: 150px;
}

.remark-input input::placeholder {
    color: rgba(255,255,255,0.7);
}

/* Table Styling */
.approval-table-container {
    overflow-x: auto;
}

.approval-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1200px;
}

.approval-table th {
    background: #f8fafc;
    padding: 12px 15px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid var(--border-color);
}

.approval-table td {
    padding: 12px 15px;
    font-size: 13px;
    color: var(--dark);
    border-bottom: 1px solid var(--border-color);
}

.approval-table tr:hover {
    background: #f8fafc;
}

.approval-table input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
}

.ref-id {
    color: var(--primary);
    font-weight: 600;
    font-family: monospace;
}

.asset-id {
    color: var(--success);
    font-weight: 600;
    font-family: monospace;
}

.approval-type {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
}

.approval-type.location {
    background: #dbeafe;
    color: #1e40af;
}

.approval-type.disposal {
    background: #fee2e2;
    color: #b91c1c;
}

.approval-type.replacement {
    background: #fef3c7;
    color: #92400e;
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
    transform: translateY(-1px);
}

.btn-success {
    background: var(--success);
    color: white;
}

.btn-success:hover {
    background: #059669;
}

.btn-danger {
    background: var(--danger);
    color: white;
}

.btn-danger:hover {
    background: #dc2626;
}

.btn-outline {
    background: white;
    color: var(--primary);
    border: 1px solid var(--primary);
}

.btn-outline:hover {
    background: var(--light);
}

/* Applications Menu */
.applications-menu {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.applications-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--border-color);
}

.applications-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
}

.app-item {
    background: #f8fafc;
    border-radius: 6px;
    padding: 15px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    border: 1px solid var(--border-color);
}

.app-item:hover {
    background: #f0f7ff;
    border-color: var(--primary-light);
    transform: translateY(-2px);
}

.app-icon {
    font-size: 24px;
    color: var(--primary);
    margin-bottom: 10px;
}

.app-label {
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
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

                <div class="sidebar-dropdown-item " data-section="bulk-upload" onclick="window.location.href='{{ route('bulk_upload') }}'">
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
    
    <!-- APPROVAL QUEUES Section - INITIALLY OPEN -->
    <div class="sidebar-section">
        <div class="section-title-toggle" id="approvalQueuesToggle">
            <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                <i class="bi bi-clipboard-check"></i>
                APPROVAL QUEUES
            </div>
            <i class="bi bi-chevron-right toggle-icon open"></i>
        </div>
        <div class="sidebar-dropdown open" id="approvalQueuesMenu">
              <div class="sidebar-dropdown-item active badge-item"  onclick="window.location.href='{{ route('my_approval_queue') }}'">
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

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-left">
                <h1>My Approval Queue</h1>
                <div class="timestamp">
                    <i class="bi bi-calendar"></i>
                    <span>Apr 16, 2020 | 7:17:01 PM</span>
                </div>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <strong>Current User:</strong> Isula
                </div>
                <div class="ad-group-info">
                    <strong>Active Directory Group:</strong> RAMS-Admin
                </div>
            </div>
        </div>

        <!-- Applications Menu -->
        <div class="applications-menu">
            <div class="applications-title">APPLICATIONS MENU</div>
            <div class="applications-grid">
                <div class="app-item" onclick="window.location.href='new-assets.html'">
                    <div class="app-icon">
                        <i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="app-label">TRANSACTIONS</div>
                </div>
                <div class="app-item" onclick="window.location.href='my-approval-queue.html'">
                    <div class="app-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div class="app-label">APPROVAL QUEUES</div>
                </div>
                <div class="app-item" onclick="window.location.href='reports.html'">
                    <div class="app-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>
                    <div class="app-label">REPORTS</div>
                </div>
                <div class="app-item" onclick="window.location.href='administration.html'">
                    <div class="app-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="app-label">ADMINISTRATION</div>
                </div>
                <div class="app-item" onclick="window.location.href='consumables.html'">
                    <div class="app-icon">
                        <i class="bi bi-box"></i>
                    </div>
                    <div class="app-label">CONSUMABLES</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="bi bi-clipboard-check"></i>
                        My Approval Queue
                    </div>
                    <div class="card-count">102</div>
                </div>
                <p style="font-size: 13px; color: var(--secondary); margin-bottom: 0;">
                    Pending approvals requiring your action
                </p>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="bi bi-clipboard-data"></i>
                        All Approval Queue
                    </div>
                    <div class="card-count">122</div>
                </div>
                <p style="font-size: 13px; color: var(--secondary); margin-bottom: 0;">
                    Total pending approvals across all groups
                </p>
            </div>
        </div>

        <!-- Approval Sections -->
        <div class="approval-sections">
            <!-- All Approvals Section -->
            <div class="approval-section">
                <div class="section-header">
                    <div class="section-title">
                        <i class="bi bi-clipboard-data"></i>
                        ALL APPROVAL QUEUE
                    </div>
                    <div class="section-controls">
                        <div class="select-all">
                            <input type="checkbox" id="selectAllApprovals">
                            <label for="selectAllApprovals">Select All</label>
                        </div>
                        <div class="remark-input">
                            <label>Remark:</label>
                            <input type="text" placeholder="Enter remark">
                        </div>
                    </div>
                </div>
                
                <div class="approval-table-container">
                    <table class="approval-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllHeader"></th>
                                <th>Ref ID</th>
                                <th>Ticket No</th>
                                <th>Asset ID</th>
                                <th>OFAR ID</th>
                                <th>Serial No</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Approval Group</th>
                                <th>Approval Type Name</th>
                                <th>Approval ID</th>
                                <th>Approval Type ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="row-checkbox"></td>
                                <td class="ref-id">TRN-2020.0.1010</td>
                                <td>FFO-2020.0.019</td>
                                <td class="asset-id">2019/18FX_</td>
                                <td>-</td>
                                <td>-</td>
                                <td>MIDBACK CHAIR, ACL 300M</td>
                                <td>TBD</td>
                                <td>PFAM</td>
                                <td><span class="approval-type location">Location Transfer</span></td>
                                <td>2</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-checkbox"></td>
                                <td class="ref-id">TRN-2020.0.1234</td>
                                <td>CPX-2020.0.0358</td>
                                <td class="asset-id">CPX0000000358</td>
                                <td>-</td>
                                <td>MP038984-54</td>
                                <td>Toshiba barcode printer</td>
                                <td>21342</td>
                                <td>PFAM</td>
                                <td><span class="approval-type location">Location Transfer</span></td>
                                <td>5</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Disposal Approvals Section -->
            <div class="approval-section">
                <div class="section-header">
                    <div class="section-title">
                        <i class="bi bi-trash"></i>
                        LIST FOR APPROVAL (DISPOSAL)
                    </div>
                    <div class="section-controls">
                        <div class="select-all">
                            <input type="checkbox" id="selectAllDisposals">
                            <label for="selectAllDisposals">Select All</label>
                        </div>
                        <div class="remark-input">
                            <label>Remark:</label>
                            <input type="text" placeholder="Enter remark">
                        </div>
                    </div>
                </div>
                
                <div class="approval-table-container">
                    <table class="approval-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllDisposalHeader"></th>
                                <th>Ref ID</th>
                                <th>Ticket No</th>
                                <th>Asset ID</th>
                                <th>OFAR ID</th>
                                <th>Serial No</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Approval Group</th>
                                <th>Approval Type Name</th>
                                <th>Approval ID</th>
                                <th>Approval Type ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="row-checkbox-disposal"></td>
                                <td class="ref-id">DIS-2020.0.1010</td>
                                <td>FFO-2020.0.019</td>
                                <td class="asset-id">2019/18FX_</td>
                                <td>-</td>
                                <td>-</td>
                                <td>MIDBACK CHAIR, ACL 300M</td>
                                <td>TBD</td>
                                <td>PFAM</td>
                                <td><span class="approval-type disposal">Disposal Transfer</span></td>
                                <td>5</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-checkbox-disposal"></td>
                                <td class="ref-id">DIS-2020.0.1234</td>
                                <td>CPX-2020.0.0358</td>
                                <td class="asset-id">CPX0000000358</td>
                                <td>-</td>
                                <td>123456</td>
                                <td>audghj</td>
                                <td>ghjpk</td>
                                <td>PFAM</td>
                                <td><span class="approval-type disposal">Disposal Transfer</span></td>
                                <td>8</td>
                                <td>8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="approveSelected()">
                <i class="bi bi-check-circle"></i>
                Approve Selected
            </button>
            <button class="btn btn-danger" onclick="rejectSelected()">
                <i class="bi bi-x-circle"></i>
                Reject Selected
            </button>
            <button class="btn btn-outline" onclick="viewDetails()">
                <i class="bi bi-eye"></i>
                View Details
            </button>
            <button class="btn btn-success" onclick="exportToExcel()">
                <i class="bi bi-file-earmark-excel"></i>
                Export to Excel
            </button>
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
    
    // Initialize sidebar sections
    initializeSidebar();
    
    // Set current date and time
    updateDateTime();
    
    // Checkbox functionality
    setupCheckboxes();
});

function initializeSidebar() {
    // Main section toggles
    const mainSections = ['transactionsToggle', 'approvalQueuesToggle', 'reportsToggle', 'administrationToggle', 'consumablesToggle'];
    
    mainSections.forEach(sectionId => {
        const toggle = document.getElementById(sectionId);
        if (toggle) {
            toggle.addEventListener('click', function() {
                const menuId = sectionId.replace('Toggle', 'Menu');
                const menu = document.getElementById(menuId);
                const icon = this.querySelector('.toggle-icon');
                
                // Toggle current menu
                menu.classList.toggle('open');
                icon.classList.toggle('open');
            });
        }
    });
    
    // Nested dropdown toggles
    const nestedToggles = ['masterFilesToggle', 'barcodeToggle', 'accessControlToggle', 'syncToggle'];
    
    nestedToggles.forEach(toggleId => {
        const toggle = document.getElementById(toggleId);
        if (toggle) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                
                const menuId = toggleId.replace('Toggle', 'Menu');
                const menu = document.getElementById(menuId);
                const icon = this.querySelector('.toggle-icon');
                
                // Toggle menu
                menu.classList.toggle('open');
                icon.classList.toggle('open');
            });
        }
    });
    
    // APPROVAL QUEUES section is already open from HTML
    // Make sure My Approval Queue is active
    const approvalQueuesItem = document.querySelector('[data-section="my-approval-queue"]');
    if (approvalQueuesItem) {
        approvalQueuesItem.classList.add('active');
    }
}

function updateDateTime() {
    const now = new Date();
    const options = { 
        month: 'short', 
        day: '2-digit', 
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    };
    
    const dateStr = now.toLocaleDateString('en-US', {
        month: 'short',
        day: '2-digit',
        year: 'numeric'
    });
    
    const timeStr = now.toLocaleTimeString('en-US', {
        hour12: false,
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    
    document.querySelector('.timestamp span').textContent = `${dateStr} | ${timeStr}`;
}

function setupCheckboxes() {
    // Select All for approvals
    const selectAllApprovals = document.getElementById('selectAllApprovals');
    const selectAllHeader = document.getElementById('selectAllHeader');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    
    if (selectAllApprovals && selectAllHeader) {
        selectAllApprovals.addEventListener('change', function() {
            const isChecked = this.checked;
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllHeader.checked = isChecked;
        });
        
        selectAllHeader.addEventListener('change', function() {
            const isChecked = this.checked;
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllApprovals.checked = isChecked;
        });
    }
    
    // Select All for disposals
    const selectAllDisposals = document.getElementById('selectAllDisposals');
    const selectAllDisposalHeader = document.getElementById('selectAllDisposalHeader');
    const disposalCheckboxes = document.querySelectorAll('.row-checkbox-disposal');
    
    if (selectAllDisposals && selectAllDisposalHeader) {
        selectAllDisposals.addEventListener('change', function() {
            const isChecked = this.checked;
            disposalCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllDisposalHeader.checked = isChecked;
        });
        
        selectAllDisposalHeader.addEventListener('change', function() {
            const isChecked = this.checked;
            disposalCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            selectAllDisposals.checked = isChecked;
        });
    }
}

function approveSelected() {
    const selectedApprovals = document.querySelectorAll('.row-checkbox:checked');
    const selectedDisposals = document.querySelectorAll('.row-checkbox-disposal:checked');
    
    const totalSelected = selectedApprovals.length + selectedDisposals.length;
    
    if (totalSelected === 0) {
        showMessage('Please select items to approve.', 'warning');
        return;
    }
    
    if (confirm(`Approve ${totalSelected} selected item(s)?`)) {
        showMessage(`${totalSelected} item(s) approved successfully!`, 'success');
        
        // Clear checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
    }
}

function rejectSelected() {
    const selectedApprovals = document.querySelectorAll('.row-checkbox:checked');
    const selectedDisposals = document.querySelectorAll('.row-checkbox-disposal:checked');
    
    const totalSelected = selectedApprovals.length + selectedDisposals.length;
    
    if (totalSelected === 0) {
        showMessage('Please select items to reject.', 'warning');
        return;
    }
    
    if (confirm(`Reject ${totalSelected} selected item(s)?`)) {
        showMessage(`${totalSelected} item(s) rejected successfully!`, 'success');
        
        // Clear checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
    }
}

function viewDetails() {
    showMessage('View details functionality would open a detailed view of selected items.', 'info');
}

function exportToExcel() {
    showMessage('Exporting data to Excel...', 'info');
    // Simulate export delay
    setTimeout(() => {
        showMessage('Data exported to Excel successfully!', 'success');
    }, 1500);
}

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
    
    messageDiv.innerHTML = `<span>${message}</span>`;
    
    document.body.appendChild(messageDiv);
    
    setTimeout(() => {
        messageDiv.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => messageDiv.remove(), 300);
    }, 3000);
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
</script>
</body>
</html>