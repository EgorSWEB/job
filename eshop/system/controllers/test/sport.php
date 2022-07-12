<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

$sprintet = new \Nordic\Test\Sprinter();
$sprintet->sprint();

echo "<br>";

$jumper = new \Nordic\Test\Jumper();
$jumper->jump();

echo "<br>";

$thrower = new \Nordic\Test\Thrower();
$thrower->throw();

echo "<br>";

$decathlete = new \Nordic\Test\Decathlete();
$decathlete->sprint();
echo "<br>";
$decathlete->jump();
echo "<br>";
$decathlete->throw();

