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













    /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: #f8f9fa;
        }

        /* Open Records Specific Styles */
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

        .current-user {
            background: var(--primary-light);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .search-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-filters {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-badge {
            background: var(--light);
            border: 1px solid var(--border-color);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-badge i {
            font-size: 10px;
        }

        .form-control-sm {
            height: 36px;
            font-size: 14px;
        }

        .form-label-sm {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--secondary);
        }

        /* Asset Details Card */
        .asset-details-container {
            background: white;
            border-radius: 10px;
            padding: 0;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .asset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
        }

        .asset-id {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .asset-subtitle {
            font-size: 14px;
            opacity: 0.9;
            display: flex;
            gap: 20px;
        }

        .asset-content {
            padding: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
            align-items: center;
        }

        .info-label {
            width: 180px;
            font-size: 13px;
            color: var(--secondary);
            font-weight: 500;
        }

        .info-value {
            flex: 1;
            font-size: 14px;
            color: var(--dark);
            font-weight: 500;
        }

        .info-value.editable {
            background: var(--light);
            border: 1px solid var(--border-color);
            padding: 6px 10px;
            border-radius: 5px;
            min-height: 36px;
        }

        .info-value.readonly {
            color: #94a3b8;
            font-style: italic;
        }

        /* Tabs Navigation */
        .detail-tabs {
            display: flex;
            background: var(--light);
            border-radius: 8px;
            padding: 5px;
            margin-bottom: 20px;
        }

        .tab-item {
            padding: 10px 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: var(--secondary);
            border-radius: 5px;
            transition: all 0.3s;
            text-align: center;
            flex: 1;
        }

        .tab-item:hover {
            background: white;
            color: var(--primary);
        }

        .tab-item.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            padding: 20px;
            background: var(--light);
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
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-light);
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

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
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

        /* Status Badges */
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-inactive {
            background: #fef3c7;
            color: #92400e;
        }

        .status-storage {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Asset ID Section */
        .asset-id-section {
            background: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .asset-id-display {
            font-family: monospace;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
            margin: 10px 0;
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
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .info-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .action-buttons {
                flex-wrap: wrap;
            }
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

                <div class="sidebar-dropdown-item active" data-section="open-records" onclick="window.location.href='{{ route('or') }}'">
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

<!-- Main Content -->
<!-- Main Content - Open Records Interface -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h1 class="page-title">
                        <i class="bi bi-folder2-open"></i>
                        Open Records
                    </h1>
                    <p class="page-subtitle">View and manage existing asset records</p>
                </div>
                <div class="current-user">
                    <i class="bi bi-person-circle"></i>
                    Current User: bwls
                </div>
            </div>
        </div>

        <!-- Search Container -->
        <div class="search-container">
            <div class="search-header">
                <h3 class="search-title">
                    <i class="bi bi-search"></i>
                    Search Assets
                </h3>
                <div class="search-filters">
                    <span class="filter-badge">
                        <i class="bi bi-funnel"></i>
                        Filters
                    </span>
                    <span class="filter-badge">
                        12 Results
                    </span>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label-sm">ASSET ID</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Asset ID...">
                </div>
                <div class="col-md-6">
                    <label class="form-label-sm">Description</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter description...">
                </div>
                <div class="col-md-3">
                    <label class="form-label-sm">Category</label>
                    <select class="form-select form-select-sm">
                        <option value="">All Categories</option>
                        <option value="COMPUTER">COMPUTER</option>
                        <option value="PRINTER">PRINTER</option>
                        <option value="FURNITURE">FURNITURE</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label-sm">Sub Category</label>
                    <select class="form-select form-select-sm">
                        <option value="">All Sub Categories</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label-sm">Business Entity</label>
                    <select class="form-select form-select-sm">
                        <option value="">All Entities</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label-sm">Status</label>
                    <select class="form-select form-select-sm">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="storage">In Storage</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label-sm">Serial No.</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter serial number...">
                </div>
                <div class="col-md-6">
                    <label class="form-label-sm">End User Name</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter end user name...">
                </div>
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                    <button class="btn btn-outline">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- Asset Details Container -->
        <div class="asset-details-container">
            <!-- Asset Header -->
            <div class="asset-header">
                <div class="asset-id">CPXXXXXXXXX000360</div>
                <div class="asset-subtitle">
                    <span>AMR ID: <strong>CP800228</strong></span>
                    <span>Last Modified: <strong>06/16/2020</strong></span>
                    <span>Status: <span class="status-badge status-storage">In Storage</span></span>
                </div>
            </div>

            <!-- Detail Tabs -->
            <div class="detail-tabs">
                <div class="tab-item active" data-tab="general">
                    <i class="bi bi-card-text"></i>
                    GENERAL
                </div>
                <div class="tab-item" data-tab="financial">
                    <i class="bi bi-cash-coin"></i>
                    FINANCIAL
                </div>
                <div class="tab-item" data-tab="peza">
                    <i class="bi bi-building"></i>
                    PEZA
                </div>
                <div class="tab-item" data-tab="maintenance">
                    <i class="bi bi-tools"></i>
                    MAINTENANCE AGREEMENT
                </div>
                <div class="tab-item" data-tab="contract">
                    <i class="bi bi-file-text"></i>
                    CONTRACT
                </div>
                <div class="tab-item" data-tab="archive">
                    <i class="bi bi-archive"></i>
                    ARCHIVE HISTORY
                </div>
            </div>

            <!-- Asset Content -->
            <div class="asset-content">
                <!-- General Tab Content -->
                <div id="general-tab" class="tab-content">
                    <div class="info-grid">
                        <!-- Left Column -->
                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="bi bi-info-circle"></i>
                                Asset Information
                            </h4>
                            
                            <div class="info-row">
                                <div class="info-label">Description:</div>
                                <div class="info-value editable">HP LaserJet Pro Printer</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Category:</div>
                                <div class="info-value editable">COMPUTER & PRINTER</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Sub Category:</div>
                                <div class="info-value editable">Printer</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Serial No.:</div>
                                <div class="info-value editable">MP038984-54</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Model:</div>
                                <div class="info-value editable">LaserJet Pro M404dn</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Manufacturer:</div>
                                <div class="info-value editable">HP Inc.</div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="bi bi-geo-alt"></i>
                                Location Information
                            </h4>
                            
                            <div class="info-row">
                                <div class="info-label">Business Entity:</div>
                                <div class="info-value editable">ADM</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Building:</div>
                                <div class="info-value editable">Main Office</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Floor:</div>
                                <div class="info-value editable">3rd</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Location:</div>
                                <div class="info-value editable">Accounting Department</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Area / Workstation:</div>
                                <div class="info-value editable">WS-305</div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="info-grid">
                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="bi bi-person"></i>
                                User Information
                            </h4>
                            
                            <div class="info-row">
                                <div class="info-label">End User Name:</div>
                                <div class="info-value editable">John Smith</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">End User SID:</div>
                                <div class="info-value editable">JS-EMP-2020</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Vendor Name:</div>
                                <div class="info-value editable">ABENSON</div>
                            </div>
                        </div>

                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="bi bi-calendar"></i>
                                Audit Information
                            </h4>
                            
                            <div class="info-row">
                                <div class="info-label">Create Date:</div>
                                <div class="info-value readonly">04/16/2020</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Create User:</div>
                                <div class="info-value readonly">bwls</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Last Modified Date:</div>
                                <div class="info-value readonly">06/16/2020</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Last Modified User:</div>
                                <div class="info-value readonly">admin</div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">Check-In Due Date:</div>
                                <div class="info-value editable">07/16/2020</div>
                            </div>
                        </div>
                    </div>

                    <!-- Asset ID Section -->
                    <div class="asset-id-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-label">ASSET ID:</div>
                                <div class="asset-id-display">CPXXXXXXXXX000360</div>
                                <div class="info-row">
                                    <div class="info-label">AMR ID:</div>
                                    <div class="info-value">CP800228</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-row">
                                    <div class="info-label">Asset Reference:</div>
                                    <div class="info-value">DRI Reference: - /10</div>
                                </div>
                                <div class="info-row">
                                    <div class="info-label">Last Modified Date:</div>
                                    <div class="info-value">06/16/2020</div>
                                </div>
                                <div class="info-row">
                                    <div class="info-label">Create Date:</div>
                                    <div class="info-value">04/16/2020</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Save Changes
                </button>
                <button class="btn btn-success">
                    <i class="bi bi-shuffle"></i>
                    Transfer
                </button>
                <button class="btn btn-warning" style="background: #f59e0b; color: white;">
                    <i class="bi bi-arrow-repeat"></i>
                    Replace
                </button>
                <button class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                    Dispose
                </button>
                <button class="btn btn-outline">
                    <i class="bi bi-arrow-left-right"></i>
                    Loan
                </button>
                <button class="btn btn-outline">
                    <i class="bi bi-pencil"></i>
                    Edit
                </button>
                <div style="margin-left: auto;">
                    <button class="btn btn-outline">
                        <i class="bi bi-house"></i>
                        Home
                    </button>
                    <button class="btn btn-outline">
                        <i class="bi bi-box-arrow-right"></i>
                        Log Off
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