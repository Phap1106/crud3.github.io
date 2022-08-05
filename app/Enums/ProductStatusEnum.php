<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductStatusEnum extends Enum
{
  public const CON_HANG = 0;
  public const DANG_VE = 1;
  public const HET_HANG = 2;

  public static function getArrayView():array{
    return[
        'Đi học' => self::CON_HANG,
        'Đang về'=>self::DANG_VE,
        'Hết hàng'=>self::HET_HANG,
    ];
  }
}
