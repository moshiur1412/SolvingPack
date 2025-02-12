<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Explorer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Top Bar */
        .topbar {
            width: 100%;
            text-align: center;
            padding: 12px;
            background: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        /* Main Layout */
        .main-container {
            display: flex;
            flex-grow: 1;
            margin-top: 50px;
        }

        /* Sidebar */
        .sidebar {
            width: 350px;
            background: #fff;
            padding: 15px;
            border-right: 2px solid #ddd;
            overflow-y: auto;
            height: calc(100vh - 50px);
        }

        /* Folder Tree */
        .folder-tree {
            list-style: none;
            padding: 0;
        }

        .folder-tree li {
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 5px;
            transition: 0.3s;
            align-items: center;
            white-space: nowrap;
        }

        .folder-tree li:hover {
            background: #f0f0f0;
        }

        .folder-tree .active {
            background: #007bff;
            color: white;
        }

        .folder-tree .icon {
            margin-right: 8px;
        }

        .sub-folder {
            margin-left: 20px;
            display: none;
            list-style-type: none;
            padding-left: 10px;
        }

        /* File Viewer */
        .file-viewer {
            flex-grow: 1;
            padding: 20px;
            background: #fff;
            overflow-y: auto;
            height: calc(100vh - 50px);
        }

        .file-content {
            white-space: pre-wrap;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            font-family: monospace;
        }
    </style>
</head>

<body>

    <div class="topbar">
        ⋆ أَعُوذُ بِاللَّهِ مِنَ الشَّيْطَانِ الرَّجِيمِ - بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ
    </div>

    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>📂 Solving Pack</h2>
            <ul class="folder-tree">
                <?php
                function listFiles($dir, $basePath = "", $level = 0)
                {
                    $files = scandir($dir);
                    foreach ($files as $file) {
                        if ($file !== "." && $file !== ".." && $file !== "index.php") {
                            $filePath = $dir . DIRECTORY_SEPARATOR . $file;
                            $relativePath = $basePath . $file;

                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $icons = [
                                "php" => "🐘",
                                "html" => "🌐",
                                "css" => "🎨",
                                "js" => "📜",
                                "txt" => "📄",
                                "pdf" => "📕",
                                "jpg" => "🖼️",
                                "png" => "🖼️",
                                "zip" => "📦",
                                "mp4" => "🎬",
                                "mp3" => "🎵"
                            ];
                            $icon = isset($icons[$ext]) ? $icons[$ext] : "📄";

                            $indentation = str_repeat("&nbsp;&nbsp;&nbsp;", $level);

                            if (is_dir($filePath)) {
                                echo "<li onclick='toggleFolder(this)'><span class='icon'>├── 📁</span> $file
                                    <ul class='sub-folder'>";
                                listFiles($filePath, $relativePath . "/", $level + 1);
                                echo "</ul></li>";
                            } else {
                                echo "<li onclick='loadFile(\"$relativePath\", \"$file\")'><span class='icon'>├── $icon</span> $file</li>";
                            }
                        }
                    }
                }

                listFiles(__DIR__);
                ?>
            </ul>
        </div>

        <!-- File Viewer -->
        <div class="file-viewer">
            <h2>📄 File Preview - <span id="file-name">Select a file to view...</span> </h2>
            <div id="file-content" class="file-content">Select a file to view...</div>
        </div>
    </div>

    <script>
   // Toggle the visibility of the subfolder
function toggleFolder(element) {
    let subFolder = element.querySelector('.sub-folder');
    subFolder.style.display = (subFolder.style.display === "block") ? "none" : "block";
}

// When a file is clicked, load its content and ensure parent folder is visible
function loadFile(filePath, fileName) {
    // Remove active class from all files
    document.querySelectorAll(".folder-tree li").forEach(li => li.classList.remove("active"));
    event.currentTarget.classList.add("active");

    // Update the file name in the viewer
    document.getElementById('file-name').textContent = fileName;

    // Ensure the parent folder of the clicked file is expanded
    let parentFolder = event.currentTarget.closest('ul.sub-folder');
    while (parentFolder) {
        let parentLi = parentFolder.closest('li');
        if (parentLi && parentLi.querySelector('.sub-folder')) {
            parentLi.querySelector('.sub-folder').style.display = "block"; // Show subfolder
        }
        parentFolder = parentLi.closest('ul.sub-folder'); // Move up the folder tree
    }

    // Fetch the file and display its content
    fetch(filePath)
        .then(response => {
            if (!response.ok) {
                throw new Error('File cannot be displayed');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('file-content').textContent = data;
        })
        .catch(error => {
            document.getElementById('file-content').textContent = "Unable to load file.";
        });
}

</script>


</body>

</html>
