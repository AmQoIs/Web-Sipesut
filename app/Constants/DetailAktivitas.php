<?php

namespace App\Constants;

class DetailAktivitas
{
  public const UPLOAD = 'Menambahkan_surat_baru';
  public const LIHAT = 'Melihat_surat';
  public const UBAH = 'Mengubah_surat';
  public const HAPUS = 'Menghapus_surat';
  public const MINTA_REVISI = 'Meminta_revisi_pada_surat';
  public const REVISI = 'Memberi_revisi_pada surat';
  public const TOLAK = 'Menolak_surat';
  public const TERIMA = 'Menerima_surat';

  public static function allDetailAktivitas()
  {
    return [
      self::UPLOAD => 'menambahkan surat baru',
      self::LIHAT => 'melihat surat',
      self::UBAH => 'mengubah surat',
      self::HAPUS => 'menghapus surat',
      self::MINTA_REVISI => 'meminta revisi pada surat',
      self::REVISI => 'memberi revisi pada surat',
      self::TOLAK => 'menolak surat',
      self::TERIMA => 'menerima surat',
    ];
  }
}
