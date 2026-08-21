<?php
$files = glob("c:/xampp/htdocs/public_html/pages/dashbord_*.php");

$jsCode = <<<EOT

<script>
function filterTable() {
    let input = document.getElementById("searchInput");
    if(!input) return;
    let filter = input.value.toLowerCase();
    let tables = document.querySelectorAll("table");
    
    tables.forEach(table => {
        let tr = table.getElementsByTagName("tr");
        for (let i = 1; i < tr.length; i++) {
            let rowText = tr[i].textContent.toLowerCase();
            if (rowText.indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    });
}
</script>
EOT;

foreach($files as $file) {
    $content = file_get_contents($file);
    
    // Check if already updated
    if (strpos($content, 'id="searchInput"') === false) {
        // Inject search input
        $content = preg_replace(
            '/<div class="card-header pb-0">\s*<h6>/is',
            '<div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>',
            $content
        );
        $content = preg_replace(
            '/(<div class="card-header pb-0 d-flex justify-content-between align-items-center">\s*<h6>.*?<\/h6>)/is',
            '$1
              <div class="input-group" style="max-width: 300px;">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                  <input type="text" class="form-control" id="searchInput" placeholder="Rechercher..." onkeyup="filterTable()">
              </div>',
            $content
        );

        // Inject JS before </body>
        $content = str_replace('</body>', $jsCode . "\n</body>", $content);
        
        file_put_contents($file, $content);
        echo "Updated " . basename($file) . "\n";
    }
}
?>
