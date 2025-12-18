<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Asset Management System - Purchase Report</title>

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

/* Purchase Report Specific Styles */
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

/* Report Container */
.report-container {
    background: white;
    border-radius: 8px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.report-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 10px;
}

.report-title i {
    color: var(--primary);
}

/* Search Table Section - UPDATED TO MATCH IMAGE */
.search-table-section {
    margin-bottom: 30px;
    background: #f8fafc;
    border-radius: 8px;
    padding: 20px;
    border: 1px solid var(--border-color);
}

.table-header {
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.table-header i {
    color: var(--primary);
}

.search-table-container {
    overflow-x: auto;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    background: white;
}

.search-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
}

.search-table th {
    background: #f1f5f9;
    padding: 12px 15px;
    text-align: center;
    font-size: 12px;
    font-weight: 600;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid var(--border-color);
    border-right: 1px solid var(--border-color);
}

.search-table th:last-child {
    border-right: none;
}

.search-table td {
    padding: 15px;
    text-align: center;
    font-size: 14px;
    color: var(--dark);
    border-bottom: 1px solid var(--border-color);
    border-right: 1px solid var(--border-color);
    vertical-align: middle;
}

.search-table td:last-child {
    border-right: none;
}

.search-table tr:hover {
    background: #f8fafc;
}

/* Table input styling */
.table-input {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    font-size: 14px;
    color: var(--dark);
    background: white;
    text-align: center;
}

.table-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

/* Port Section */
.port-section {
    background: #f8fafc;
    border-radius: 8px;
    padding: 15px;
    margin: 20px 0;
    border: 1px solid var(--border-color);
}

.port-header {
    font-size: 14px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.port-options {
    display: flex;
    gap: 15px;
    align-items: center;
}

.port-btn {
    padding: 6px 12px;
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.3s;
}

.port-btn:hover {
    background: #f1f5f9;
    border-color: var(--primary);
}

.port-btn.active {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

/* Filter Controls */
.filter-controls {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.filter-select {
    flex: 1;
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    font-size: 14px;
    color: var(--dark);
}

.filter-select:focus {
    outline: none;
    border-color: var(--primary);
}

/* Report Actions */
.report-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 2px solid var(--border-color);
}

.export-options {
    display: flex;
    gap: 10px;
    align-items: center;
}

.export-options span {
    font-size: 14px;
    color: var(--secondary);
    font-weight: 500;
}

/* Buttons */
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

.btn-outline {
    background: white;
    color: var(--primary);
    border: 1px solid var(--primary);
}

.btn-outline:hover {
    background: var(--light);
}

/* Purchase Order No. Section */
.po-section {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.po-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.po-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--dark);
}

.po-search {
    display: flex;
    gap: 10px;
}

.po-input {
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    width: 200px;
}

/* Quick Stats */
.quick-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 25px;
}

.stat-card {
    background: white;
    border-radius: 8px;
    padding: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.stat-value {
    font-size: 22px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 5px;
}

.stat-label {
    font-size: 12px;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Report Table */
.report-table-container {
    margin-top: 25px;
    overflow-x: auto;
    border: 1px solid var(--border-color);
    border-radius: 6px;
}

.report-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1000px;
}

.report-table th {
    background: #f1f5f9;
    padding: 12px 15px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid var(--border-color);
}

.report-table td {
    padding: 12px 15px;
    font-size: 13px;
    color: var(--dark);
    border-bottom: 1px solid var(--border-color);
}

.report-table tr:hover {
    background: #f8fafc;
}

/* Search Info Row */
.search-info-row {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.search-label {
    font-weight: 600;
    color: var(--dark);
    font-size: 14px;
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
            <div class="sidebar-dropdown-item" data-section="new-assets" onclick="window.location.href='new-assets.html'">
                <i class="bi bi-plus-circle"></i>
                <span>New Assets</span>
            </div>

            <div class="sidebar-dropdown-item" data-section="open-records" onclick="window.location.href='open-records.html'">
                <i class="bi bi-folder2-open"></i>
                <span>Open Records</span>
            </div>

            <div class="sidebar-dropdown-item" data-section="bulk-upload" onclick="window.location.href='bulk-upload.html'">
                <i class="bi bi-upload"></i>
                <span>Bulk Upload</span>
            </div>

            <div class="sidebar-dropdown-item" data-section="location-transfer" onclick="window.location.href='location-transfer.html'">
                <i class="bi bi-arrow-left-right"></i>
                <span>Location Transfer</span>
            </div>
          
            <div class="sidebar-dropdown-item" data-section="asset-replacement" onclick="window.location.href='asset-replacement.html'">
                <i class="bi bi-arrow-repeat"></i>
                <span>Asset Replacement</span>
            </div>

            <div class="sidebar-dropdown-item" data-section="asset-disposal" onclick="window.location.href='asset-disposal.html'">
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
             <div class="sidebar-dropdown-item" data-section="pre-asset-recognition" onclick="window.location.href='pre-asset-recognition.html'">
                <i class="bi bi-check-circle"></i>
                <span>Pre-Asset Recognition</span>
            </div>
             <div class="sidebar-dropdown-item" data-section="loan-asset" onclick="window.location.href='loan-asset.html'">
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
            <div class="sidebar-dropdown-item badge-item" onclick="window.location.href='my-approval-queue.html'">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <i class="bi bi-inboxes"></i>
                    <span>My Approval Queue</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- REPORTS Section - INITIALLY OPEN -->
    <div class="sidebar-section">
        <div class="section-title-toggle" id="reportsToggle">
            <div class="sidebar-section-title" style="padding: 0; margin: 0; display: flex; align-items: center; gap: 8px;">
                <i class="bi bi-bar-chart-line"></i>
                REPORTS
            </div>
            <i class="bi bi-chevron-right toggle-icon open"></i>
        </div>
        <div class="sidebar-dropdown open" id="reportsMenu">
            <div class="sidebar-dropdown-item active" data-section="purchase-report">
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
            <h1>Purchase Report</h1>
        </div>
        <div class="header-right">
            <div class="user-info">
                <strong>Current User:</strong> Barla
            </div>
            <div class="ad-group-info">
                <strong>Active Directory Group:</strong> FAMS-Admin
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats">
        <div class="stat-card">
            <div class="stat-value">358</div>
            <div class="stat-label">Total Assets</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">142</div>
            <div class="stat-label">Purchased Items</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">₱1.2M</div>
            <div class="stat-label">Total Value</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">24</div>
            <div class="stat-label">Active Vendors</div>
        </div>
    </div>

    <!-- Port Section -->
    <div class="port-section">
        <div class="port-header">
            <i class="bi bi-hdd"></i>
            Port
        </div>
        <div class="port-options">
            <button class="port-btn active">Report</button>
            <button class="port-btn">ft</button>
            <button class="port-btn">summary</button>
        </div>
    </div>

    <!-- Report Container -->
    <div class="report-container">
        <div class="report-title">
            <i class="bi bi-file-text"></i>
            PURCHASE REPORT
        </div>

        <!-- Search Info Row -->
        <div class="search-info-row">
            <span class="search-label">Search By:</span>
            <button class="btn btn-primary" onclick="searchAction()">
                <i class="bi bi-search"></i>
                Search
            </button>
            <span class="search-label">Export Options:</span>
            <button class="btn btn-success" onclick="exportToExcel()">
                <i class="bi bi-file-earmark-excel"></i>
                Excel
            </button>
            <button class="btn btn-outline" onclick="exportToPDF()">
                <i class="bi bi-file-earmark-pdf"></i>
                PDF
            </button>
        </div>

        <!-- Search Table Section - UPDATED TO MATCH IMAGE -->
        <div class="search-table-section">
            <div class="table-header">
                <i class="bi bi-search"></i>
                Search By:
            </div>
            <div class="search-table-container">
                <table class="search-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Serial No.</th>
                            <th>OFAR ID</th>
                            <th>Asset ID</th>
                            <th>Description</th>
                            <th>Site</th>
                            <th>Purchase Order No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter category...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter sub category...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter serial no...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter OFAR ID...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter asset ID...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter description...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter site...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter PO number...">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Second Search Table Section -->
        <div class="search-table-section">
            <div class="table-header">
                <i class="bi bi-search"></i>
                Search By:
            </div>
            <div class="search-table-container">
                <table class="search-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Serial No.</th>
                            <th>OFAR ID</th>
                            <th>Asset ID</th>
                            <th>Description</th>
                            <th>Site</th>
                            <th>Purchase Date</th>
                            <th>Purchase Order No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter category...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter sub category...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter serial no...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter OFAR ID...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter asset ID...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter description...">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter site...">
                            </td>
                            <td>
                                <input type="date" class="table-input">
                            </td>
                            <td>
                                <input type="text" class="table-input" placeholder="Enter PO number...">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Filter Controls -->
        <div class="filter-controls">
            <select class="filter-select">
                <option value="">Select Category</option>
                <option value="COMPUTER & PRINTER">COMPUTER & PRINTER</option>
                <option value="FURNITURE">FURNITURE</option>
                <option value="EQUIPMENT">EQUIPMENT</option>
            </select>
            <select class="filter-select">
                <option value="">Select Sub Category</option>
                <option value="Printer">Printer</option>
                <option value="Desktop">Desktop</option>
                <option value="Laptop">Laptop</option>
            </select>
            <select class="filter-select">
                <option value="">Select Site</option>
                <option value="TBD">TBD</option>
                <option value="Main Office">Main Office</option>
                <option value="Warehouse">Warehouse</option>
            </select>
        </div>

        <!-- Purchase Order No. Section -->
        <div class="po-section">
            <div class="po-header">
                <div class="po-title">Purchase Order No.</div>
                <div class="po-search">
                    <input type="text" class="po-input" placeholder="Enter PO Number">
                    <button class="btn btn-outline">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Report Actions -->
        <div class="report-actions">
            <div>
                <button class="btn btn-primary" onclick="generateReport()">
                    <i class="bi bi-search"></i>
                    Generate Report
                </button>
            </div>
            <div class="export-options">
                <span>Export Options:</span>
                <button class="btn btn-success" onclick="exportToExcel()">
                    <i class="bi bi-file-earmark-excel"></i>
                    Excel
                </button>
                <button class="btn btn-outline" onclick="exportToPDF()">
                    <i class="bi bi-file-earmark-pdf"></i>
                    PDF
                </button>
                <button class="btn btn-outline" onclick="printReport()">
                    <i class="bi bi-printer"></i>
                    Print
                </button>
            </div>
        </div>

        <!-- Report Table -->
        <div class="report-table-container">
            <table class="report-table">
                <thead>
                    <tr>
                        <th>Asset ID</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Serial No.</th>
                        <th>Site</th>
                        <th>Purchase Date</th>
                        <th>Purchase Order No.</th>
                        <th>Vendor</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CPX0000000358</td>
                        <td>HP Printer</td>
                        <td>COMPUTER & PRINTER</td>
                        <td>Printer</td>
                        <td>MP038984-54</td>
                        <td>TBD</td>
                        <td>2020-04-16</td>
                        <td>43556</td>
                        <td>ABENSON</td>
                        <td>₱15,000</td>
                    </tr>
                    <tr>
                        <td>FFO-2020.0.019</td>
                        <td>MIDBACK CHAIR, ACL 300M</td>
                        <td>FURNITURE</td>
                        <td>Office Chair</td>
                        <td>-</td>
                        <td>TBD</td>
                        <td>2020-03-10</td>
                        <td>42310</td>
                        <td>OFFICE DEPOT</td>
                        <td>₱8,500</td>
                    </tr>
                    <tr>
                        <td>LAP-2020.0.045</td>
                        <td>DELL Laptop</td>
                        <td>COMPUTER & PRINTER</td>
                        <td>Laptop</td>
                        <td>DL789456</td>
                        <td>Main Office</td>
                        <td>2020-05-22</td>
                        <td>43892</td>
                        <td>DELL PH</td>
                        <td>₱45,000</td>
                    </tr>
                    <tr>
                        <td>EQP-2020.0.112</td>
                        <td>Air Conditioner</td>
                        <td>EQUIPMENT</td>
                        <td>AC Unit</td>
                        <td>AC-789123</td>
                        <td>Warehouse</td>
                        <td>2020-06-15</td>
                        <td>44123</td>
                        <td>CARRIER</td>
                        <td>₱32,000</td>
                    </tr>
                </tbody>
            </table>
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
    
    // Setup port buttons
    setupPortButtons();
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
    
    // REPORTS section is already open from HTML
    // Make sure Purchase Report is active
    const purchaseReportItem = document.querySelector('[data-section="purchase-report"]');
    if (purchaseReportItem) {
        purchaseReportItem.classList.add('active');
    }
}

function setupPortButtons() {
    const portButtons = document.querySelectorAll('.port-btn');
    portButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            portButtons.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const portType = this.textContent;
            showMessage(`Port changed to: ${portType}`, 'info');
        });
    });
}

function searchAction() {
    // Collect search values from tables
    const searchCriteria = [];
    
    // Get from first table
    const table1 = document.querySelectorAll('.search-table')[0];
    const inputs1 = table1.querySelectorAll('input');
    const headers1 = table1.querySelectorAll('th');
    
    inputs1.forEach((input, index) => {
        if (input.value.trim() !== '') {
            const fieldName = headers1[index].textContent;
            searchCriteria.push(`${fieldName}: ${input.value}`);
        }
    });
    
    // Get from second table
    const table2 = document.querySelectorAll('.search-table')[1];
    const inputs2 = table2.querySelectorAll('input');
    const headers2 = table2.querySelectorAll('th');
    
    inputs2.forEach((input, index) => {
        if (input.value.trim() !== '') {
            const fieldName = headers2[index].textContent;
            // Check if not already in searchCriteria
            if (!searchCriteria.some(criteria => criteria.includes(fieldName))) {
                searchCriteria.push(`${fieldName}: ${input.value}`);
            }
        }
    });
    
    const message = searchCriteria.length > 0 
        ? `Searching by: ${searchCriteria.join(', ')}`
        : 'Please enter search criteria';
    
    showMessage(message, searchCriteria.length > 0 ? 'info' : 'warning');
}

function generateReport() {
    // Get all search values
    const searchValues = [];
    const tables = document.querySelectorAll('.search-table');
    
    tables.forEach((table, tableIndex) => {
        const inputs = table.querySelectorAll('input');
        const headers = table.querySelectorAll('th');
        
        inputs.forEach((input, index) => {
            if (input.value.trim() !== '') {
                const fieldName = headers[index].textContent;
                searchValues.push(`${fieldName}: "${input.value}"`);
            }
        });
    });
    
    // Get filter values
    const category = document.querySelector('.filter-select').value;
    const subCategory = document.querySelectorAll('.filter-select')[1].value;
    const site = document.querySelectorAll('.filter-select')[2].value;
    
    const filterMessage = [];
    if (category) filterMessage.push(`Category: ${category}`);
    if (subCategory) filterMessage.push(`Sub Category: ${subCategory}`);
    if (site) filterMessage.push(`Site: ${site}`);
    
    const poNumber = document.querySelector('.po-input').value;
    if (poNumber.trim() !== '') {
        filterMessage.push(`PO Number: ${poNumber}`);
    }
    
    if (searchValues.length === 0 && filterMessage.length === 0) {
        showMessage('Please enter search criteria or select filters to generate report.', 'warning');
        return;
    }
    
    const message = `Generating report... ${
        searchValues.length > 0 ? 'Search criteria: ' + searchValues.join(', ') : ''
    } ${
        filterMessage.length > 0 ? 'Filters: ' + filterMessage.join(', ') : ''
    }`;
    
    showMessage(message, 'info');
    
    // Simulate report generation
    setTimeout(() => {
        showMessage('Purchase report generated successfully!', 'success');
        // Scroll to table
        document.querySelector('.report-table-container').scrollIntoView({ behavior: 'smooth' });
    }, 1500);
}

function exportToExcel() {
    showMessage('Exporting purchase report to Excel...', 'info');
    setTimeout(() => {
        showMessage('Report exported to Excel successfully!', 'success');
    }, 1500);
}

function exportToPDF() {
    showMessage('Exporting purchase report to PDF...', 'info');
    setTimeout(() => {
        showMessage('Report exported to PDF successfully!', 'success');
    }, 1500);
}

function printReport() {
    showMessage('Preparing report for printing...', 'info');
    setTimeout(() => {
        window.print();
    }, 1000);
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