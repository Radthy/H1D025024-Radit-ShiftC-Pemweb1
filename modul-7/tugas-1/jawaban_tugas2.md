# Jawaban Tugas No. 2

## a. Fungsi ID pada SESSION
Setiap pengunjung yang memulai session diberi sebuah ID unik yang disebut session ID
(`session_id()`, biasanya tersimpan di cookie bernama `PHPSESSID`). ID ini berfungsi sebagai
penanda identitas pengunjung: browser mengirim ID itu di setiap request, lalu server
mencocokkannya dengan data session yang tersimpan di server. Dengan begitu server tahu data
`$_SESSION` mana yang milik pengunjung tersebut, walaupun HTTP sifatnya stateless.

## b. Perbedaan Cookie dan Session
| | Cookie | Session |
|---|---|---|
| Lokasi penyimpanan | Di browser (sisi klien) | Di server (klien hanya menyimpan session ID) |
| Keamanan | Kurang aman, isinya bisa dilihat/diubah pengguna | Lebih aman karena data ada di server |
| Masa hidup | Bisa diatur lama (hari/bulan) lewat expire | Berakhir saat browser ditutup / logout / timeout |
| Kapasitas | Terbatas (sekitar 4 KB per cookie) | Lebih besar, mengikuti memori/penyimpanan server |
| Akses di PHP | `$_COOKIE` | `$_SESSION` |

## c. Hal yang membuat session kedaluwarsa (expired)
1. Browser ditutup (cookie session hilang sehingga dianggap koneksi baru).
2. Memanggil `session_destroy()` / `session_unset()` (misalnya saat logout).
3. Tidak ada aktivitas melebihi batas waktu server (`session.gc_maxlifetime`, default 1440 detik).
4. Cookie session ID dihapus atau kedaluwarsa di browser.
5. Server membersihkan file session lama (garbage collection) atau di-restart.
6. Timeout buatan sendiri di kode, misalnya membandingkan `time()` dengan waktu login.
