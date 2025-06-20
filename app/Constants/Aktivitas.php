<?php

namespace App\Constants;

class Aktivitas
{
  public const UPLOAD = 'UPLOAD';
  public const LIHAT = 'LIHAT';
  public const UBAH = 'UBAH';
  public const HAPUS = 'HAPUS';
  public const MINTA_REVISI = 'MINTA_REVISI';
  public const REVISI = 'REVISI';
  public const TOLAK = 'TOLAK';
  public const TERIMA = 'TERIMA';

  public static function allAktivitas()
  {
    return [
      self::UPLOAD => 'Upload',
      self::LIHAT => 'Lihat',
      self::UBAH => 'Ubah',
      self::HAPUS => 'Hapus',
      self::MINTA_REVISI => 'Minta revisi',
      self::REVISI => 'Revisi',
      self::TOLAK => 'Tolak,',
      self::TERIMA => 'Terima',
    ];
  }
}
