<?php

namespace App\Constants;

class TipeSurat
{
  public const SURAT_BIASA = 'SURAT_BIASA';
  public const NOTA_DINAS = 'NOTA_DINAS';
  public const SURAT_PERINTAH = 'SURAT_PERINTAH';
  public const SURAT_EDARAN = 'SURAT_EDARAN';

  public static function allTipeSurat()
  {
    return [
      self::SURAT_BIASA => 'Surat Biasa',
      self::NOTA_DINAS => 'Nota Dinas',
      self::SURAT_PERINTAH => 'Surat Perintah',
      self::SURAT_EDARAN => 'Surat Edaran',
    ];
  }
}
