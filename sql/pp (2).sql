-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2026 at 01:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pp`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(50) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `judul`, `tgl_lahir`, `hobi`, `deskripsi`, `foto`) VALUES
(1, 'Passsionate Web Developer & Student', '29 Februari 2008', 'listening to music & baking', 'Halo, saya Celsi. Selamat datang di portfolio saya.', 'profile_1769047080.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `tanggal`, `penulis`, `isi`, `gambar`) VALUES
(1, 'Eksplorasi Teknologi Informasi: Kunjungan Industri SMK Muhammadiyah 2 Bantul ke Diskominfo Kota Semarang', '2024-01-11', 'celsifbina', '<p><strong>SEMARANG</strong>-Dalam upaya menyelaraskan kurikulum pendidikan dengan realitas dunia kerja, SMK Muhammadiyah 2 Bantul sukses menyelenggarakan program Kunjungan Industri ke Dinas Komunikasi, Informatika, Statistik, dan Persandian (Diskominfo) Kota Semarang pada Kamis, 11 Januari 2024.</p><p><strong>Menjembatani Teori dan Realitas Industri</strong></p><p>Kunjungan yang berlokasi di Jl. Pemuda No. 148, Semarang ini, dirancang untuk memberikan pengalaman langsung kepada siswa mengenai operasional teknologi informasi di instansi pemerintahan. Latar belakang kegiatan ini adalah pentingnya wawasan praktis bagi siswa agar memahami hubungan antara materi di sekolah dengan implementasi nyata di industri teknologi.</p><p>Tujuan utama dari kunjungan ini meliputi:</p><ul><li><strong>Integrasi Pengetahuan:</strong> Menggabungkan teori yang dipelajari di kelas dengan pengalaman lapangan.</li><li><strong>Eksplorasi Karir:</strong> Membuka wawasan siswa mengenai peluang profesi di bidang IT.</li><li><strong>Networking:</strong> Memperluas jaringan profesional dengan berinteraksi langsung bersama para praktisi.</li></ul><p>&nbsp;</p><p><strong>Manfaat Dua Arah</strong></p><p>Kegiatan ini membawa dampak positif bagi kedua belah pihak. Bagi <strong>siswa</strong>, kunjungan ini mengasah keterampilan observasi, pemahaman etika kerja, serta penerapan teknologi informasi dalam layanan publik. Sementara bagi <strong>perusahaan</strong>, kegiatan ini memperkuat citra instansi sekaligus membuka peluang kerjasama pendidikan di masa depan.</p><p><strong>Mengenal Dapur Teknologi Kota Semarang</strong></p><p>Diskominfo Kota Semarang memegang peran krusial dalam mengelola data dan teknologi untuk meningkatkan kualitas hidup masyarakat. Dalam sesi pembahasan, pihak instansi memaparkan fungsi teknologi yang mereka kembangkan untuk layanan publik, serta memberikan kesempatan diskusi mendalam bagi para siswa.</p><p>Dua fasilitas utama yang menjadi sorotan dalam kunjungan ini adalah:</p><ol><li><strong>Ruang Resepsionis Panggilan Darurat 112:</strong> Pusat layanan penanggulangan keadaan darurat yang memudahkan koordinasi antar instansi.</li><li><strong>Ruang Kontrol CCTV:</strong> Pusat monitoring keamanan kota Semarang yang memantau kejadian secara langsung, mulai dari lalu lintas hingga tindak kriminal.</li></ol><p>Kesimpulan dan Harapan:</p><p>Kunjungan ini diakhiri dengan kesimpulan bahwa observasi langsung sangat efektif dalam membangun pemahaman teknis dan etika kerja siswa. Sebagai saran, program kunjungan industri seperti ini diharapkan terus dipertahankan guna memperluas wawasan siswa dalam meraih pengalaman profesional yang berharga sebelum memasuki dunia kerja yang sesungguhnya.</p>', 'gambar27.jpeg'),
(2, 'Dibalik Layar Kaca: Pengalaman Edukatif Kunjungan ke Studio ADTV', '2023-11-21', 'celsifbina', '<p><strong>YOGYAKARTA</strong> – Dunia penyiaran selalu memiliki daya tarik tersendiri dengan segala kompleksitas di balik layarnya. Pada kesempatan kali ini, kami berkesempatan mengunjungi <strong>ADTV (Ahmad Dahlan Televisi)</strong> untuk melihat secara langsung bagaimana sebuah program televisi diproduksi, mulai dari tahap persiapan hingga tayang ke hadapan pemirsa.</p><p><strong>Menyaksikan Keajaiban Industri Penyiaran&nbsp;</strong></p><p>Kunjungan ini memberikan wawasan mendalam mengenai ekosistem televisi lokal yang edukatif dan religius. Tidak hanya sekadar melihat pertunjukan, kami diajak untuk memahami alur kerja para profesional media dalam mengemas konten yang menarik namun tetap sarat akan nilai-nilai informasi.</p><p>Beberapa aktivitas utama selama kunjungan di ADTV meliputi:</p><ul><li><strong>Observasi Proses Syuting:</strong> Melihat langsung bagaimana koordinasi antara juru kamera, penata cahaya, dan <i>floor director</i> dalam memandu sebuah program.</li><li><strong>Bedah Program TV:</strong> Menonton dan menganalisis berbagai program unggulan ADTV untuk memahami struktur naskah dan teknik penyampaian pesan.</li><li><strong>Manajemen Studio:</strong> Memperhatikan penggunaan teknologi <i>green screen</i>, pengaturan audio, serta peran penting ruang kontrol (<i>control room</i>) dalam mengatur lalu lintas siaran.</li></ul><p><strong>Belajar dari Para Praktisi</strong></p><p>Salah satu momen paling berharga adalah kesempatan untuk memperhatikan proses syuting yang sedang berlangsung. Di sini, kami belajar bahwa durasi tayangan yang hanya beberapa menit membutuhkan persiapan berjam-jam dengan tingkat ketelitian yang sangat tinggi. Kedisiplinan waktu dan kerjasama tim menjadi kunci utama kesuksesan sebuah program TV.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Kunjungan ke ADTV bukan hanya memberikan hiburan melalui pertunjukan yang disajikan, tetapi juga membuka cakrawasi baru mengenai peluang karir di industri kreatif dan penyiaran. Pengalaman ini diharapkan dapat memotivasi kami untuk terus mengembangkan keterampilan komunikasi dan teknologi media di masa depan.</p>', 'gambar15.jpeg'),
(3, 'Double Role! Kisah Seru Jadi Panitia Sekaligus Juara 2 Badminton di Classmeet SMK Muhammadiyah 2 Bantul', '2026-01-31', 'celsifbina', '<p><strong>BANTUL</strong> – Setelah melewati pekan ujian yang melelahkan, kemeriahan kembali menyelimuti lingkungan SMK Muhammadiyah 2 Bantul melalui ajang <strong>Classmeet 2024</strong>. Kegiatan tahunan ini menjadi panggung bagi seluruh siswa untuk melepas penat sekaligus menyalurkan bakat mereka di bidang olahraga dan seni.</p><h3>Pengalaman Unik: Menjadi Panitia Sekaligus Peserta</h3><p>Bagi saya, Classmeet tahun ini memberikan kesan yang jauh lebih mendalam karena saya harus menjalankan dua peran sekaligus, yakni sebagai <strong>panitia penyelenggara</strong> dan <strong>peserta lomba</strong>. Pengalaman ini menuntut manajemen waktu yang luar biasa serta fokus yang terbagi antara menyukseskan acara dan membawa nama baik kelas dalam kompetisi.</p><p>Sebagai panitia, tanggung jawab yang dijalankan meliputi:</p><p><strong>Koordinasi Lapangan:</strong> Memastikan jadwal pertandingan berjalan tepat waktu dan perlengkapan lomba tersedia dengan lengkap.</p><p><strong>Manajemen Skor:</strong> Mencatat dan mengawasi jalannya pertandingan agar tetap sportif dan transparan bagi seluruh peserta.</p><p><strong>Kesejahteraan Peserta:</strong> Memastikan suasana perlombaan tetap kondusif dan meminimalisir kendala teknis di lapangan.</p><h3>Sportivitas dan Prestasi di Tengah Persaingan</h3><p>Meskipun sibuk mengurus teknis acara, semangat kompetisi sebagai peserta tetap membara. Classmeet 2024 menghadirkan berbagai perlombaan menarik yang memicu adrenalin, mulai dari pertandingan olahraga fisik hingga lomba kreativitas yang menghibur.</p><p>Di tengah padatnya jadwal kepanitiaan, saya tetap berusaha memberikan performa terbaik di lapangan. Kerja keras tersebut membuahkan hasil yang membanggakan, di mana saya berhasil meraih <strong>Juara 2 dalam &nbsp;lomba Badminton</strong>. Pencapaian ini menjadi bukti bahwa dedikasi dan fokus yang kuat mampu menghasilkan prestasi, meskipun di bawah tekanan tanggung jawab yang besar. Momen ini juga menjadi sarana yang efektif untuk mempererat solidaritas antar kelas dan membangun keakraban antara kakak kelas dengan adik kelas.</p><h3>Kesimpulan dan Refleksi</h3><p>Classmeet 2024 sukses ditutup dengan sorak sorai kemenangan dan rasa persaudaraan yang semakin kuat. Menjadi panitia sekaligus peserta, serta berhasil meraih posisi runner-up di cabang Badminton, mengajarkan saya arti dedikasi yang sesungguhnya. Keberhasilan sebuah acara bergantung pada kerjasama tim yang solid, sementara keberhasilan dalam lomba bergantung pada semangat pantang menyerah. Semoga kemeriahan ini terus menjadi tradisi positif yang dinanti setiap tahunnya.</p>', 'gambar13.jpeg'),
(4, 'Pembekalan PR IPM 2024-2025 di Mangunan', '2024-12-12', 'celsifbina', '<p><strong>MANGUNAN</strong> – Mengawali masa khidmat dengan semangat baru, Pimpinan Ranting Ikatan Pelajar Muhammadiyah (PR IPM) SMK Muhammadiyah 2 Bantul menggelar agenda Pembekalan Pengurus Periode 2024-2025. Kegiatan yang berlangsung selama dua hari satu malam ini dilaksanakan di kawasan asri Mangunan, Kecamatan Dlingo, sebuah lokasi yang dipilih khusus untuk membangun ketenangan sekaligus fokus dalam berorganisasi.</p><h3>Dua Hari Mencetak Pemimpin Progresif</h3><p>Selama dua hari pelaksanaan, para pengurus baru dibekali dengan berbagai materi strategis untuk menghadapi tantangan organisasi setahun ke depan. Jauh dari kebisingan kota, suasana Mangunan yang sejuk mendukung proses diskusi menjadi lebih intensif dan bermakna. Pembekalan ini bukan sekadar pertemuan rutin, melainkan fase penting untuk menyelaraskan persepsi antar pengurus.</p><p>Fokus utama dalam pembekalan dua hari ini meliputi:</p><p><strong>Ideologi dan Kepemimpinan:</strong> Menanamkan nilai-nilai dasar IPM sebagai gerakan pelajar yang berkemajuan.</p><p><strong>Perancangan Proker Strategis:</strong> Menyusun program kerja yang inovatif untuk satu periode ke depan agar lebih berdampak bagi siswa.</p><p><strong>Solidaritas Internal:</strong> Mempererat <i>chemistry</i> dan kerjasama tim agar roda organisasi berjalan tanpa hambatan komunikasi.</p><h3>Tanggung Jawab Strategis: Mengemban Amanah Bendahara 1</h3><p>Dalam struktur kepengurusan periode 2024-2025 ini, saya mendapatkan kepercayaan besar untuk menjabat sebagai <strong>Bendahara 1</strong>. Peran ini menuntut ketelitian dan integritas tinggi dalam mengelola sirkulasi keuangan organisasi. Melalui pembekalan di Mangunan, saya belajar banyak mengenai manajemen anggaran yang efektif dan transparan, guna memastikan setiap agenda kerja yang telah dirancang dapat terealisasi dengan dukungan finansial yang sehat dan teratur.</p><h3>Membangun Sinergi di Alam Terbuka</h3><p>Pemilihan lokasi di Mangunan memungkinkan para pengurus untuk melakukan refleksi diri dan kelompok. Selain sesi diskusi formal, terdapat agenda luar ruangan yang bertujuan untuk mengasah ketangkasan serta pengambilan keputusan secara kolektif kolegial. Hal ini penting mengingat tantangan organisasi di periode 2024-2025 akan membutuhkan koordinasi yang sangat solid, terutama dalam sinergi antara administrasi keuangan dan pelaksanaan teknis di lapangan.</p><h3>Kesimpulan dan Langkah Awal</h3><p>Kegiatan ini ditutup dengan tekad bulat dari seluruh pengurus PR IPM 2024-2025 untuk menjalankan amanah dengan totalitas. Dengan bekal yang telah didapatkan selama dua hari di Mangunan, diharapkan pengurus—termasuk saya dalam mengelola amanah Bendahara 1—mampu membawa perubahan positif dan menjadikan IPM sebagai wadah aspirasi yang aktif dan kreatif di lingkungan sekolah.</p>', 'gambar5.jpeg'),
(5, 'Semarak Milad Mudaba ke-46: Kolaborasi Inspiratif Bersama Mahasiswa UNY', '2024-08-19', 'celsifbina', '<p><strong>BANTUL</strong>- Tanggal 19 Agustus 2024 menjadi hari yang istimewa bagi keluarga besar SMK Muhammadiyah 2 Bantul (Mudaba). Merayakan milad yang ke-46, sekolah tercinta ini menggelar serangkaian acara penuh syukur dan kegembiraan yang melibatkan partisipasi aktif dari seluruh warga sekolah serta pihak eksternal.</p><p><strong>Bersama Mahasiswa UNY</strong></p><p>Yang membuat perayaan Milad ke-46 ini berbeda dari tahun-tahun sebelumnya adalah kehadiran mahasiswa dari <strong>Universitas Negeri Yogyakarta (UNY)</strong> yang sedang menempuh program praktik di Mudaba. Para mahasiswa ini menginisiasi sebuah agenda bertajuk <strong>\"Lomba Semarak Milad\"</strong>, yang dirancang khusus untuk memeriahkan suasana sekaligus mengasah kreativitas siswa.</p><p>Berbagai cabang lomba yang diadakan meliputi:</p><ul><li><strong>Lomba Seni dan Kreativitas:</strong> Wadah bagi siswa untuk menunjukkan bakat artistik mereka.</li><li><strong>Lomba Ketangkasan:</strong> Membangun sportivitas dan kerjasama tim antar kelas.</li><li><strong>Ajang Kreasi Siswa:</strong> Memberikan ruang bagi para pelajar untuk tampil percaya diri di depan umum.</li></ul><p><strong>Membangun Sinergi Pendidikan</strong></p><p>Keterlibatan mahasiswa UNY dalam agenda ini memberikan warna baru dalam proses pembelajaran di luar kelas. Selain sebagai hiburan, lomba-lomba ini juga berfungsi sebagai sarana integrasi antara mahasiswa sebagai calon pendidik dengan para siswa. Sinergi yang tercipta berhasil menghidupkan suasana sekolah menjadi lebih dinamis dan penuh semangat kompetisi yang positif.</p><p><strong>Kesimpulan dan Doa untuk Mudaba</strong></p><p>Perayaan Milad ke-46 ini menjadi momentum refleksi atas perjalanan panjang SMK Muhammadiyah 2 Bantul dalam mencetak generasi yang unggul dan berakhlak mulia. Dengan bertambahnya usia, diharapkan Mudaba semakin jaya, inovatif, dan terus mampu menjalin kolaborasi hebat dengan berbagai instansi pendidikan lainnya demi kemajuan para siswa.</p>', 'gambar6.jpeg'),
(7, 'Pembekalan PR IPM 2023-2024', '2023-11-04', 'celsifbina', '<p><strong>MANGUNAN</strong> – Pembekalan Pengurus untuk periode 2023 menjadi momentum krusial bagi seluruh jajaran pengurus untuk menyatukan visi dan memperkuat ikatan emosional antaranggota. Kegiatan ini bukan sekadar pertemuan formal, melainkan langkah awal dalam merancang arah gerak organisasi setahun ke depan.</p><h3>Kepemimpinan Strategis di Bidang Kewirausahaan (KWU)</h3><p>Dalam struktur kepengurusan periode ini, saya mengemban amanah sebagai <strong>Ketua Bidang Kewirausahaan (KWU)</strong>. Peran ini menuntut kreativitas dan kemandirian dalam menciptakan peluang ekonomi yang dapat mendukung keberlangsungan program kerja organisasi. Dalam suasana diskusi yang hangat namun tetap serius di Mangunan, koordinasi intensif dilakukan bersama Ketua Umum untuk memetakan proker yang inovatif dan relevan bagi pelajar.</p><p>Beberapa poin utama yang menjadi fokus Bidang KWU meliputi:</p><p><strong>Kemandirian Ekonomi:</strong> Merancang unit usaha kreatif yang dapat menjadi sumber pendanaan internal organisasi.</p><p><strong>Pengembangan Skill Entrepreneur:</strong> Menginisiasi pelatihan kewirausahaan bagi siswa untuk menumbuhkan jiwa bisnis sejak dini.</p><p><strong>Sinergi Program:</strong> Menyelaraskan langkah Bidang KWU dengan kebijakan pimpinan agar setiap unit usaha sejalan dengan nilai-nilai organisasi.</p><h3>Membangun Kekuatan Lewat Diskusi</h3><p>Sesi diskusi bersama Ketua menjadi jantung dari kegiatan pembekalan ini. Sebagai Ketua Bidang KWU, saya memaparkan rencana strategis untuk memastikan setiap langkah yang diambil memiliki dampak nyata, baik bagi kas organisasi maupun pengembangan potensi siswa. Dialog dua arah ini bertujuan untuk menyelaraskan ide-ide kreatif dari bidang dengan arahan kebijakan dari pimpinan pusat organisasi.</p><h3>Kesimpulan dan Harapan</h3><p>Pembekalan di Mangunan ini diakhiri dengan komitmen bersama untuk membawa PR IPM 2023-2024 menjadi organisasi yang lebih progresif. Dengan mengemban tanggung jawab<strong> sebagai Ketua Bidang KWU</strong>, saya berharap dapat membawa semangat kemandirian bagi rekan-rekan pengurus dan menjalankan amanah ini dengan penuh dedikasi serta inovasi.</p>', 'gambar11.jpeg'),
(8, 'Demokrasi Pelajar: Pemilos 2023 Menjadi Saksi Pemimpin Baru IPM', '2023-09-05', 'celsifbina', '<p><strong>BANTUL</strong>- Semangat demokrasi terpancar jelas di lingkungan sekolah saat agenda Pemilihan Ketua OSIS dan Ketua Pimpinan Ranting Ikatan Pelajar Muhammadiyah (Pemilos) serentak tahun 2023 resmi digelar. Momentum ini bukan sekadar rutinitas organisasi tahunan, melainkan sebuah proses sakral yang menjadi saksi bisu regenerasi kepemimpinan di tubuh IPM.</p><p><strong>Menanamkan Nilai Pendidikan Politik</strong></p><p>Pemilos 2023 dirancang sebagai laboratorium demokrasi bagi seluruh siswa. Melalui kegiatan ini, para pelajar diajak untuk memahami pentingnya hak suara dan cara memilih pemimpin berdasarkan visi, misi, serta integritas. Suasana di tempat pemungutan suara dipenuhi antusiasme, di mana setiap pemilih mempertimbangkan masa depan organisasi melalui surat suara yang mereka bawa.</p><p>Beberapa poin penting yang melatarbelakangi kesuksesan Pemilos tahun ini antara lain:</p><ul><li><strong>Transparansi Proses:</strong> Seluruh tahapan, mulai dari orasi kandidat hingga penghitungan suara, dilakukan secara terbuka guna menjamin hasil yang adil.</li><li><strong>Partisipasi Aktif:</strong> Tingginya tingkat kehadiran siswa menunjukkan kesadaran yang besar akan pentingnya peran IPM dalam menaungi aspirasi pelajar.</li><li><strong>Uji Kelayakan:</strong> Para calon ketua telah melewati serangkaian seleksi ketat dan debat terbuka untuk membuktikan kesiapan mereka dalam memimpin.</li></ul><p><strong>Lahirnya Pemimpin Masa Depan</strong></p><p>Puncak dari kegiatan ini adalah terpilihnya Ketua PR IPM yang baru untuk masa jabatan mendatang. Proses penghitungan suara berlangsung penuh ketegangan namun tetap kondusif, mencerminkan kedewasaan berorganisasi para siswa. Ketua terpilih diharapkan mampu membawa IPM menjadi wadah yang lebih inklusif, kreatif, dan mampu menjawab tantangan zaman di lingkungan sekolah.</p><p><strong>Kesimpulan dan Harapan</strong></p><p>Pemilos 2023 telah membuktikan bahwa sekolah adalah tempat terbaik untuk menyemai benih-benih kepemimpinan. Dengan terpilihnya nakhoda baru, besar harapan agar PR IPM dapat segera bersinergi dengan seluruh bidang untuk merealisasikan program-program kerja yang bermanfaat bagi kemajuan seluruh kader dan civitas akademika.</p>', 'gambar4.jpeg'),
(9, 'Demokrasi Sekolah: Pengalaman Menjadi Panitia KPPS 4 dalam Pemilos 2025', '2025-09-02', 'celsifbina', '<p><strong>BANTUL</strong> – SMK Muhammadiyah 2 Bantul kembali menggelar pesta demokrasi pelajar melalui agenda Pemilihan Ketua Pimpinan Ranting Ikatan Pelajar Muhammadiyah (Pemilos) tahun 2025. Kegiatan yang dilaksanakan pada awal September ini merupakan puncak dari proses kaderisasi untuk menentukan nakhoda baru yang akan memimpin organisasi selama satu periode ke depan.</p><p><strong>Tugas Strategis di Balik Meja KPPS 4</strong></p><p>Pada pelaksanaan Pemilos tahun ini, saya mendapatkan amanah penting untuk bertugas sebagai <strong>anggota KPPS 4</strong> (Kelompok Penyelenggara Pemungutan Suara). Peran ini memiliki tanggung jawab yang sangat teknis dan krusial dalam menjamin kelancaran alur pemungutan suara di Tempat Pemungutan Suara (TPS).</p><p>Sebagai petugas KPPS 4, fokus utama saya meliputi:</p><ul><li><strong>Penerimaan Pemilih:</strong> Bertanggung jawab dalam menerima pemilih yang datang dan memastikan mereka terdaftar dalam daftar pemilih tetap.</li><li><strong>Verifikasi Data:</strong> Memeriksa identitas siswa agar tidak terjadi duplikasi surat suara atau penggunaan hak suara yang tidak sah.</li><li><strong>Pengaturan Antrean:</strong> Menjaga alur masuk dan keluar pemilih agar tetap tertib, sehingga proses pemungutan suara tidak menumpuk dan berjalan efisien.</li></ul><p><strong>Menjaging Integritas dan Transparansi</strong></p><p>Bekerja di balik meja panitia memberikan pelajaran berharga mengenai arti integritas. Setiap surat suara yang dikeluarkan harus tercatat dengan akurat. Pengalaman ini mengajarkan saya dan tim panitia lainnya tentang pentingnya ketelitian dalam mengelola administrasi pemilihan, mulai dari pembukaan kotak suara hingga tahap penghitungan nanti.</p><p><strong>Kesimpulan dan Harapan</strong></p><p>Pemilos 2025 bukan sekadar ajang pilih-memilih, tetapi merupakan sarana pendidikan politik yang nyata bagi seluruh siswa Mudaba. Dengan suksesnya pelaksanaan tugas panitia KPPS, diharapkan ketua terpilih nantinya merupakan pemimpin yang benar-benar merepresentasikan aspirasi seluruh pelajar. Pengalaman menjadi bagian dari penyelenggara ini menjadi catatan penting dalam perjalanan organisasi saya, memperkuat pemahaman mengenai sistem demokrasi yang jujur dan adil.</p>', 'gambar10.jpeg'),
(10, 'Fortasi 2024: Keseruan Outbound Day 6 dan Pengalaman Dua Sisi yang Berkesan', '2025-09-02', 'celsifbina', '<p><strong>BANTUL</strong> – Forum Ta’aruf dan Orientasi Siswa (Fortasi) 2024 yang diselenggarakan oleh Pimpinan Ranting Ikatan Pelajar Muhammadiyah (PR IPM) SMK Muhammadiyah 2 Bantul mencapai puncaknya pada hari keenam. Berbeda dengan hari-hari sebelumnya yang dipenuhi dengan materi ruangan, Day 6 menjadi momen yang paling dinanti dengan diadakannya kegiatan outbound luar ruangan yang penuh keceriaan.</p><h3>Menjalankan Peran Ganda: Antara Peserta dan Panitia</h3><p>Momen Fortasi tahun ini terasa sangat spesial dan menantang bagi saya pribadi. Saya berada dalam posisi yang unik, yakni menjalankan peran ganda sebagai peserta sekaligus panitia. Pengalaman ini memberikan sudut pandang yang luar biasa; di satu sisi saya harus mengikuti instruksi dan merasakan keseruan setiap game sebagai peserta, namun di sisi lain saya tetap memikul tanggung jawab teknis untuk memastikan acara berjalan lancar sesuai rencana panitia.</p><p>Tantangan utama dari peran ganda ini adalah:</p><p><strong>Manajemen Energi:</strong> Harus tetap bersemangat mengikuti seluruh rangkaian outbound sambil menjaga fokus pada koordinasi lapangan.</p><p><strong>Integritas:</strong> Menunjukkan sportivitas tinggi sebagai contoh bagi peserta lain meskipun mengetahui \"dapur\" dari setiap permainan yang disiapkan.</p><p><strong>Empati Organisasi:</strong> Memahami kesulitan yang dirasakan peserta secara langsung, sehingga bisa menjadi jembatan komunikasi yang baik bagi rekan-rekan panitia lainnya.</p><h3>Outbound sebagai Sarana Penguat Ukhuwah</h3><p>Kegiatan outbound ini tidak hanya sekadar bermain di lapangan. Setiap permainan yang dirancang oleh PR IPM Mudaba memiliki filosofi kepemimpinan, kerja sama tim (<i>teamwork</i>), dan ketangkasan. Melalui berbagai rintangan dan tantangan fisik, ikatan persaudaraan (<i>ukhuwah</i>) antar siswa baru semakin erat, memecahkan kecanggungan yang mungkin masih terasa di hari-hari awal.</p><p>Salah satu momen paling seru dan berkesan adalah saat kompetisi ketangkasan, di mana saya berhasil meraih <strong>Juara 2 dalam lomba menangkap belut</strong>. Meskipun terlihat sederhana, lomba ini menuntut konsentrasi dan teknik khusus, yang semakin menambah kemeriahan serta gelak tawa di antara para peserta dan panitia.</p><h3>Kesimpulan dan Refleksi</h3><p>Fortasi Day 6 tahun 2024 menjadi bukti bahwa belajar tidak harus selalu di dalam kelas. Pengalaman menjadi peserta sekaligus panitia, ditambah dengan pencapaian sebagai juara di salah satu perlombaan, mengajarkan saya tentang kedisiplinan, pembagian waktu, dan pentingnya totalitas dalam menjalankan amanah. Kegiatan ini ditutup dengan tawa dan sorak sorai, menandai awal perjalanan baru bagi para siswa di lingkungan Mudaba yang penuh semangat organisasi.</p>', 'gambar14.jpeg'),
(11, 'Sinergi Organisasi dan Pelayanan: Kunjungan Bupati Bantul di Hospitarium PKU Muhammadiyah ', '2024-02-09', 'celsifbina', '<p><strong>BANTUL</strong> – Sebuah momentum penting terjadi pada tanggal 9 Februari 2024, di mana jajaran organisasi berkesempatan hadir dalam agenda formal yang dilaksanakan di <strong>Hospitarium PKU Muhammadiyah Bantul</strong>. Kegiatan ini menjadi istimewa dengan kehadiran orang nomor satu di Kabupaten Bantul, yakni Bapak Bupati Bantul, yang turut memberikan arahan dan apresiasi terhadap peranan organisasi dalam masyarakat.</p><p><strong>Mendengarkan Arahan Strategis</strong></p><p>Dalam pertemuan tersebut, fokus utama adalah mendengarkan pemaparan serta arahan dari pihak organisasi dan pemerintah daerah. Kehadiran Bupati Bantul menegaskan pentingnya kolaborasi antara lembaga kesehatan, organisasi keagamaan/pelajar, dan pemerintah untuk menciptakan kesejahteraan bagi warga Bantul.</p><p>Poin-poin utama yang dibahas dalam pertemuan tersebut meliputi:</p><ul><li><strong>Penguatan Sinergi:</strong> Pentingnya komunikasi dua arah antara organisasi masyarakat dengan kebijakan pemerintah daerah.</li><li><strong>Peran Hospitarium:</strong> Bagaimana fasilitas seperti Hospitarium PKU Muhammadiyah menjadi pusat integrasi pelayanan yang profesional namun tetap memegang nilai-nilai kemanusiaan.</li><li><strong>Apresiasi Program:</strong> Bupati menyampaikan dukungan terhadap inisiatif organisasi yang berkontribusi nyata dalam pembangunan karakter dan pelayanan publik.</li></ul><p><strong>Pengalaman Belajar di Lingkungan Profesional</strong></p><p>Menghadiri acara di lingkungan rumah sakit besar memberikan pengalaman tersendiri. Kami diajak untuk memperhatikan bagaimana sebuah protokol acara kenegaraan/daerah dijalankan dengan sangat tertib di fasilitas kesehatan. Interaksi langsung dengan para pemangku kepentingan (stakeholders) membuka wawasan kami mengenai kompleksitas manajemen organisasi dalam skala yang lebih luas.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Kunjungan ini bukan sekadar menghadiri undangan, melainkan sebuah kesempatan belajar tentang kepemimpinan dan diplomasi. Kehadiran Bupati Bantul di Hospitarium PKU Muhammadiyah Bantul pada 9 Februari 2024 ini menjadi penyemangat bagi kami untuk terus aktif berorganisasi dan memberikan kontribusi terbaik, sekecil apa pun itu, bagi kemajuan daerah.</p><p>&nbsp;</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar16.jpeg'),
(12, 'Generasi Emas Tanpa Narkoba', '2024-07-21', 'celsifbina', '<p><strong>BANTUL</strong> – Pada tanggal 21 Juli 2024, sebuah agenda krusial bagi masa depan pelajar digelar di Kampus <strong>STIKES Bantul</strong>. Kegiatan ini berupa <i>Talk Show</i> bertema pencegahan narkoba yang bertujuan untuk membentengi generasi muda dari ancaman penyalahgunaan zat terlarang melalui pemahaman yang mendalam dan komprehensif.</p><p><strong>Kolaborasi dan Diskusi Kelompok</strong></p><p>Salah satu agenda utama dalam <i>Talk Show</i> ini adalah sesi diskusi kelompok. Kami tidak hanya mendengarkan paparan dari narasumber, tetapi juga dibagi menjadi beberapa tim untuk melakukan bedah materi dan menarik kesimpulan dari topik yang diberikan. Dari diskusi ini kami di minta untuk berpikir kritis mengenai bahaya narkoba yang seringkali mengintai di lingkungan sekitar.</p><p><strong>Kesimpulan Materi: Memahami Tahapan Penyalahgunaan Narkoba</strong></p><p>Berdasarkan hasil diskusi kelompok kami, berikut adalah poin-poin kesimpulan mengenai tiga tahap penyalahgunaan narkoba yang harus diwaspadai:</p><p>&nbsp;</p><ol><li><strong>Tahap 1: Tahap Coba-Coba (Eksperimental)</strong><ol><li>Tahap awal di mana seseorang mencoba narkoba karena rasa ingin tahu atau pengaruh tekanan teman sebaya (<i>peer pressure</i>).</li><li>Pentingnya memiliki pendirian yang kuat dan lingkungan pergaulan yang positif sejak dini.</li></ol></li><li><strong>Tahap 2: Tahap Penggunaan Teratur (Sosiogenik)</strong><ol><li>Pengguna mulai menggunakan narkoba secara rutin untuk tujuan sosial atau mencari kenyamanan sesaat dari masalah pribadi.</li><li>Pada tahap ini, perubahan perilaku mulai terlihat dan fungsi sosial seseorang mulai terganggu.</li></ol></li><li><strong>Tahap 3: Tahap Ketergantungan (Adiksi)</strong><ol><li>Tahap di mana seseorang sudah kehilangan kontrol atas dirinya sendiri dan mengalami kecanduan secara fisik maupun psikis.</li><li>Membutuhkan penanganan medis dan rehabilitasi yang intensif karena narkoba sudah menjadi prioritas utama dalam hidupnya.</li></ol></li></ol><p><strong>Kesimpulan dan Harapan</strong></p><p>Kegiatan di STIKES Bantul ini membuka mata kami bahwa pemahaman mengenai tahapan narkoba sangat penting untuk langkah pencegahan. Dengan mengetahui proses terjadinya adiksi, kami diharapkan bisa menjadi duta anti-narkoba di lingkungan sekolah maupun rumah. Semoga melalui edukasi seperti ini, tercipta lingkungan pelajar yang sehat, cerdas, dan sepenuhnya bebas dari narkoba.</p>', 'gambar17.jpeg'),
(13, 'Game Segalanya? Menelisik Fenomena Kecanduan Gadget', '2025-09-03', 'celsifbina', '<p><strong>BANTUL</strong> – Pada tanggal 3 September 2025, Aula Kapanewon Bantul menjadi ruang diskusi yang hangat bagi generasi muda dalam acara <strong>Forum Anak</strong>. Kegiatan kali ini mengangkat tema yang sangat relevan dengan realitas remaja saat ini, yaitu: <strong>\"Game Segalanya?\"</strong>. Fokus utama dari pertemuan ini adalah memberikan edukasi mendalam mengenai dampak kecanduan <i>game</i> dan bagaimana cara membangun pola hidup yang lebih seimbang.</p><p><strong>Membongkar Realitas di Balik Layar</strong></p><p>Dalam sesi diskusi, para peserta diajak untuk merefleksikan kebiasaan mereka dalam bermain <i>game</i>. Pertanyaan \"Game Segalanya?\" menjadi pemantik diskusi untuk menyadari apakah aktivitas bermain sudah menggeser prioritas penting lainnya, seperti pendidikan, sosialisasi nyata, dan kesehatan fisik.</p><p>Poin-poin penting yang dibahas dalam Forum Anak ini meliputi:</p><ul><li><strong>Identifikasi Gejala Kecanduan:</strong> Memahami ciri-ciri seseorang yang sudah mulai kehilangan kontrol atas waktu bermainnya.</li><li><strong>Dampak Psikologis dan Fisik:</strong> Diskusi mengenai kelelahan mata, gangguan pola tidur, hingga menurunnya kemampuan konsentrasi akibat paparan layar yang berlebihan.</li><li><strong>Manajemen Waktu:</strong> Memberikan tips praktis bagi anak-anak dan remaja agar tetap bisa menikmati <i>game</i> sebagai hiburan tanpa harus mengorbankan tugas utama sebagai pelajar.</li></ul><p><strong>Membangun Kesadaran Kolektif</strong></p><p>Kegiatan di Aula Kapanewon ini menekankan bahwa teknologi dan <i>game</i> bukanlah musuh, melainkan alat yang harus digunakan dengan bijaksana. Melalui Forum Anak, para peserta didorong untuk menjadi agen perubahan yang bisa saling mengingatkan teman sebaya agar tidak terjebak dalam lingkaran kecanduan <i>gadget</i>. Kesimpulan dari tema \"Game Segalanya?\" adalah sebuah penegasan bahwa dunia nyata memiliki jauh lebih banyak kesempatan dan pengalaman berharga daripada sekadar apa yang ada di dalam layar.</p><p><strong>Kesimpulan dan Harapan</strong></p><p>Acara yang berlangsung tertib dan interaktif ini ditutup dengan komitmen bersama para anggota Forum Anak untuk mulai menerapkan pembatasan waktu bermain secara mandiri. Semoga melalui edukasi ini, anak-anak di wilayah Kapanewon Bantul dapat tumbuh menjadi generasi yang cerdas teknologi namun tetap produktif dan memiliki kepedulian sosial yang tinggi di dunia nyata.</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar18.jpeg'),
(14, 'Menyambut Bulan Suci: Refleksi Pengajian Songsong Ramadhan di UNISA', '2025-02-18', 'celsifbina', '<p><strong>SLEMAN</strong> – Menjelang datangnya bulan suci yang penuh berkah, pada tanggal <strong>25 Februari 2025</strong>, saya berkesempatan untuk menghadiri undangan <strong>Pengajian Songsong Ramadhan</strong> yang diselenggarakan di kampus <strong>Universitas Aisyiyah Yogyakarta (UNISA)</strong>. Acara ini menjadi momentum penting bagi para jamaah dan aktivis organisasi untuk mempersiapkan diri, baik secara lahir maupun batin, dalam menyambut bulan Ramadhan.</p><p><strong>Mempersiapkan Diri Menuju Bulan Kemenangan</strong></p><p>Pengajian ini bukan sekadar pertemuan rutin, melainkan sebuah ajakan untuk melakukan refleksi mendalam mengenai kesiapan kita dalam menjalankan ibadah puasa. Suasana di UNISA yang kental dengan nilai-nilai keislaman dan akademik memberikan nuansa yang tenang dan khusyuk bagi setiap peserta yang hadir.</p><p>Beberapa poin utama yang ditekankan dalam pengajian tersebut meliputi:</p><ul><li><strong>Manajemen Ruhiyah:</strong> Pentingnya membersihkan hati dan niat agar ibadah di bulan Ramadhan tidak hanya menjadi rutinitas fisik, tetapi juga transformasi spiritual.</li><li><strong>Bekal Keilmuan:</strong> Mengkaji kembali fiqh puasa dan amalan-amalan sunnah yang dapat mempertebal pahala selama bulan suci.</li><li><strong>Ukhuwah Islamiyah:</strong> Mempererat tali silaturahmi antar organisasi dan sesama Muslim sebagai bentuk kekuatan kolektif dalam menjalankan ketaatan.</li></ul><p><strong>Inspirasi dari Lingkungan Akademik</strong></p><p>Hadir di kampus UNISA memberikan kesan tersendiri. Sebagai institusi yang berfokus pada pendidikan dan kesehatan dengan nilai-nilai kemanusiaan, UNISA berhasil mengemas acara keagamaan ini dengan sangat rapi dan berkesan. Materi yang disampaikan oleh narasumber sangat relevan dengan tantangan generasi muda saat ini dalam menjaga konsistensi beribadah di tengah kesibukan aktivitas sehari-hari.</p><p><strong>Kesimpulan dan Harapan</strong></p><p>Kegiatan Songsong Ramadhan ini ditutup dengan doa bersama untuk keselamatan dan keberkahan seluruh umat. Pengalaman menghadiri undangan ini menjadi pengingat berharga bagi saya untuk mulai menata jadwal dan target ibadah sejak dini. Semoga persiapan yang dilakukan di UNISA ini dapat membawa dampak positif bagi kualitas ibadah kita di bulan Ramadhan mendatang.</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar28.jpeg'),
(15, 'Eksplorasi Dunia Kopi: Seni Barista di Ros In Hotel', '2025-01-21', 'celsifbina', '<p><strong>YOGYAKARTA</strong> – Industri kopi yang berkembang pesat saat ini menuntut pemahaman yang lebih dalam mengenai profesi di baliknya. Pada tanggal <strong>21 Januari 2025</strong>, saya berkesempatan mengikuti agenda <strong>Pelatihan &amp; Practice Barista</strong> yang diselenggarakan di <strong>Ros In Hotel</strong>. Kegiatan ini dirancang untuk memberikan wawasan nyata mengenai operasional di balik meja bar sebuah hotel berbintang.</p><p><strong>Mengenal Profesi Barista Lebih Dekat</strong></p><p>Meskipun dalam pelatihan ini tidak ada sesi praktik langsung bagi peserta, pengalaman observasi yang diberikan sangatlah mendalam. Kami mendapatkan penjelasan mendetail mengenai tugas dan tanggung jawab seorang barista profesional. Seorang barista bukan hanya sekadar pembuat kopi, melainkan seorang \"seniman\" yang harus menguasai:</p><ul><li><strong>Pengetahuan Biji Kopi:</strong> Memahami karakter berbagai jenis biji kopi serta cara penyimpanannya agar kualitas rasa tetap terjaga</li><li><strong>Penguasaan Alat:</strong> Teknis penggunaan mesin espresso, <i>grinder</i>, hingga peralatan manual brew dengan tingkat presisi yang tinggi</li><li><strong>Hospitality:</strong> Cara menyajikan minuman dan berinteraksi dengan tamu untuk memberikan pengalaman minum kopi yang berkesan</li></ul><p><strong>Observasi Langsung dan Sesi Coffee Tasting</strong></p><p>Fokus utama dari kegiatan ini adalah melihat secara langsung praktik pembuatan berbagai menu kopi populer. Kami memperhatikan setiap gerak-gerik barista, mulai dari proses <i>grinding</i>, <i>tamping</i>, hingga ekstraksi espresso yang sempurna.</p><p>Setelah proses pembuatan selesai, kami diajak untuk melakukan sesi <strong>coffee tasting</strong>. Sesi ini sangat menarik karena kami belajar mengenali perbedaan rasa, aroma, dan tekstur dari hasil seduhan sang profesional. Hal ini memberikan pemahaman bahwa setiap detail kecil dalam proses pembuatan akan sangat memengaruhi rasa akhir di dalam cangkir.</p><p>&nbsp;</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar20.jpeg'),
(16, 'Berbagi Berkah di Jalanan: Aksi Takjil On The Road PR IPM Mudaba di Perempatan Klodran', '2024-03-22', 'celsifbina', '<p><strong>BANTUL</strong> – Bulan suci Ramadhan selalu menjadi momentum terbaik untuk mempererat tali persaudaraan dan menebar kebaikan kepada sesama. Pada tanggal <strong>22 Maret 2024</strong>, Pimpinan Ranting Ikatan Pelajar Muhammadiyah (PR IPM) SMK Muhammadiyah 2 Bantul sukses menyelenggarakan aksi sosial bertajuk <strong>\"Takjil On The Road\"</strong> yang dipusatkan di salah satu titik tersibuk di jantung kota Bantul, yaitu <strong>Perempatan Klodran</strong>.</p><p><strong>Semangat Berbagi di Tengah Keramaian</strong></p><p>Kegiatan ini dimulai saat menjelang waktu berbuka puasa, di mana arus lalu lintas di Perempatan Klodran sedang mencapai puncaknya. Mengenakan atribut organisasi dengan penuh kebanggaan, para kader IPM turun langsung ke jalan untuk membagikan paket takjil kepada para pengguna jalan, mulai dari pengendara motor, pengemudi mobil, hingga pejalan kaki yang sedang dalam perjalanan pulang.</p><p>Berikut adalah pengembangan teks artikel untuk kegiatan <strong>Pembagian Takjil On The Road</strong> agar terlihat lebih menyentuh dan inspiratif untuk blog Anda:</p><p><strong>Berbagi Berkah di Jalanan: Aksi Takjil On The Road PR IPM Mudaba di Perempatan Klodran</strong></p><p><strong>BANTUL</strong> – Bulan suci Ramadhan selalu menjadi momentum terbaik untuk mempererat tali persaudaraan dan menebar kebaikan kepada sesama. Pada tanggal <strong>22 Maret 2024</strong>, Pimpinan Ranting Ikatan Pelajar Muhammadiyah (PR IPM) SMK Muhammadiyah 2 Bantul sukses menyelenggarakan aksi sosial bertajuk <strong>\"Takjil On The Road\"</strong> yang dipusatkan di salah satu titik tersibuk di jantung kota Bantul, yaitu <strong>Perempatan Klodran</strong>.</p><p><strong>Semangat Berbagi di Tengah Keramaian</strong></p><p>Kegiatan ini dimulai saat menjelang waktu berbuka puasa, di mana arus lalu lintas di Perempatan Klodran sedang mencapai puncaknya. Mengenakan atribut organisasi dengan penuh kebanggaan, para kader IPM turun langsung ke jalan untuk membagikan paket takjil kepada para pengguna jalan, mulai dari pengendara motor, pengemudi mobil, hingga pejalan kaki yang sedang dalam perjalanan pulang.</p><p>Tujuan utama dari aksi sosial ini adalah:</p><ul><li><strong>Membantu Sesama:</strong> Memberikan kemudahan bagi para musafir atau pekerja yang masih berada di jalan agar tetap bisa membatalkan puasa tepat waktu.</li><li><strong>Syiar Organisasi:</strong> Menunjukkan peran aktif pelajar Muhammadiyah dalam kegiatan sosial kemasyarakatan yang positif.</li><li><strong>Melatih Empati:</strong> Menumbuhkan rasa kepedulian dan jiwa kedermawanan di kalangan pengurus IPM sejak dini.</li></ul><p><strong>Momen Kebersamaan dan Antusiasme Warga</strong></p><p>Antusiasme masyarakat Bantul sangat luar biasa menyambut aksi ini. Dalam waktu singkat, ratusan paket takjil yang telah disiapkan habis terdistribusi. Senyum dan ucapan terima kasih dari para pengendara menjadi energi tersendiri bagi kami para panitia, meskipun harus berpanas-panasan di pinggir jalan. Keharmonisan dan kerjasama tim antar pengurus IPM menjadi kunci utama lancarnya pembagian takjil tanpa mengganggu arus lalu lintas.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Aksi Takjil On The Road di Perempatan Klodran ini menjadi pengingat bahwa kebahagiaan sejati terletak pada saat kita mampu memberi manfaat bagi orang lain. Kegiatan ini bukan sekadar rutinitas Ramadhan, melainkan perwujudan nyata dari nilai-nilai Islam yang mengajarkan kasih sayang kepada sesama. Semoga aksi kecil ini dapat membawa keberkahan bagi yang menerima dan menjadi amal jariyah bagi seluruh keluarga besar Mudaba.</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar21.jpeg'),
(17, 'Musycab IV IPM Bantul: Estafet Kepemimpinan dan Refleksi Perjuangan Organisasi', '2024-01-19', 'celsifbina', '<p><strong>BANTUL</strong> – Sebuah momentum bersejarah bagi pergerakan pelajar Muhammadiyah di wilayah Bantul kembali bergulir. Pada tanggal <strong>19 Januari 2024</strong>, bertempat di <strong>SMK Muhammadiyah 1 Bantul</strong>, telah sukses dilaksanakan Musyawarah Cabang (Musycab) IV Ikatan Pelajar Muhammadiyah. Agenda ini merupakan pemegang kekuasaan tertinggi di tingkat cabang yang bertujuan untuk mengevaluasi periode yang lalu sekaligus menentukan arah gerak organisasi untuk periode mendatang.</p><p><strong>Rangkaian Agenda Sidang yang Komprehensif</strong></p><p>Musycab IV kali ini dipenuhi dengan serangkaian agenda sidang yang padat dan dinamis. Pelaksanaan musyawarah berjalan dengan khidmat, mengedepankan prinsip musyawarah mufakat demi kemajuan IPM di wilayah Bantul.</p><p>Beberapa poin penting yang menjadi inti dari pelaksanaan Musycab IV meliputi:-&nbsp;</p><ul><li><strong>Laporan Pertanggungjawaban (LPJ):</strong> Penyampaian hasil kerja pimpinan periode sebelumnya sebagai bentuk transparansi dan akuntabilitas organisasi.</li><li><strong>Progress Report IPM Se-Bantul:</strong> Pemaparan perkembangan terkini dari setiap ranting dan pimpinan di bawah koordinasi cabang untuk menyinkronkan gerak langkah.</li><li><strong>Persidangan Komisi:</strong> Penetapan anggota dan sidang komisi yang membahas garis besar haluan organisasi, kebijakan strategis, serta rekomendasi program kerja.</li><li><strong>Keputusan Induk Musycab IV:</strong> Penetapan hasil-hasil sidang sebagai landasan hukum organisasi untuk satu periode ke depan.</li></ul><p><strong>Dinamika Pemilihan dan Regenerasi</strong></p><p>Puncak dari Musycab IV adalah proses pemilihan yang menggunakan sistem formatur. Tahapan ini diawali dengan pemilihan serta penetapan daftar hasil formatur yang akan menentukan struktur pimpinan baru. Setelah melalui proses yang demokratis, akhirnya ditetapkanlah Ketua dan Wakil Ketua IPM Cabang yang baru.</p><p>Acara ditutup dengan prosesi <strong>Serah Terima Jabatan (Sertijab)</strong> dari pimpinan lama kepada pimpinan terpilih. Momen ini menjadi simbol penyerahan amanah dan tanggung jawab untuk meneruskan tonggak perjuangan IPM dalam membina pelajar yang berilmu, berakhlak mulia, dan terampil.</p><p><strong>Kesimpulan dan Harapan</strong></p><p>Musycab IV di SMK Muhammadiyah 1 Bantul telah berhasil melahirkan pemimpin-pemimpin baru yang diharapkan mampu membawa perubahan progresif bagi pelajar di Bantul. Regenerasi ini bukan sekadar pergantian wajah, melainkan penyegaran semangat untuk terus berdakwah di kalangan pelajar. Selamat bekerja kepada pimpinan terpilih, semoga amanah dalam mengemban tugas organisasi.</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar22.jpeg'),
(18, 'Dibalik Layar Kelancaran Wisuda 2024: Dedikasi Tim Konsumsi SMK Muhammadiyah 2 Bantul', '2024-05-13', 'celsifbina', '<p><strong>BANTUL</strong> – Momen kelulusan merupakan hari yang paling dinantikan oleh seluruh siswa kelas XII beserta orang tua. Di balik kemeriahan prosesi wisuda yang berlangsung pada tanggal <strong>13 Mei 2024</strong> di <strong>SMK Muhammadiyah 2 Bantul (Mudaba)</strong>, terdapat peran krusial dari jajaran panitia yang bekerja keras memastikan kenyamanan seluruh tamu undangan, salah satunya adalah <strong>Tim Konsumsi</strong>.</p><p><strong>Tanggung Jawab dan Manajemen Pelayanan</strong></p><p>Menjadi bagian dari tim konsumsi dalam acara skala besar seperti wisuda menuntut ketelitian, kecepatan, dan manajemen waktu yang sangat ketat. Tugas tim ini tidak hanya sekadar membagikan makanan, tetapi menjaga kualitas pelayanan agar setiap tamu, mulai dari jajaran pimpinan, wali murid, hingga para wisudawan, mendapatkan layanan terbaik.</p><p>Beberapa tanggung jawab utama yang dijalankan oleh tim konsumsi meliputi:</p><ul><li><strong>Koordinasi Distribusi:</strong> Mengatur alur pembagian konsumsi agar berjalan tertib dan tidak mengganggu jalannya prosesi wisuda yang khidmat.</li><li><strong>Manajemen Logistik:</strong> Memastikan jumlah paket makanan sesuai dengan data undangan dan menangani ketersediaan konsumsi cadangan untuk tamu tambahan.</li><li><strong>Pelayanan Tamu Undangan:</strong> Memberikan layanan bagi tamu undangan penting dengan standar kesantunan yang tinggi sesuai nilai-nilai sekolah.</li><li><strong>Kebersihan Area:</strong> Memastikan area acara tetap bersih dari sisa-sisa kemasan konsumsi setelah sesi makan berakhir.</li></ul><p><strong>Kerjasama Tim Sebagai Kunci Kesuksesan</strong></p><p>Bekerja sebagai panitia konsumsi memberikan pelajaran berharga mengenai arti kerjasama tim dan komunikasi. Di tengah padatnya jadwal acara, tim harus mampu bergerak lincah dan responsif terhadap kebutuhan di lapangan. Keberhasilan acara wisuda ini menjadi bukti bahwa setiap divisi panitia, sekecil apa pun perannya, memiliki kontribusi yang sangat besar bagi kesuksesan agenda besar sekolah.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Pengalaman menjadi panitia wisuda di SMK Muhammadiyah 2 Bantul pada 13 Mei 2024 lalu memberikan kesan yang mendalam. Selain belajar tentang organisasi, tugas ini mengasah jiwa pengabdian dan keramahtamahan (hospitality). Selamat kepada para wisudawan, dan terima kasih kepada seluruh rekan panitia yang telah bahu-membahu menyukseskan acara ini.</p>', 'gambar26.jpeg'),
(19, 'Kolaborasi IPM & Hizbul Wathan: Jurid Malam Menguji Ketangguhan dan Kedisiplinan', '2026-01-19', 'celsifbina', '<p><strong>IMOGIRI</strong> – Pada tanggal <strong>19-20 Juni 2025</strong>, suasana hening di <strong>Sasana Topan Bumi Arum, Imogiri</strong> berubah menjadi penuh semangat kedermawanan dan ketangkasan. Pimpinan Ranting Ikatan Pelajar Muhammadiyah (PR IPM) bersama gerakan kepanduan Hizbul Wathan (HW) SMK Muhammadiyah 2 Bantul menggelar agenda tahunan <strong>Jurid Malam</strong>. Kegiatan ini merupakan ajang penempaan mental, fisik, dan spiritual bagi para kader di tengah alam terbuka.</p><p><strong>Manajemen Pos 1: Kesehatan dan Kesiapan sebagai Prioritas</strong></p><p>Dalam kegiatan jelajah malam ini, saya bertugas di <strong>Pos 1</strong> bersama Ibu Fahadaina, S.Pd dan Ajeng. Pos pertama ini memiliki peran yang sangat krusial karena menjadi gerbang awal pengecekan kesiapan seluruh peserta sebelum memasuki rute yang lebih menantang.</p><p>Tugas dan tanggung jawab kami di Pos 1 meliputi:</p><ul><li><strong>Screening Kesehatan:</strong> Melakukan pengecekan riwayat sakit kepada para peserta (total 11 anak pada sesi tersebut). Memastikan bahwa setiap siswa dalam kondisi fisik yang mumpuni untuk menempuh perjalanan jauh di malam hari adalah prioritas utama kami.</li><li><strong>Pengecekan Logistik:</strong> Memastikan setiap peserta membawa bekal yang cukup, terutama ketersediaan air mineral, guna mencegah dehidrasi selama kegiatan berlangsung.</li><li><strong>Sistem Penandaan (Pita Merah):</strong> Bagi peserta yang secara fisik dirasa sudah kurang sehat atau tidak kuat melanjutkan perjalanan berat, kami memberikan tanda khusus berupa <strong>lencana pita merah</strong> di lengan. Penandaan ini berfungsi agar panitia di pos-pos berikutnya memberikan pengawasan ekstra atau tindakan evakuasi jika diperlukan.</li></ul><p><strong>Sinergi IPM dan Hizbul Wathan</strong></p><p>Kolaborasi antara IPM dan Hizbul Wathan dalam Jurid Malam ini menciptakan atmosfer pendidikan karakter yang kuat. Peserta tidak hanya dilatih secara fisik melalui penjelajahan, tetapi juga diajarkan tentang kemandirian, kerjasama tim, dan keteguhan hati dalam menghadapi kegelapan dan tantangan alam.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Kegiatan yang berlangsung selama dua hari di Imogiri ini sukses mencetak kader-kader yang lebih tangguh. Pengalaman bertugas di Pos 1 memberikan saya pelajaran berharga mengenai pentingnya <i>preventive action</i> (tindakan pencegahan) dalam sebuah kegiatan lapangan. Ketelitian dalam mengecek kesehatan dan logistik adalah kunci utama agar tujuan pendidikan karakter dapat tercapai tanpa mengabaikan keselamatan peserta.</p>', 'gambar25.jpeg'),
(20, 'Dibalik Kemeriahan Jalan Sehat Milad Muhammadiyah: Perjuangan Konsumsi di Lapangan Paseban', '2023-11-12', 'celsifbina', '<p><strong>BANTUL</strong> – Lapangan Paseban Bantul memutih oleh ribuan warga Muhammadiyah yang berkumpul untuk merayakan <strong>Jalan Sehat Milad Muhammadiyah</strong> pada tanggal <strong>12 November 2023</strong>. Sorak sorai peserta dan deru langkah kaki memenuhi pusat kota Bantul dalam sebuah perayaan yang luar biasa meriah. Namun, di balik tawa para peserta, terdapat sebuah narasi perjuangan yang nyata dari barisan panitia, khususnya tim konsumsi yang bersinergi dengan semangat kepanduan <strong>Hizbul Wathan</strong>.</p><p><strong>Perjuangan Besar di Tengah Keterbatasan</strong></p><p>Menjadi bagian dari tim konsumsi dalam acara berskala massa bukan sekadar urusan membagikan paket makanan. \"Dibalik kemeriahan itu, ada perjuangan yang begitu besar,\" sebuah kalimat yang merangkum segala peluh yang tumpah di lapangan. Kami harus berjibaku memastikan ribuan paket konsumsi sampai ke tangan peserta tepat waktu.</p><p>Kondisi di lapangan saat itu menjadi ujian fisik dan mental yang luar biasa:</p><ul><li><strong>Keadaan Pengap:</strong> Berada di tengah kerumunan ribuan orang dengan sirkulasi udara yang terbatas menciptakan suasana yang sangat pengap dan menguras tenaga.</li><li><strong>Lelah, Letih, dan Lesu:</strong> Rasa lelah yang mendalam, letih karena persiapan sejak dini hari, serta kondisi fisik yang mulai lesu akibat panas matahari yang menyengat menjadi tantangan yang harus kami lawan setiap detiknya.</li><li><strong>Manajemen Logistik yang Masif:</strong> Mengatur ribuan paket di tengah desakan massa yang terus bertambah, menuntut konsentrasi penuh meski energi sudah di titik nadir.</li></ul><p><strong>Berdikari Bersama Hizbul Wathan</strong></p><p>Dalam kondisi yang serba menekan tersebut, semangat <strong>Hizbul Wathan</strong> menjadi bahan bakar utama kami untuk <strong>tetap berjuang</strong>. Jiwa kepanduan yang mengajarkan ketangguhan dan kerelaan menolong sesama membuat kami tetap berdiri tegak. Tidak ada kata menyerah; rasa lelah dikalahkan oleh rasa tanggung jawab untuk menyukseskan syiar Muhammadiyah. Sinergi antar panitia menjadi kunci utama agar tidak ada satu pun peserta yang terlewatkan.</p><p><strong>Kesimpulan dan Refleksi</strong></p><p>Kegiatan Jalan Sehat di Lapangan Paseban ini memberikan pelajaran berharga bahwa kesuksesan sebuah acara besar dibangun di atas pondasi kerja keras mereka yang mau berlelah-lelah di balik layar. Menjadi panitia konsumsi mengajarkan kami arti kesabaran dan keikhlasan yang sesungguhnya. Kemeriahan Milad adalah milik semua, namun perjuangan di baliknya adalah kehormatan dan kebanggaan bagi kami yang memilih untuk tetap berjuang hingga akhir.</p><p><br>&nbsp;</p><p>&nbsp;</p>', 'gambar24.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int NOT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `tahun`, `sekolah`, `jurusan`) VALUES
(1, '2023-2026', 'SMK Muhammadiyah 2 Bantul', 'Pengembangan Perangkat Lunak & Gim'),
(2, '2025', 'Universitas Teknologi Digital Indonesia', 'prakerin'),
(4, '2026', 'PT Lauwba Techno Indonesia', 'prakerin');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `no_hp`, `isi_pesan`, `tanggal`, `status`) VALUES
(2, 'dami', 'dami@gamil.com', NULL, 'We were destined to meet, not together', '2026-01-16 09:12:05', 1),
(8, 'sea', 'sea@gamil.com', NULL, 'heyy, stranger how are you', '2026-01-20 23:19:17', 1),
(19, 'saviera', 'saviera@gmail.com', NULL, 'yaaaa, everything will be beautiful in its time', '2026-01-21 19:02:04', 1),
(34, 'sea', 'seanareswary@gmail.com', '081393623591', 'haiii kawan', '2026-01-26 00:30:44', 2),
(35, 'fredella', 'fredella@gmail.com', '1234567890', 'haiii ayok main', '2026-01-26 00:31:35', 1),
(36, 'jessica', 'jessica@gmail.com', '0987654321', 'anna ayok mainnn pulang pkl hehheh', '2026-01-26 00:32:38', 1),
(37, 'nilam', 'nilam@gmail.com', '088215419301', 'hallo', '2026-01-26 00:41:46', 2),
(38, 'celsi', 'celsi@gmail.com', '081393623421', 'HAIIIIIIIII', '2026-01-26 01:28:33', 1),
(39, 'user', 'user@gmail.com', '081393623591', 'haiiii', '2026-03-16 14:54:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `nama_project`, `foto`, `deskripsi`, `tanggal`) VALUES
(2, 'porotofolio dahboard admin', 'Screenshot 2026-01-22 131707.png', 'Pengembangan sistem informasi berbasis web yang berfokus pada kemudahan manajemen data', '2026-01-19 03:14:31'),
(4, 'Portofolio', 'Screenshot 2026-01-22 131204.png', 'proyek ini adalah pembangunan website portfolio responsif menggunakan PHP Native dan Bootstrap 5 yang dirancang untuk menampilkan karya, artikel blog, serta profil profesional secara dinamis dan terintegrasi dengan database MySQL.', '2026-01-21 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `nama_skill` varchar(50) NOT NULL,
  `persen` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `nama_skill`, `persen`) VALUES
(1, 'HTML & CSS', 90),
(2, 'PHP & MySQL', 80),
(5, 'Bootstrap', 85);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
