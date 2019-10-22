<?php
// Контент файла встроен в функцию fillDb in functions

// Данный файл предназначен для автоматической записи файлов в базу данных
$db = @mysqli_connect(HOST,USER,PASS,DB) or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
$small_arr = array_splice(scandir(fileSmallPath), 2);

// Автоматический заполняем таблицу беря данные из filesPath
for ($i = 0; $i <= count($small_arr); $i++) {
  // присваиваем имя и путь к папкам
  $rand = rand(23,500);
  $randP = rand(150,999);
  $desc = Lorem::ipsum(1);
  $desc = substrwords($desc,100);
  $sql = "INSERT INTO goods (id, views, name, description, price) 
          VALUES ('$i','$rand','image $i','$desc', '$randP')";
  echo $sql . '<br>';
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function substrwords($text, $maxchar, $end='') {
  if (strlen($text) > $maxchar || $text == '') {
    $words = preg_split('/\s/', $text);
    $output = '';
    $i      = 0;
    while (1) {
      $length = strlen($output)+strlen($words[$i]);
      if ($length > $maxchar) {
        break;
      }
      else {
        $output .= " " . $words[$i];
        ++$i;
      }
    }
    $output .= $end;
  }
  else {
    $output = $text;
  }
  return $output;
}

abstract class Lorem {
  public static function ipsum($nparagraphs) {
    $paragraphs = [];
    for($p=0; $p<$nparagraphs; ++$p) {
      $nsentences = random_int(3,8);
      $sentences = [];
      for($s=0; $s<$nsentences; ++$s) {
        $frags = [];
        $commaChance = .33;
        while(true) {
          $nwords = random_int(3, 15);
          $words = self::random_values(self::$lorem, $nwords);
          $frags[] = implode(' ', $words);
          if(self::random_float() >= $commaChance) {
            break;
          }
          $commaChance /= 2;
        }

        $sentences[] = ucfirst(implode(', ', $frags)) . '.';
      }
      $paragraphs[] = implode(' ',$sentences);
    }
    return implode("\n\n",$paragraphs);
  }

  private static function random_float() {
    return random_int(0, PHP_INT_MAX-1)/PHP_INT_MAX;
  }

  private static function random_values($arr, $count) {
    $keys = array_rand($arr, $count);
    if($count == 1) {
      $keys = [$keys];
    }
    return array_intersect_key($arr, array_fill_keys($keys, null));
  }

  private static $lorem = [
    0 => 'lorem',
    1 => 'ipsum',
    2 => 'dolor',
    3 => 'sit',
    4 => 'amet',
    5 => 'consectetur',
    6 => 'adipiscing',
    7 => 'elit',
    8 => 'praesent',
    9 => 'interdum',
    10 => 'dictum',
    11 => 'mi',
    12 => 'non',
    13 => 'egestas',
    14 => 'nulla',
    15 => 'in',
    16 => 'lacus',
    17 => 'sed',
    18 => 'sapien',
    19 => 'placerat',
    20 => 'malesuada',
    21 => 'at',
    22 => 'erat',
    23 => 'etiam',
    24 => 'id',
    25 => 'velit',
    26 => 'finibus',
    27 => 'viverra',
    28 => 'maecenas',
    29 => 'mattis',
    30 => 'volutpat',
    31 => 'justo',
    32 => 'vitae',
    33 => 'vestibulum',
    34 => 'metus',
    35 => 'lobortis',
    36 => 'mauris',
    37 => 'luctus',
    38 => 'leo',
    39 => 'feugiat',
    40 => 'nibh',
    41 => 'tincidunt',
    42 => 'a',
    43 => 'integer',
    44 => 'facilisis',
    45 => 'lacinia',
    46 => 'ligula',
    47 => 'ac',
    48 => 'suspendisse',
    49 => 'eleifend',
    50 => 'nunc',
    51 => 'nec',
    52 => 'pulvinar',
    53 => 'quisque',
    54 => 'ut',
    55 => 'semper',
    56 => 'auctor',
    57 => 'tortor',
    58 => 'mollis',
    59 => 'est',
    60 => 'tempor',
    61 => 'scelerisque',
    62 => 'venenatis',
    63 => 'quis',
    64 => 'ultrices',
    65 => 'tellus',
    66 => 'nisi',
    67 => 'phasellus',
    68 => 'aliquam',
    69 => 'molestie',
    70 => 'purus',
    71 => 'convallis',
    72 => 'cursus',
    73 => 'ex',
    74 => 'massa',
    75 => 'fusce',
    76 => 'felis',
    77 => 'fringilla',
    78 => 'faucibus',
    79 => 'varius',
    80 => 'ante',
    81 => 'primis',
    82 => 'orci',
    83 => 'et',
    84 => 'posuere',
    85 => 'cubilia',
    86 => 'curae',
    87 => 'proin',
    88 => 'ultricies',
    89 => 'hendrerit',
    90 => 'ornare',
    91 => 'augue',
    92 => 'pharetra',
    93 => 'dapibus',
    94 => 'nullam',
    95 => 'sollicitudin',
    96 => 'euismod',
    97 => 'eget',
    98 => 'pretium',
    99 => 'vulputate',
    100 => 'urna',
    101 => 'arcu',
    102 => 'porttitor',
    103 => 'quam',
    104 => 'condimentum',
    105 => 'consequat',
    106 => 'tempus',
    107 => 'hac',
    108 => 'habitasse',
    109 => 'platea',
    110 => 'dictumst',
    111 => 'sagittis',
    112 => 'gravida',
    113 => 'eu',
    114 => 'commodo',
    115 => 'dui',
    116 => 'lectus',
    117 => 'vivamus',
    118 => 'libero',
    119 => 'vel',
    120 => 'maximus',
    121 => 'pellentesque',
    122 => 'efficitur',
    123 => 'class',
    124 => 'aptent',
    125 => 'taciti',
    126 => 'sociosqu',
    127 => 'ad',
    128 => 'litora',
    129 => 'torquent',
    130 => 'per',
    131 => 'conubia',
    132 => 'nostra',
    133 => 'inceptos',
    134 => 'himenaeos',
    135 => 'fermentum',
    136 => 'turpis',
    137 => 'donec',
    138 => 'magna',
    139 => 'porta',
    140 => 'enim',
    141 => 'curabitur',
    142 => 'odio',
    143 => 'rhoncus',
    144 => 'blandit',
    145 => 'potenti',
    146 => 'sodales',
    147 => 'accumsan',
    148 => 'congue',
    149 => 'neque',
    150 => 'duis',
    151 => 'bibendum',
    152 => 'laoreet',
    153 => 'elementum',
    154 => 'suscipit',
    155 => 'diam',
    156 => 'vehicula',
    157 => 'eros',
    158 => 'nam',
    159 => 'imperdiet',
    160 => 'sem',
    161 => 'ullamcorper',
    162 => 'dignissim',
    163 => 'risus',
    164 => 'aliquet',
    165 => 'habitant',
    166 => 'morbi',
    167 => 'tristique',
    168 => 'senectus',
    169 => 'netus',
    170 => 'fames',
    171 => 'nisl',
    172 => 'iaculis',
    173 => 'cras',
    174 => 'aenean',
  ];
}