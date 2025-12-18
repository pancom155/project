<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Asset Management System - New Assets</title>

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

body {
  background-color: #f1f5f9;
  font-family: 'Segoe UI', system-ui, sans-serif;
  color: #334155;
  margin: 0;
  padding: 0;
  display: flex;
  min-height: 100vh;
}

/* SIDEBAR CSS */
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

/* NEW ASSETS SPECIFIC STYLES */
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

/* Search Section */
.search-section {
  background: white;
  border-radius: 10px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.search-box {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.search-input {
  flex: 1;
  padding: 10px 15px;
  border: 2px solid var(--border-color);
  border-radius: 6px;
  font-size: 14px;
}

.search-input:focus {
  border-color: var(--primary);
  outline: none;
}

/* Asset Details Card */
.asset-details-card {
  background: #f8fafc;
  border-radius: 8px;
  padding: 15px;
  margin: 15px 0;
  border: 1px solid var(--border-color);
}

.detail-row {
  display: flex;
  margin-bottom: 8px;
}

.detail-label {
  font-weight: 600;
  color: var(--secondary);
  width: 150px;
  font-size: 14px;
}

.detail-value {
  color: var(--dark);
  font-size: 14px;
}

/* New Assets Specific */
.checkbox-group {
  background: #f8fafc;
  padding: 15px;
  border-radius: 6px;
  border: 1px solid var(--border-color);
  margin: 20px 0;
}

.checkbox-group input[type="checkbox"] {
  margin-right: 10px;
}

.checkbox-group label {
  font-weight: 500;
  color: var(--dark);
  cursor: pointer;
}

.info-row {
  display: flex;
  gap: 40px;
  margin-top: 15px;
  flex-wrap: wrap;
}

.info-item {
  display: flex;
  flex-direction: column;
  min-width: 120px;
}

.info-label {
  font-size: 11px;
  color: var(--secondary);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 4px;
  font-weight: 600;
}

.info-value {
  font-size: 15px;
  font-weight: 600;
  color: var(--dark);
  padding: 5px 0;
  border-bottom: 2px dotted var(--border-color);
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
      <div class="sidebar-dropdown-item active" data-section="new-assets" onclick="window.location.href='{{ route('home') }}'">
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

      <div class="sidebar-dropdown-item" data-section="asset-replacement" onclick="window.location.href='{{ route('asset_replacement') }}'">
        <i class="bi bi-arrow-repeat"></i>
        <span>Asset Replacement</span>
      </div>
      <div class="sidebar-dropdown-item" data-section="asset-disposal" onclick="window.location.href='{{ route('asset_disposal') }}'">
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
       <div class="sidebar-dropdown-item" data-section="pre-asset-recognition" onclick="window.location.href='{{ route('pre_asset_recognition') }}'">
        <i class="bi bi-check-circle"></i>
        <span>Pre-Asset Recognition</span>
      </div>
      <div class="sidebar-dropdown-item" data-section="loan-asset" onclick="window.location.href='{{ route('loan_asset') }}'">
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

<!-- Main Content -->
<div class="main-content">
  <!-- Page Header -->
  <div class="page-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
      <div>
        <h1 class="page-title">New Assets</h1>
        <p class="page-subtitle">Create new asset records in the system</p>
      </div>
      <div class="current-user-section">
        <div class="user-label">Current User</div>
        <div class="user-value">barla</div>
      </div>
    </div>
  </div>

  <!-- Search Section -->
  <div class="search-section">
    <div class="section-title">
      <i class="bi bi-search"></i>
      Search from Pre-Asset
    </div>
    <div class="search-box">
      <input type="text" class="search-input" placeholder="Search by Asset ID, Serial No. or Description...">
      <button class="btn btn-primary" id="searchBtn">
        <i class="bi bi-search"></i>
        Search
      </button>
    </div>
    
    <div class="two-column-form">
      <div class="form-group">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" placeholder="Enter description">
      </div>
      <div class="form-group">
        <label class="form-label">Category</label>
        <select class="form-select">
          <option value="">Select Category</option>
          <option value="COMPUTER & PRINTER" selected>COMPUTER & PRINTER</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Sub Category</label>
        <select class="form-select">
          <option value="">Select Sub Category</option>
          <option value="Printer" selected>Printer</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Serial No.</label>
        <input type="text" class="form-control" placeholder="Enter serial number">
      </div>
      <div class="form-group">
        <label class="form-label">Site</label>
        <select class="form-select">
          <option value="">Select Site</option>
          <option value="TBD" selected>TBD</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Floor</label>
        <select class="form-select">
          <option value="">Select Floor</option>
          <option value="-" selected>-</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Asset Details Section -->
  <div class="transaction-container">
    <div class="section-title">
      <i class="bi bi-box-seam"></i>
      Asset Details
    </div>

    <table class="transaction-table">
      <tr>
        <td>Description</td>
        <td><input type="text" class="form-control readonly" value="HP Printer" readonly></td>
      </tr>
      <tr>
        <td>Category</td>
        <td><input type="text" class="form-control readonly" value="COMPUTER & PRINTER" readonly></td>
      </tr>
      <tr>
        <td>Sub Category</td>
        <td><input type="text" class="form-control readonly" value="Printer" readonly></td>
      </tr>
      <tr>
        <td>Serial No.</td>
        <td><input type="text" class="form-control" value="MP038984-54"></td>
      </tr>
      <tr>
        <td>Active Directory Group</td>
        <td><input type="text" class="form-control" value="FANS-Admin"></td>
      </tr>
    </table>

    <div class="section-title" style="margin-top: 40px;">
      <i class="bi bi-geo-alt"></i>
      Location Information
    </div>

    <div class="two-column-form">
      <div class="form-group">
        <label class="form-label">Site</label>
        <input type="text" class="form-control" value="TBD">
      </div>
      <div class="form-group">
        <label class="form-label">Floor</label>
        <input type="text" class="form-control" value="-">
      </div>
      <div class="form-group">
        <label class="form-label">Location</label>
        <input type="text" class="form-control" value="TBD">
      </div>
      <div class="form-group">
        <label class="form-label">Area/Workstation</label>
        <input type="text" class="form-control" value="B">
      </div>
      <div class="form-group">
        <label class="form-label">Employee ID</label>
        <input type="text" class="form-control" value="21342">
      </div>
      <div class="form-group">
        <label class="form-label">End User SID</label>
        <input type="text" class="form-control" value="ABC DEF">
      </div>
      <div class="form-group">
        <label class="form-label">Business Entity / Dept.</label>
        <input type="text" class="form-control" value="ADM">
      </div>
      <div class="form-group">
        <label class="form-label">Manufacturer</label>
        <input type="text" class="form-control" value="MP03">
      </div>
    </div>

    <div class="section-title" style="margin-top: 40px;">
      <i class="bi bi-file-earmark-text"></i>
      PEZA Information
    </div>

    <div class="two-column-form">
      <div class="form-group">
        <label class="form-label">PEZA Transaction Type</label>
        <select class="form-select">
          <option value="PEZA Farm-In" selected>PEZA Farm-In</option>
          <option value="PEZA Farm-Out">PEZA Farm-Out</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Farm-In Date</label>
        <input type="date" class="form-control">
      </div>
      <div class="form-group">
        <label class="form-label">8105 Form No.</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label class="form-label">Proforma Invoice</label>
        <input type="text" class="form-control">
      </div>
    </div>

    <!-- Asset ID Section -->
    <div class="status-section">
      <div class="asset-id-display">CPX00000000358</div>
      <div class="info-row">
        <div class="info-item">
          <span class="info-label">Ref ID</span>
          <span class="info-value">-</span>
        </div>
        <div class="info-item">
          <span class="info-label">Create Date</span>
          <span class="info-value">04/16/2020</span>
        </div>
        <div class="info-item">
          <span class="info-label">Create User</span>
          <span class="info-value">barla</span>
        </div>
      </div>
    </div>

    <div class="section-title" style="margin-top: 40px;">
      <i class="bi bi-cart"></i>
      Purchase Information
    </div>

    <div class="two-column-form">
      <div class="form-group">
        <label class="form-label">Delivery Date</label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="form-group">
        <label class="form-label">Delivery Receipt No.</label>
        <input type="text" class="form-control" value="345987">
      </div>
      <div class="form-group">
        <label class="form-label">Tag Date</label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="form-group">
        <label class="form-label">Sales Invoice No.</label>
        <input type="text" class="form-control" value="153432">
      </div>
      <div class="form-group">
        <label class="form-label">Purchase Order No.</label>
        <input type="text" class="form-control" value="43556">
      </div>
      <div class="form-group">
        <label class="form-label">Purchase Date</label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="form-group">
        <label class="form-label">Vendor Name</label>
        <input type="text" class="form-control" value="ABENSON">
      </div>
    </div>

    <div class="checkbox-group">
      <input type="checkbox" id="importedConstructive" checked>
      <label for="importedConstructive">Imported Constructive Imputation</label>
    </div>

    <div class="two-column-form">
      <div class="form-group">
        <label class="form-label">Permit No.</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label class="form-label">PBO No.</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label class="form-label">CEWE No.</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label class="form-label">Boat Note No.</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group" style="grid-column: span 2;">
        <label class="form-label">BOC Certificate of Identification</label>
        <input type="text" class="form-control">
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <button class="btn btn-primary" id="saveAssetBtn">
        <i class="bi bi-check-circle"></i>
        Save Asset
      </button>
      <button class="btn btn-success" id="saveNewBtn">
        <i class="bi bi-check-circle-fill"></i>
        Save & New
      </button>
      <button class="btn btn-outline" id="cancelBtn">
        <i class="bi bi-x-circle"></i>
        Cancel
      </button>
      <button class="btn btn-warning" id="printTagBtn">
        <i class="bi bi-printer"></i>
        Print Tag
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
  
  // Initialize with TRANSACTIONS menu open and New Assets active
  document.getElementById('transactionsToggle').click();
  document.getElementById('transactionsMenu').classList.add('open');
  document.querySelector('[data-section="new-assets"]').classList.add('active');
  document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
  
  // Search functionality
  const searchBtn = document.getElementById('searchBtn');
  const searchInput = document.querySelector('.search-input');
  
  if (searchBtn) {
    searchBtn.addEventListener('click', function() {
      const searchTerm = searchInput.value.trim();
      if (searchTerm === '') {
        alert('Please enter search criteria for assets.');
        searchInput.style.borderColor = '#ef4444';
        return;
      }
      
      searchInput.style.borderColor = '';
      showMessage(`Searching for: ${searchTerm}`, 'info');
      
      // Simulate search
      setTimeout(() => {
        showMessage('Asset found: HP Printer (CPX00000000358)', 'success');
      }, 1000);
    });
  }
  
  // Save Asset button
  const saveAssetBtn = document.getElementById('saveAssetBtn');
  if (saveAssetBtn) {
    saveAssetBtn.addEventListener('click', function() {
      // Check required fields
      const serialNo = document.querySelector('input[value="MP038984-54"]');
      const employeeId = document.querySelector('input[value="21342"]');
      
      if (!serialNo.value.trim() || !employeeId.value.trim()) {
        alert('Please fill in Serial No. and Employee ID before saving.');
        if (!serialNo.value.trim()) serialNo.style.borderColor = '#ef4444';
        if (!employeeId.value.trim()) employeeId.style.borderColor = '#ef4444';
        return;
      }
      
      if (confirm('Save this asset record?')) {
        showMessage('Asset record saved successfully!', 'success');
      }
    });
  }
  
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
  
  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    if (window.innerWidth <= 768) {
      if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
        sidebar.classList.remove('mobile-open');
      }
    }
  });
});
</script>
</body>
</html>