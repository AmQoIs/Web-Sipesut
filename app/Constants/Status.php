<?php

namespace App\Constants;

class Status
{
  public const BELUM_DICEK = 'BELUM_DICEK';
  public const DITERIMA = 'DITERIMA';
  public const DITOLAK = 'DITOLAK';
  public const REVISI = 'REVISI';

  public static function allStatus()
  {
    return [
      self::BELUM_DICEK => 'Belum Dicek',
      self::DITERIMA => 'Diterima',
      self::DITOLAK => 'Ditolak',
      self::REVISI => 'Revisi',
    ];
  }
}
