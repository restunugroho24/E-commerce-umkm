![alt text](https://drive.google.com/drive/folders/1LxFIJjq77xor4foZmeYl9vdwdohawfJC?raw=true)

# ecommerce_umkm - OOP Refactor

File penting:
- `core/Database.php` (singleton)
- `core/autoload.php` (autoload sederhana)
- `core/init.php` (inisialisasi)
- `core/models/*` (model)
- `core/services/*` (service/business logic)
- `core/controllers/*` (controller untuk halaman)

Cara pakai singkat:
1. Pastikan backup/commit sebelum perubahan.
2. Jalankan pemeriksaan sintaks PHP di mesin Anda dengan:

```powershell
& 'C:/xampp/php/php.exe' -l "c:/xampp/htdocs/ecommerce_umkm/cart_edit.php"
```

3. Buka `cart_edit.php` lewat browser: `http://localhost/ecommerce_umkm/cart_edit.php?order_id=ORD-xxx`

4. Jika mau refactor halaman lain, beri tahu nama file.
