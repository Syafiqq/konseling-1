<?php

use App\Eloquent\Question;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2017, 2:55 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['category' => 1, 'favour' => 1, 'question' => 'Saya sudah memiliki gambaran perguruan tinggi mana yang saya tuju setelah lulus.'],
            ['category' => 1, 'favour' => 1, 'question' => 'Semester Gasal ini, saya mendapatkan peringkat 5 besar'],
            ['category' => 1, 'favour' => 1, 'question' => 'Saya belajar dengan sungguh-sungguh agar bisa mendapatkan beasiswa'],
            ['category' => 1, 'favour' => 1, 'question' => 'Saya mengikuti lomba agar pengalaman saya bertambah'],
            ['category' => 1, 'favour' => 1, 'question' => 'Ulangan saya  mendapatkan nilai minimal 80'],
            ['category' => 2, 'favour' => 1, 'question' => 'Saya mengoptimalkan waktu luang belajar agar nilai akademik saya bertahan.'],
            ['category' => 2, 'favour' => 1, 'question' => 'Dalam satu pekan saya membaca minimal 2 buku pelajaran'],
            ['category' => 2, 'favour' => 1, 'question' => 'Tugas saya selesai maksimal 2 hari sebelum pengumpulan'],
            ['category' => 2, 'favour' => 1, 'question' => 'Saya menggunakan waktu luang  bermain daripada belajar'],
            ['category' => 2, 'favour' => 1, 'question' => 'Saya lebih memilih belajar daripada pergi nonton  dengan teman-teman'],
            ['category' => 2, 'favour' => 1, 'question' => 'Saya tetap belajar walaupun diminta membantu orangtua'],
            ['category' => 2, 'favour' => 1, 'question' => 'Saya tetap belajar ketika sedang rapat di organisasi'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya belajar sesuai dengan jadwal yang telah saya susun'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya membuat ringkasan materi pelajaran'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya belajar setelah pulang sekolah'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya sudah mempelajari materi yang akan dibahas dikelas'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya mngerjakan tugas dengan serius jika akan dikumpulkan '],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya akan bermain tebak-tebakan yang berisi materi pelajaran dengan teman untuk menguji ingatan belajar saya'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya istirahat selama 15 menit ketika sudah belajar selama 1 jam'],
            ['category' => 3, 'favour' => 1, 'question' => 'Sebelum belajar, saya menyiapkan semua perlengkapan yang saya butuhkan '],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya  duduk di depan agar fokus ketika guru sedang menerangkan'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya membuat peta konsep agar saya lebih faham dengan materi'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya mengerjakan soal-soal latihan mengetahui seberapa kemampuan saya'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya lebih memahami materi pelajaran apabila diberikan contoh'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya mencatat informasi apapun yang saya dapatkan di kelas'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya cenderung memahami pelajaran dengan berlatih langsung mengerjakan soal-soal'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya cenderung memahami pelajaran dengan cara mendengarkan penjelasan guru atau teman'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya meminta pendapat orangtua mengenai keputusan saya  memilih jurusan '],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya memikirkan dengan matang   keputusan yang akan saya ambil.'],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya meminta pendapat orangtua saya ketika akan mengambil keputusan  mengikuti les '],
            ['category' => 3, 'favour' => 1, 'question' => 'Saya meminta pendapat orang tua dan guru dalam membuat prioritas antar kegiatan akademik yang saya ikuti'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya membuat jadwal kegiatan sehari-hari'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya membuat jadwal  mengerjakan tugas-tugas'],
            ['category' => 4, 'favour' => 1, 'question' => 'Agar saya bisa belajar dengan teratur, saya membuat rancangan belajar per minggu'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya membuat jadwal liburan di akhir pekan agar tidak jenuh belajar '],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya menata ulang jadwal apabila jadwal yang sudah saya buat kurang sesuai'],
            ['category' => 4, 'favour' => 1, 'question' => 'Kegiatan saya cenderung teratur karena sudah terjadwal dengan baik'],
            ['category' => 4, 'favour' => 1, 'question' => 'Sekalipun kegiatan saya menumpuk, saya tetap bisa membagi waktu pengerjaan tugas dan belajar.'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya mengisi waktu luang sepulang sekolah dengan belajar'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya mengisi waktu luang sepulang sekolah dengan bermain game'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya mengikuti les agar saya lebih paham materi pelajaran '],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya pergi ke perpustakaan ketika jam kosong'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya berdiskusi materi pelajaran dengan teman ketika jam kosong.'],
            ['category' => 4, 'favour' => 1, 'question' => 'Saya belajar jika disuruh orang tua.'],
            ['category' => 4, 'favour' => 1, 'question' => 'Waktu belajar saya, saya gunakan  menonton televisi'],
            ['category' => 4, 'favour' => 1, 'question' => 'Walaupun sudah liburan, saya tetap mempelajari ulang materi yang diajarkan agar saya tidak lupa'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya pergi ke perpustakaan membaca buku'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya bertanya kepada guru ketika saya tidak paham mengenai materi pelajaran'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya berdiskusi dengan teman-teman di kelas mengenai materi-materi yang telah diajarkan'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya menggunakan internetmencari informasi pengetahuan/pelajaran'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya membeli buku sesuai dengan materi pelajaran saya'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya rutin membaca koran agar wawasan saya bertambah'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya faham dengan materi apabila dijelaskan secara detail dan berulang kali'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya tanya kepada kakak kelas jika saya belum faham dengan materi yang diajarkan'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya mencatat semua apa yang diterangkan oleh Guru'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya meminjam buku pelajaran kakak kelas untuk menambah referensi materi pelajaran.'],
            ['category' => 5, 'favour' => 1, 'question' => ' Saya langsung melakukan percobaan di rumah apabila mendapatkan materi yang menarik'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya memastikan buku sumber rujukan yang saya gunakan tepat'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya berpendapat saat diskusi di dalam kelas'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya mengangkat tangan sebelum menyampaikan pendapat saat diskusi di dalam kelas'],
            ['category' => 5, 'favour' => 1, 'question' => 'Teman saya memahami apa yang saya ucapkan'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya berbicara sopan kepada semua orang'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya dapat menyimpulkan pendapat teman saya dengan tepat'],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya mengangkat tangan sebelum menyampaikan pendapat'],
            ['category' => 5, 'favour' => 1, 'question' => 'Pendapat saya diterima teman-teman '],
            ['category' => 5, 'favour' => 1, 'question' => 'Saya merasa tenang ketika presentasi'],
            ['category' => 6, 'favour' => 1, 'question' => 'Ketika keputusan saya mengikuti organisasi mengganggu jam belajar, saya akan membuat jadwal ulang kegiatan belajar'],
            ['category' => 6, 'favour' => 1, 'question' => 'Ketika keputusan saya mengikuti ektrakulikuler membuat nilai saya jelek, saya akan berdiskusi dengan orangtua'],
            ['category' => 6, 'favour' => 1, 'question' => 'Jika saya tidak belajar pada malam hari, saya akan belajar pada pagi hari setelah bangun tidur'],
            ['category' => 6, 'favour' => 1, 'question' => 'Jika di perpustakaan sekolah tidak ada buku yang saya butuhkan, saya akan mencarinya di perpustakaan kota'],
            ['category' => 6, 'favour' => 1, 'question' => 'Jika saya kurang memahami materi pelajaran dari buku, saya akan mencari materi tersebut di internet'],
            ['category' => 6, 'favour' => 1, 'question' => 'Jika saya tidak faham dengan materi yang dijelaskan oleh Guru, saya meminta teman saya menerangkan kembali materi tersebut'],
            ['category' => 6, 'favour' => 1, 'question' => 'Saya mengumpulkan tugas tepat waktu'],
            ['category' => 6, 'favour' => 1, 'question' => 'Nilai saya  melampaui KKM (Kriteria Ketuntasan Minimal)'],
            ['category' => 6, 'favour' => 1, 'question' => 'Setiap kenaikan kelas, saya naik kelas'],
            ['category' => 6, 'favour' => 1, 'question' => 'Saya  mengikuti ulangan harian'],
            ['category' => 6, 'favour' => 1, 'question' => 'Saya menaati tata tertib sekolah'],
            ['category' => 6, 'favour' => 1, 'question' => 'Saya berhasil menyelesaikan tugas mata pelajaran yang besifat praktik '],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new Question();
        foreach ($data as $category)
        {
            if (!$model->where('question', '=', $category['question'])->first())
            {
                $model->insert($category);
            }
        }
    }
}

?>
