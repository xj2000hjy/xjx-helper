<?php
/**
 * StrDebug.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-27 15:50:45
 */
namespace xjx\test;

require __DIR__ . '/../../vendor/autoload.php';

use xjx\string\Str;


# startsWith(string $haystack, $needles)
// $result = Str::startsWith('jack', ['jack','tom', 'smith']);
// dump($result); #=> true

# endsWith(string $haystack, $needles)
// $result = Str::endsWith('smith', ['jack','tom', 'smith']);
// dump($result); #=> true

# contains(string $haystack, $needles)
// $result = Str::contains('tom', ['jack','tom', 'smith']);
// $result = Str::contains('hello,tom.', 'jack');
// dump($result); #=> false

# random(int $length = 6, int $type = null, string $addChars = '')
// $result = Str::random(6, null, '!@#$%&_-');
// dump($result, false); #=> HT#@pf
// echo Str::random(16), PHP_EOL; 		#=> lNxomDnBiVJGFEwY
//
// echo Str::camel('jack lau'), PHP_EOL; 	#=> jackLau
// echo Str::studly('jack lau'), PHP_EOL; 	#=> JackLau
// echo Str::title('jack lau'), PHP_EOL; 	#=> Jack Lau
//
// echo Str::snake('JackLau'), PHP_EOL; 	#=> jack_lau
// echo Str::snake('jackLau'), PHP_EOL; 	#=> jack_lau
// echo Str::snake('jack Lau'), PHP_EOL; 	#=> jack_lau
// echo Str::snake('Jack lau'), PHP_EOL; 	#=> jack_lau
// echo Str::snake('Jack Lau'), PHP_EOL; 	#=> jack_lau
//

# use xjx\json\Resp;

//Resp::error();
 \xjx\json\Resp::success();




class StrDebug {

}

