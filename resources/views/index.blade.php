<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Asset Management System</title>

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
  --card-bg: #ffffff;
  --border-color: #e2e8f0;
  --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

body {
  background-color: #f1f5f9;
  font-family: 'Segoe UI', system-ui, sans-serif;
  color: #334155;
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

/* Enhanced Main Content Styles */
.page-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 12px;
  padding: 25px;
  margin-bottom: 25px;
  box-shadow: var(--card-shadow);
  color: white;
  position: relative;
  overflow: hidden;
}

.page-header::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
}

.page-title {
  font-weight: 700;
  font-size: 28px;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 15px;
  position: relative;
  z-index: 1;
}

.page-title i {
  font-size: 32px;
  color: white;
  background: rgba(255, 255, 255, 0.2);
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.page-subtitle {
  color: rgba(255, 255, 255, 0.9);
  font-size: 16px;
  margin-top: 8px;
  position: relative;
  z-index: 1;
  font-weight: 400;
}

.current-user-badge {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  padding: 10px 20px;
  border-radius: 50px;
  font-size: 14px;
  font-weight: 500;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  position: relative;
  z-index: 1;
  display: flex;
  align-items: center;
  gap: 10px;
}

/* Form Container */
.form-container {
  background: white;
  border-radius: 15px;
  padding: 30px;
  margin-bottom: 25px;
  box-shadow: var(--card-shadow);
  border: 1px solid rgba(226, 232, 240, 0.8);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.form-container:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.section-divider {
  border-top: 2px solid var(--border-color);
  margin: 35px 0;
  position: relative;
}

.section-divider::before {
  content: attr(data-label);
  position: absolute;
  top: -12px;
  left: 20px;
  background: white;
  padding: 5px 20px;
  color: var(--primary);
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border: 2px solid var(--primary);
  border-radius: 20px;
}

/* Form Styles */
.form-label {
  font-weight: 600;
  color: var(--dark);
  margin-bottom: 10px;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.form-label i {
  color: var(--primary);
  font-size: 16px;
}

.form-control, .form-select {
  border: 2px solid var(--border-color);
  border-radius: 8px;
  padding: 12px 15px;
  font-size: 14px;
  transition: all 0.3s;
  background: white;
}

.form-control:focus, .form-select:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
  background: white;
}

.form-control-sm {
  padding: 8px 12px;
  font-size: 13px;
}

.readonly-field {
  background: linear-gradient(135deg, #f6f9fc 0%, #f1f5f9 100%);
  color: #64748b;
  border-color: #e2e8f0;
  font-weight: 500;
}

/* Button Styles */
.btn-primary {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
  border: none;
  padding: 12px 25px;
  font-weight: 600;
  transition: all 0.3s;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(37, 99, 235, 0.3);
  background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
}

.btn-outline-secondary {
  border: 2px solid var(--border-color);
  color: var(--secondary);
  padding: 12px 25px;
  font-weight: 600;
  border-radius: 8px;
  transition: all 0.3s;
  background: white;
}

.btn-outline-secondary:hover {
  background: var(--light);
  border-color: var(--secondary);
  transform: translateY(-2px);
  box-shadow: 0 4px 6px rgba(100, 116, 139, 0.1);
}

.btn-icon {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
}

/* Asset ID Section */
.asset-id-section {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  border-radius: 12px;
  padding: 20px;
  border: 2px dashed var(--border-color);
  margin: 20px 0;
}

.asset-id-label {
  font-size: 12px;
  color: var(--secondary);
  margin-bottom: 5px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
}

.asset-id-value {
  font-size: 24px;
  font-weight: 700;
  color: var(--primary);
  letter-spacing: 1px;
  font-family: 'Courier New', monospace;
  background: white;
  padding: 10px 15px;
  border-radius: 8px;
  display: inline-block;
  border: 2px solid var(--primary-light);
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

/* Form Controls */
.search-container {
  position: relative;
}

.search-icon {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--secondary);
  z-index: 10;
  font-size: 18px;
}

.search-input {
  padding-left: 50px;
  background: white;
  border-radius: 8px;
  border: 2px solid var(--border-color);
  height: 50px;
}

.search-input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
}

/* Action Buttons */
.action-buttons {
  display: flex;
  gap: 15px;
  margin-top: 40px;
  padding-top: 25px;
  border-top: 2px solid var(--border-color);
  justify-content: center;
}

/* Status Indicators */
.status-indicator {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 15px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.status-active {
  background: rgba(16, 185, 129, 0.1);
  color: var(--success);
  border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-pending {
  background: rgba(245, 158, 11, 0.1);
  color: var(--warning);
  border: 1px solid rgba(245, 158, 11, 0.2);
}

/* Card Enhancements */
.card-hover {
  transition: all 0.3s ease;
}

.card-hover:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Responsive adjustments */
@media (max-width: 992px) {
  .col-md-6, .col-md-3, .col-md-12 {
    margin-bottom: 20px;
  }
  
  .info-row {
    gap: 20px;
  }
  
  .action-buttons {
    flex-direction: column;
  }
}

@media (max-width: 768px) {
  .main-content {
    padding: 15px;
  }
  
  .form-container {
    padding: 20px;
  }
  
  .page-header {
    padding: 20px;
  }
  
  .page-title {
    font-size: 24px;
  }
  
  .page-title i {
    width: 50px;
    height: 50px;
    font-size: 26px;
  }
  
  .info-row {
    flex-direction: column;
    gap: 15px;
  }
  
  .asset-id-value {
    font-size: 20px;
  }
}

/* Animation for form sections */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.form-section {
  animation: fadeInUp 0.5s ease-out;
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f5f9;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}

/* Required field indicator */
.required-field::after {
  content: " *";
  color: var(--danger);
  font-weight: bold;
}

/* Success message */
.success-message {
  background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
  border: 1px solid rgba(16, 185, 129, 0.2);
  color: var(--success);
  padding: 15px;
  border-radius: 8px;
  margin: 15px 0;
  display: flex;
  align-items: center;
  gap: 10px;
}
</style>
</head>

<body>
<!-- Mobile menu toggle button -->
<button class="mobile-menu-toggle" id="mobileMenuToggle">
  <i class="bi bi-list"></i>
</button>

<!-- Sidebar (Unchanged) -->
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

      <div class="sidebar-dropdown-item " data-section="open-records" onclick="window.location.href='{{ route('or') }}'">
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

   
      <div class="sidebar-dropdown-item" data-section="asset-replacement">
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

<!-- Main Content -->
<div class="main-content">
  <!-- Page Header -->
  <div class="page-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
      <div>
        <h1 class="page-title">
          <i class="bi bi-plus-circle"></i>
          New Assets
        </h1>
        <p class="page-subtitle">Create new asset records in the system</p>
        <div class="mt-3">
          <span class="status-indicator status-active">
            <i class="bi bi-circle-fill"></i>
            Active Session
          </span>
        </div>
      </div>
      <div class="current-user-badge">
        <i class="bi bi-person-circle"></i>
        <div>
          <div style="font-size: 12px; opacity: 0.9;">Current User</div>
          <div style="font-weight: 600;">barla</div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Search Section -->
  <div class="form-container mb-4 card-hover">
    <div class="d-flex align-items-center mb-3">
      <div class="rounded-circle bg-light p-2 me-3">
        <i class="bi bi-search fs-5 text-primary"></i>
      </div>
      <h6 class="mb-0 fw-bold">Search from Pre-Asset</h6>
    </div>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label required-field">
          <i class="bi bi-card-text"></i>
          Description
        </label>
        <div class="search-container">
          <i class="bi bi-search search-icon"></i>
          <input type="text" class="form-control search-input" placeholder="Enter description...">
        </div>
      </div>
      <div class="col-md-3">
        <label class="form-label required-field">
          <i class="bi bi-tags"></i>
          Category
        </label>
        <select class="form-select">
          <option value="">Select Category</option>
          <option value="COMPUTER">COMPUTER</option>
          <option value="PRINTER">PRINTER</option>
          <option value="FURNITURE">FURNITURE</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-tag"></i>
          Sub Category
        </label>
        <select class="form-select">
          <option value="">Select Sub Category</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label required-field">
          <i class="bi bi-upc-scan"></i>
          Serial No.
        </label>
        <input type="text" class="form-control" placeholder="Enter serial number...">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-building"></i>
          Site
        </label>
        <select class="form-select">
          <option value="">Select Site</option>
          <option value="TBD" selected>TBD</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-layers"></i>
          Floor
        </label>
        <select class="form-select">
          <option value="">Select Floor</option>
          <option value="1st" selected>1st</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Asset Details Form -->
  <div class="form-container card-hover form-section">
    <!-- Asset Information Section -->
    <div class="row g-3 mb-4">
      <div class="col-md-12">
        <label class="form-label">
          <i class="bi bi-card-text"></i>
          Description
        </label>
        <input type="text" class="form-control" value="HP Printer" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-tags"></i>
          Category
        </label>
        <input type="text" class="form-control readonly-field" value="COMPUTER & PRINTER" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-tag"></i>
          Sub Category
        </label>
        <input type="text" class="form-control readonly-field" value="Printer" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label required-field">
          <i class="bi bi-upc-scan"></i>
          Serial No.
        </label>
        <input type="text" class="form-control" value="MP038984-54">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-people"></i>
          Active Directory Group
        </label>
        <input type="text" class="form-control" value="FANS-Admin">
      </div>
    </div>

    <div class="section-divider" data-label="Location Information"></div>

    <!-- Location Information -->
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-building"></i>
          Site
        </label>
        <input type="text" class="form-control" value="TBD">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-layers"></i>
          Floor
        </label>
        <input type="text" class="form-control" value="1st">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-geo-alt"></i>
          Location
        </label>
        <input type="text" class="form-control" value="TBD">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-pc-display"></i>
          Area/Workstation
        </label>
        <input type="text" class="form-control" value="Area B">
      </div>
      <div class="col-md-6">
        <label class="form-label required-field">
          <i class="bi bi-person-badge"></i>
          Employee ID
        </label>
        <input type="text" class="form-control" value="21342">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-person"></i>
          End User SID
        </label>
        <input type="text" class="form-control" value="ABC DEF">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-building"></i>
          Business Entity / Dept.
        </label>
        <input type="text" class="form-control" value="ADM">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-building"></i>
          Manufacturer
        </label>
        <input type="text" class="form-control" value="MP03">
      </div>
    </div>

    <div class="section-divider" data-label="PEZA Information"></div>

    <!-- PEZA Information -->
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-file-earmark-text"></i>
          PEZA Transaction Type
        </label>
        <select class="form-select">
          <option value="PEZA Farm-In" selected>PEZA Farm-In</option>
          <option value="PEZA Farm-Out">PEZA Farm-Out</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-calendar"></i>
          Farm-In Date
        </label>
        <input type="date" class="form-control">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-file-text"></i>
          8105 Form No.
        </label>
        <input type="text" class="form-control">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-receipt"></i>
          Proforma Invoice
        </label>
        <input type="text" class="form-control">
      </div>
    </div>

    <!-- Asset ID Section -->
    <div class="asset-id-section mb-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
          <div class="asset-id-label">ASSET ID</div>
          <div class="asset-id-value">CPX00000000358</div>
        </div>
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
    </div>

    <div class="section-divider" data-label="Purchase Information"></div>

    <!-- Purchase Information -->
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-truck"></i>
          Delivery Date
        </label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-receipt"></i>
          Delivery Receipt No.
        </label>
        <input type="text" class="form-control" value="345987">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-tag"></i>
          Tag Date
        </label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-file-earmark"></i>
          Sales Invoice No.
        </label>
        <input type="text" class="form-control" value="153432">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-cart"></i>
          Purchase Order No.
        </label>
        <input type="text" class="form-control" value="43556">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-calendar-check"></i>
          Purchase Date
        </label>
        <input type="date" class="form-control" value="2020-04-16">
      </div>
      <div class="col-md-6">
        <label class="form-label">
          <i class="bi bi-shop"></i>
          Vendor Name
        </label>
        <input type="text" class="form-control" value="ABENSON">
      </div>
      <div class="col-md-12">
        <div class="form-check p-3 bg-light rounded">
          <input class="form-check-input" type="checkbox" id="importedConstructive" checked style="width: 20px; height: 20px;">
          <label class="form-check-label fw-medium" for="importedConstructive">
            <i class="bi bi-box-arrow-in-right me-2"></i>
            Imported Constructive Imputation
          </label>
        </div>
      </div>
    </div>

    <!-- Additional Information -->
    <div class="row g-3 mt-4">
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-file-earmark-medical"></i>
          Permit No.
        </label>
        <input type="text" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-file-earmark"></i>
          PBO No.
        </label>
        <input type="text" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-file-earmark"></i>
          CEWE No.
        </label>
        <input type="text" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">
          <i class="bi bi-file-earmark"></i>
          Boat Note No.
        </label>
        <input type="text" class="form-control">
      </div>
      <div class="col-md-12">
        <label class="form-label">
          <i class="bi bi-file-earmark-certificate"></i>
          BOC Certificate of Identification
        </label>
        <input type="text" class="form-control">
      </div>
    </div>

    <!-- Success Message Example -->
    <div class="success-message mt-4" style="display: none;">
      <i class="bi bi-check-circle-fill fs-5"></i>
      <div>
        <strong>Success!</strong> Asset record has been saved successfully.
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <button type="button" class="btn btn-primary btn-icon">
        <i class="bi bi-check-circle"></i>
        Save Asset
      </button>
      <button type="button" class="btn btn-outline-secondary btn-icon">
        <i class="bi bi-check-circle-fill"></i>
        Save & New
      </button>
      <button type="button" class="btn btn-outline-secondary btn-icon">
        <i class="bi bi-x-circle"></i>
        Cancel
      </button>
      <button type="button" class="btn btn-outline-secondary btn-icon">
        <i class="bi bi-printer"></i>
        Print Tag
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
  
  // Set today's date for date fields if empty
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('input[type="date"]').forEach(dateInput => {
    if (!dateInput.value) {
      dateInput.value = today;
    }
  });
  
  // Initialize with TRANSACTIONS menu open and New Assets active
  document.getElementById('transactionsToggle').click();
  document.getElementById('transactionsMenu').classList.add('open');
  document.querySelector('[data-section="new-assets"]').classList.add('active');
  document.querySelector('#transactionsToggle .toggle-icon').classList.add('open');
  
  // Save button functionality
  const saveBtn = document.querySelector('.btn-primary');
  const saveNewBtn = document.querySelector('.btn-outline-secondary:nth-child(2)');
  const successMessage = document.querySelector('.success-message');
  
  if (saveBtn) {
    saveBtn.addEventListener('click', function() {
      // Show success message
      successMessage.style.display = 'flex';
      
      // Hide message after 5 seconds
      setTimeout(() => {
        successMessage.style.display = 'none';
      }, 5000);
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
});
</script>
</body>
</html>