<?php
/**
 * DailyDo Deployment Helper
 * Run this script after uploading to check if everything is working correctly
 */

echo "<h1>DailyDo Deployment Check</h1>";
echo "<style>body{font-family:Arial,sans-serif;margin:40px;} .success{color:green;} .error{color:red;} .warning{color:orange;}</style>";

// Check PHP version
echo "<h2>System Requirements</h2>";
if (version_compare(PHP_VERSION, '7.4.0') >= 0) {
    echo "<p class='success'>✓ PHP Version: " . PHP_VERSION . " (Compatible)</p>";
} else {
    echo "<p class='error'>✗ PHP Version: " . PHP_VERSION . " (Requires PHP 7.4+)</p>";
}

// Check required extensions
$required_extensions = ['pdo', 'pdo_mysql', 'json', 'session'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<p class='success'>✓ Extension '$ext' is loaded</p>";
    } else {
        echo "<p class='error'>✗ Extension '$ext' is missing</p>";
    }
}

// Check file permissions
echo "<h2>File Permissions</h2>";
$writable_dirs = ['assets/images'];
foreach ($writable_dirs as $dir) {
    if (is_writable($dir)) {
        echo "<p class='success'>✓ Directory '$dir' is writable</p>";
    } else {
        echo "<p class='warning'>⚠ Directory '$dir' may not be writable</p>";
    }
}

// Test database connection
echo "<h2>Database Connection</h2>";
try {
    require_once 'config/database.php';
    echo "<p class='success'>✓ Database connection successful</p>";
    
    // Check if tables exist
    $tables = ['users', 'tasks'];
    foreach ($tables as $table) {
        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($stmt->rowCount() > 0) {
            echo "<p class='success'>✓ Table '$table' exists</p>";
        } else {
            echo "<p class='error'>✗ Table '$table' is missing</p>";
        }
    }
    
} catch (Exception $e) {
    echo "<p class='error'>✗ Database connection failed: " . $e->getMessage() . "</p>";
    echo "<p>Please check your database configuration in config/database.php</p>";
}

// Check .htaccess
echo "<h2>Configuration Files</h2>";
if (file_exists('.htaccess')) {
    echo "<p class='success'>✓ .htaccess file exists</p>";
} else {
    echo "<p class='warning'>⚠ .htaccess file is missing</p>";
}

echo "<h2>Next Steps</h2>";
echo "<p>If all checks pass, your DailyDo application should be working correctly!</p>";
echo "<p><a href='index.php'>Go to DailyDo Application →</a></p>";

// Security note
echo "<h2>Security Notice</h2>";
echo "<p class='warning'>⚠ Remember to delete this deploy.php file after deployment for security!</p>";
?>