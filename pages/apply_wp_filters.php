<?php
$dir = __DIR__;
$files = glob($dir . '/dashbord_*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Inject the WP filters script right before </body> if it's not already there
    if (strpos($content, '<script src="wp_filters.js"></script>') === false) {
        // Also remove the old simple search bar filterTable script if it's there
        $content = preg_replace('/<script>\s*function filterTable\(\) \{.*?\<\/script>/is', '', $content);
        
        $content = str_replace('</body>', '<script src="wp_filters.js"></script>' . "\n</body>", $content);
        file_put_contents($file, $content);
        echo "Updated: " . basename($file) . "\n";
    } else {
        echo "Already updated: " . basename($file) . "\n";
    }
}
echo "All dashboards updated successfully!\n";
?>
