<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\Libur;
use App\Models\Payroll;
use App\Models\UserShift;
use App\Models\PayrollParent;
use App\Models\Shift;
use App\Models\ShiftHari;
use Illuminate\Support\Facades\Http;

function btnDelete()
{
   return "#e34b4b";
}
function btnTerima()
{
   return "#38a877";
}
function btnTolak()
{
   return "#e34b4b";
}

function nomorUrut($int)
{
   $no = 1;
   if ($int) {
      $latest = sprintf("%03s", abs($int + 1));
   } else {
      $latest = sprintf("%03s", $no);
   }
   return $latest;
}

function bulanRomawi()
{
   $a = Carbon::now();
   $romawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
   $b = $romawi[$a->month];
   return $b;
}

function hapusTitikAngka($int)
{
   $a = str_replace(".", "", $int);
   return $a;
}

function rupiah($nilai, $pecahan = 0)
{
   return "Rp. " . number_format($nilai, $pecahan, ',', '.');
}

function pecahTanpaRp($nilai, $pecahan = 0)
{
   return number_format($nilai, $pecahan, ',', '.');
}

function ubahAngka($str)
{
   $a = (int) $str;
   return $a;
}

function penomoranSurat($kode, $urut, $init, $bulan, $tahun)
{
   $nomor = $kode . '' . $urut . '/' . $init . '/' . $bulan . '/' . $tahun;
   return $nomor;
}

function penyebut($nilai)
{
   $nilai = abs($nilai);
   $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
   $temp = '';
   if ($nilai < 12) {
      $temp = ' ' . $huruf[$nilai];
   } elseif ($nilai < 20) {
      $temp = penyebut($nilai - 10) . ' belas';
   } elseif ($nilai < 100) {
      $temp = penyebut($nilai / 10) . ' puluh' . penyebut($nilai % 10);
   } elseif ($nilai < 200) {
      $temp = ' seratus' . penyebut($nilai - 100);
   } elseif ($nilai < 1000) {
      $temp = penyebut($nilai / 100) . ' ratus' . penyebut($nilai % 100);
   } elseif ($nilai < 2000) {
      $temp = ' seribu' . penyebut($nilai - 1000);
   } elseif ($nilai < 1000000) {
      $temp = penyebut($nilai / 1000) . ' ribu' . penyebut($nilai % 1000);
   } elseif ($nilai < 1000000000) {
      $temp = penyebut($nilai / 1000000) . ' juta' . penyebut($nilai % 1000000);
   } elseif ($nilai < 1000000000000) {
      $temp = penyebut($nilai / 1000000000) . ' milyar' . penyebut(fmod($nilai, 1000000000));
   } elseif ($nilai < 1000000000000000) {
      $temp = penyebut($nilai / 1000000000000) . ' trilyun' . penyebut(fmod($nilai, 1000000000000));
   }
   return $temp;
}

function terbilang($nilai)
{
   if ($nilai < 0) {
      $hasil = 'minus ' . trim(penyebut($nilai));
   } else {
      $hasil = trim(penyebut($nilai));
   }
   return $hasil;
}
function removeNol($angka)
{
   $angkaTanpaNol = str_replace("0", "", $angka);
   return $angkaTanpaNol;
}
function tambahNol($angka)
{
   if (strlen($angka) == 1) {
      $angkaDenganNol = "0" . $angka;
   } else {
      $angkaDenganNol = $angka;
   }
   return $angkaDenganNol;
}

function getDay($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('dddd');
}
function tanggalIndo($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('dddd, LL');
}
function tanggalIndo2($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('dddd, ll');
}
function tanggalIndoWaktu($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('ll HH:mm');
}
function tanggalIndoWaktu2($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('dddd, ll HH:mm');
}
function tanggalIndoWaktu3($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('LL HH:mm');
}
function tanggalIndoWaktuLengkap($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('dddd, LL HH:mm');
}
function tglIndo2($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('L');
}
function tanggalIndo3($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('ll');
}
function tglIndo4($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('LL');
}
function tglIndo5($date)
{
   $datetime = new DateTime($date);
   $newdate = $datetime->format(' d M Y ');
   return $newdate;
}
function TampilJamMenit($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('HH:mm');
}
function TampilTanggal($date)
{
   return Carbon::parse($date)->locale('id')->format('Y-m-d');
}
function TanggalBulan($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('D MMM');
}
function BulanTahun($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('MMMM Y');
}
function TanggalOnly($date)
{
   $tanggal = Carbon::parse($date)->locale('id')->format('d');
   $tgl     = ltrim($tanggal, '0');
   return $tgl;
}
function BulanOnly($date)
{
   return Carbon::parse($date)->locale('id')->isoFormat('MMM');
}
function ago($date)
{
   return Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
}
function hoursandmins($time, $format = '%02d:%02d')
{
   if ($time < 1) {
      return;
   }
   $hours = floor($time / 60);
   $minutes = ($time % 60);
   return sprintf($format, $hours, $minutes);
}
function telat($start_time, $finish_time, $shift)
{
   if ($shift == "L") {
      echo "<span>-</span>";
   } else {
      $jamawal        = Carbon::parse($start_time);
      $jamakhir       = Carbon::parse($finish_time);
      $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
      $jam_menit      = hoursandmins($totalDuration, '%0dj, %02dm');

      if ($totalDuration > 1) {
         echo "<span class='text-danger'>" . $jam_menit . "</span>";
      } else {
         echo "<span>On time</span>";
      }
   }
}
function JamOnly($date)
{
   if ($date != null) {
      $jam    = Carbon::parse($date)->locale('id')->isoFormat('HH');
      $jam2   = str_replace("0", "", $jam);
   } else {
      $jam2 = 0;
   }
   return $jam2;
}
function Bulan($date)
{
   $dateObj   = DateTime::createFromFormat('!m', $date);
   return Carbon::parse($dateObj)->locale('id')->isoFormat('MMMM');
}
function BulanEng($date)
{
   $dateObj   = DateTime::createFromFormat('!m', $date);
   return Carbon::parse($dateObj)->isoFormat('MMMM');
}
function converttanggal($date)
{
   $temp = explode("-", $date);
   $tahun = $temp[0];
   $bl = $temp[1];
   $tanggal = $temp[2];
   $waktu = $bl . "/" . $tanggal . "/" . $tahun;
   return $waktu;
}
function inverttanggal($date)
{
   if ($date == "") {
      $tgl_ukur_bener = "0000-00-00";
   } else {
      $temp           = explode("/", $date);
      $bl             = $temp[0];
      $tanggal        = $temp[1];
      $tahun          = $temp[2];
      $tgl_ukur_bener = $tahun . "-" . $bl . "-" . $tanggal;
   }
   return str_replace(' ', '', $tgl_ukur_bener);
}
function ubahKeTanggal($datetime)
{
   $tanggal = date("Y-m-d", strtotime($datetime));
   return $tanggal;
}
function cvtdMYtoYmd($hari)
{
   $dates       = DateTime::createFromFormat('d M Y', $hari);
   $dama        = $dates->format('Y-m-d');
   return $dama;
}
function masaKerja($tanggal)
{
   $awal  = new DateTime($tanggal);
   $akhir = new DateTime();
   $diff  = $awal->diff($akhir);
   $tahun = $diff->y . ' tahun, ';
   $bulan = $diff->m . ' bulan';
   $hari  = $diff->d . ' hari, ';
   $jam   = $diff->h . ' jam, ';
   $menit = $diff->i . ' menit, ';
   $detik = $diff->s . ' detik, ';
   $masakerja = $tahun . $bulan;
   return $masakerja;
}
function jumTanggalExpired($awal, $akhir)
{
   $awal  = Carbon::parse($awal);
   $akhir = Carbon::parse($akhir);
   $diff  = $awal->diffInDays($akhir, false);
   return $diff;
}
function getTahunKerja($tanggal)
{
   $awal  = new DateTime($tanggal);
   $akhir = new DateTime();
   $diff  = $awal->diff($akhir);
   $tahun = $diff->y;
   return $tahun;
}
function selisihJam($awal, $akhir)
{
   $awal  = Carbon::parse($awal);
   $akhir = Carbon::parse($akhir);
   $diff  = $akhir->diffInMinutes($awal);
   return $diff;
}
function hariKerja($user, $tahun, $bulan)
{
   $data       = UserShift::leftJoin('shifts', 'user_shifts.id_user_shift', '=', 'shifts.id')
      ->where('shifts.nama_shift', '!=', "L")
      ->where('id_user', $user)
      ->whereYear('tanggal_shift', $tahun)
      ->whereMonth('tanggal_shift', $bulan)
      ->count();
   return $data;
}
function getShift($id)
{
   $data       = UserShift::leftJoin('shifts', 'user_shifts.id_user_shift', '=', 'shifts.id')
      ->where('user_shifts.id_shift', $id)->first();
   $namaShift = $data->nama_shift;
   return $namaShift;
}
function namaCabang($id_cabang)
{
   $cb = Cabang::where('id', $id_cabang)->first();
   return $cb->cabang_nama;
}
function jumUser($id_admin)
{
   $usr = User::where('id_admin', $id_admin)->count('id');
   return $usr;
}
function jumCabang($id_admin)
{
   $cb = Cabang::where('id_admin', $id_admin)->count('id');
   return $cb;
}
function namaUser($id_user)
{
   $usr = User::where('id', $id_user)->first();
   return $usr->nama;
}
function jumHadir($user, $tahun, $bulan)
{
   $data       = Absensi::whereYear('jam_hadir', $tahun)->whereMonth('jam_hadir', $bulan)->where('id_user', $user)->count();
   return $data;
}

function namaDivisi($id)
{
   if ($id != null) {
      $cb = Divisi::where('div_id', $id)->first();
      return $cb->div_title;
   } else {
      return "-";
   }
}

function getShiftHarian($id_user, $hari, $param)
{
   $usr       = User::select('shift_day')->where('id', $id_user)->first();
   $shifthari = ShiftHari::where('id', $usr->shift_day)->first();
   switch ($hari) {
      case 'Senin':
         $hasil  = $shifthari->shiftSn->$param;
         break;
      case 'Selasa':
         $hasil  = $shifthari->shiftSl->$param;
         break;
      case 'Rabu':
         $hasil  = $shifthari->shiftRb->$param;
         break;
      case 'Kamis':
         $hasil  = $shifthari->shiftKm->$param;
         break;
      case 'Jumat':
         $hasil  = $shifthari->shiftJm->$param;
         break;
      case 'Sabtu':
         $hasil  = $shifthari->shiftSb->$param;
         break;
      case 'Minggu':
         $hasil  = $shifthari->shiftMg->$param;
         break;
      default:
         $hasil  = "-";
         break;
   }
   return $hasil;
}

function tepatWaktu($user, $tahun, $bulan)
{
   $hitung     = 0;
   $data       = Absensi::whereYear('jam_hadir', $tahun)->whereMonth('jam_hadir', $bulan)->where('id_user', $user)->get();
   foreach ($data as $d) {
      $jam_hadir   = $d->jam_hadir;
      $tgl_absen   = TampilTanggal($d->jam_hadir);
      $dt_shift    = UserShift::where('tanggal_shift', $tgl_absen)->where('id_user', $user);
      $hit_shift   = $dt_shift->count();
      if ($hit_shift > 0) {
         $cek_shift   = $dt_shift->first();
         $jam_shift   = $cek_shift->shift->hadir_shift;
         $waktu_shift = $tgl_absen . " " . $jam_shift;
         if ($cek_shift->shift->dayoff != "yes") {
            $jamawal        = Carbon::parse($waktu_shift);
            $jamakhir       = Carbon::parse($jam_hadir);
            $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
            if ($totalDuration <= 0) {
               $hitung++;
            }
         }
      }
   }
   return $hitung;
}
function tepatWaktuDaily($date, $id_admin)
{
   $hitung     = 0;
   $user       = User::where('id_admin', $id_admin)->where('is_admin', 0)->where('status', 'active')->pluck('id')->toArray();
   $data       = Absensi::whereDate('jam_hadir', $date)->whereIn('id_user', $user)->get();
   foreach ($data as $d) {
      $id_user     = $d->id_user;
      $jam_hadir   = $d->jam_hadir;
      $dt_shift    = UserShift::where('tanggal_shift', $date)->where('id_user', $id_user);
      $hit_shift   = $dt_shift->count();
      if ($hit_shift > 0) {
         $cek_shift   = $dt_shift->first();
         $jam_shift   = $cek_shift->shift->hadir_shift;
         $waktu_shift = $date . " " . $jam_shift;
         if ($cek_shift->shift->dayoff != "yes") {
            $jamawal        = Carbon::parse($waktu_shift);
            $jamakhir       = Carbon::parse($jam_hadir);
            $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
            if ($totalDuration <= 0) {
               $hitung++;
            }
         }
      }
   }
   return $hitung;
}

function terlambat($user, $tahun, $bulan)
{
   $hitung     = 0;
   $data       = Absensi::whereYear('jam_hadir', $tahun)->whereMonth('jam_hadir', $bulan)->where('id_user', $user)->get();
   foreach ($data as $d) {
      $jam_hadir   = $d->jam_hadir;
      $tgl_absen   = TampilTanggal($d->jam_hadir);
      $dt_shift    = UserShift::where('tanggal_shift', $tgl_absen)->where('id_user', $user);
      $hit_shift   = $dt_shift->count();
      if ($hit_shift > 0) {
         $cek_shift   = $dt_shift->first();
         $jam_shift   = $cek_shift->shift->hadir_shift;
         $waktu_shift = $tgl_absen . " " . $jam_shift;
         if ($cek_shift->shift->dayoff != "yes") {
            $jamawal        = Carbon::parse($waktu_shift);
            $jamakhir       = Carbon::parse($jam_hadir);
            $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
            if ($totalDuration > 0) {
               $hitung++;
            }
         }
      }
   }
   return $hitung;
}
function terlambatDaily($date, $id_admin)
{
   $hitung     = 0;
   $user       = User::where('id_admin', $id_admin)->where('is_admin', 0)->where('status', 'active')->pluck('id')->toArray();
   $data       = Absensi::whereDate('jam_hadir', $date)->whereIn('id_user', $user)->get();
   foreach ($data as $d) {
      $id_user     = $d->id_user;
      $jam_hadir   = $d->jam_hadir;
      $dt_shift    = UserShift::where('tanggal_shift', $date)->where('id_user', $id_user);
      $hit_shift   = $dt_shift->count();
      if ($hit_shift > 0) {
         $cek_shift   = $dt_shift->first();
         $jam_shift   = $cek_shift->shift->hadir_shift;
         $waktu_shift = $date . " " . $jam_shift;
         if ($cek_shift->shift->dayoff != "yes") {
            $jamawal        = Carbon::parse($waktu_shift);
            $jamakhir       = Carbon::parse($jam_hadir);
            $totalDuration  = $jamawal->diffInMinutes($jamakhir, false);
            if ($totalDuration > 0) {
               $hitung++;
            }
         }
      }
   }
   return $hitung;
}

function mangkir($user, $tahun, $bulan)
{
   $id_admin = Auth::user()->id_admin;
   $mangkir  = 0;
   $dtuser   = User::where('id', $user)->first();
   $jumHari  = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
   $s_libur  = Shift::where('id_admin', $id_admin)->where('dayoff', 'yes')->pluck('id')->toArray();

   for ($i = 1; $i <= $jumHari; $i++) {
      $date     = $tahun . "-" . $bulan . "-" . $i;
      $data     = UserShift::where('id_user', $user)->whereDate('tanggal_shift', $date)->whereNotIn('id_user_shift', $s_libur)->get();
      if (count($data) != 0) {
         foreach ($data as $d) {
            if ($d->shift->dayoff != 'yes') {
               $tgl        = $d->tanggal_shift;
               $id_user    = $d->id_user;
               $cekAbsen   = Absensi::where("id_user", $id_user)->whereDate('jam_hadir', $tgl)->count();
               // dd($cekAbsen);
               $cekCuti    = Cuti::with('cutiJenis')->where('id_user', $id_user)->where('cuti_awal', '<=', $date)->where('cuti_akhir', '>=', $date)->where('cuti_status', 'DITERIMA')->get()->count();
               if ($cekAbsen <= 0 && $cekCuti <= 0) {
                  $mangkir++;
               }
            }
         }
      } else {
         if ($dtuser->shift_day != null) {
            $hariNama   = getDay($date);
            $libur      = getShiftHarian($dtuser->id, $hariNama, 'dayoff');
            if ($libur != 'yes') {
               $cekAbsen   = Absensi::where("id_user", $dtuser->id)->whereDate('jam_hadir', $date)->count();
               $cekCuti    = Cuti::with('cutiJenis')->where('id_user', $dtuser->id)->where('cuti_awal', '<=', $date)->where('cuti_akhir', '>=', $date)->where('cuti_status', 'DITERIMA')->get()->count();
               $data_libur = Libur::whereDate('tgl_libur', $date)->count();
               if ($cekAbsen <= 0 && $cekCuti <= 0 && $data_libur <= 0) {
                  $mangkir++;
               }
            }
         }
      }
   }
   return $mangkir;
}
function mangkirDaily($date, $id_admin)
{
   $hari     = getDay($date);
   $mangkir  = 0;
   $user     = User::where('id_admin', $id_admin)->where('is_admin', 0)->where('status', 'active')->get();
   $s_libur  = Shift::where('id_admin', $id_admin)->where('dayoff', 'yes')->pluck('id')->toArray();

   foreach ($user as $u) {
      $data     = UserShift::where('id_user', $u->id)->whereDate('tanggal_shift', $date)->get();
      if (count($data) != 0) {
         foreach ($data as $d) {
            if ($d->shift->dayoff != 'yes') {
               $tgl        = $d->tanggal_shift;
               $id_user    = $d->id_user;
               $cekAbsen   = Absensi::where("id_user", $id_user)->whereDate('jam_hadir', $tgl)->count();
               $cekCuti    = Cuti::with('cutiJenis')->where('id_user', $id_user)->where('cuti_awal', '<=', $date)->where('cuti_akhir', '>=', $date)->where('cuti_status', 'DITERIMA')->get()->count();
               if ($cekAbsen <= 0 && $cekCuti <= 0) {
                  $mangkir++;
               }
            }
         }
      } else {
         if ($u->shift_day != null) {
            $libur      = getShiftHarian($u->id, $hari, 'dayoff');
            if ($libur != 'yes') {
               $cekAbsen   = Absensi::where("id_user", $u->id)->whereDate('jam_hadir', $date)->count();
               $cekCuti    = Cuti::with('cutiJenis')->where('id_user', $u->id)->where('cuti_awal', '<=', $date)->where('cuti_akhir', '>=', $date)->where('cuti_status', 'DITERIMA')->get()->count();
               $data_libur = Libur::whereDate('tgl_libur', $date)->count();
               if ($cekAbsen <= 0 && $cekCuti <= 0 && $data_libur <= 0) {
                  $mangkir++;
               }
            }
         }
      }
   }

   return $mangkir;
}

function CekThr($id_staff, $cabang)
{
   $tahunini   = date("Y");
   $cek        = PayrollParent::where('pay_cabang', $cabang)->where('pay_tahun', $tahunini)->where('payroll_tipe', 'THR')->get();
   $jumThr     = 0;
   if (count($cek) === 0) {
      foreach ($cek as $c) {
         $idPayroll  = $c->id;
         $cek2       = Payroll::select(['pay_pokok'])->where('id_user', $id_staff)->where('id_payroll', $idPayroll)->first();
         $thr_before = $cek2->pay_pokok;
         $jumThr     = $jumThr + $thr_before;
      }
   } else {
      $jumThr = 0;
   }
   return $jumThr;
}
function generateToken($url, $method)
{
   // $gajigesa_url = env('GAJIGESA_API_URL');
   // $data = Http::get($gajigesa_url.'generateV2?path=' . $url . '&serverKey=' . env('GAJIGESA_SERVER_KEY') . '&method=' . $method);
   // return json_decode($data);
   $gajigesa_url = env('GAJIGESA_API_URL') . 'generateV2?path=' . $url . '&serverKey=' . env('GAJIGESA_SERVER_KEY') . '&method=' . $method;
   $data = Http::get($gajigesa_url);
   return json_decode($data);
}

function mkInitial1($string)
{
   $str2 = substr($string, 4);
   $words = explode(" ", $str2);
   $acronym = "";

   foreach ($words as $w) {
      $acronym .= mb_substr($w, 0, 1);
   }
   return $acronym;
}

function mkInitial2($string)
{
   $words = explode(" ", $string);
   $acronym = "";

   foreach ($words as $w) {
      $acronym .= mb_substr($w, 0, 1);
   }
   return $acronym;
}

function intToTime($int)
{
   $date = date("Y-m-d H:i:s", $int);
   return Carbon::parse($date);
}
function intToMonth($int)
{
   $date = date("m", $int);
   return $date;
}
function intToYear($int)
{
   $date = date("Y", $int);
   return $date;
}

function hitungCuti($id, $tahun)
{
   $sisaCuti   = App\Models\Cuti::where('id_user', $id)->where('cuti_status', 'DITERIMA')->whereYear('approved_date', $tahun ?? date('Y'))->sum('cuti_total');
   return 12 - (int) $sisaCuti;
}

function diffHuman($date)
{
   return Carbon::parse($date)->diffForHumans();
}

function kirimWa($title)
{
   $data = [
      'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
      'sender'  => '6212345',
      'number'  => '085156432635',
      'message' => 'Terdapat 1 ' . $title . ' Baru a/n: ' . Auth::user()->nama . '. bertugas di ' . Auth::user()->cabang->cabang_nama
   ];

   $curl = curl_init();
   curl_setopt_array(
      $curl,
      array(
         CURLOPT_URL => "https://app.wa-smartwork.masuk.web.id/app/api/send-message",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => json_encode($data)
      )
   );

   $response = curl_exec($curl);
   curl_close($curl);
   return $response;
}
