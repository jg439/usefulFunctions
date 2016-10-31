<?php

//you should re-type and try each example that is given in the article.
//You need to create a website on the AFS to show what you did and push it to GitHub.
//Remember that you should submit links on the Moodle.

//function with 2 optional arguments
function foo($arg1 = '',$arg2 = ''){
  echo "arg1: $arg1\n";
  echo "arg2: $arg2\n";
}
foo('Hello','World');
/* prints:
arg1: hello
arg2: world
*/
foo();
/* prints:
arg1:
arg2:
*/

// yes, the argument list can be empty
function foo1(){

  //returns an array of all passed arguments
  $args = func_get_args();

  foreach($args as $k => $v){
    echo "arg".($k+1). ":$v\n";
  }
}
foo1();
/* prints nothing */

foo1('hello');
/* prints
arg1: hello
*/

foo1('hello', 'world', 'again');
/* prints
arg1: hello
arg2: world
arg3: again
*/
// get all php files
$files = glob('*.php');

print_r($files);
/* output looks like:
Array
(
    [0] => phptest.php
    [1] => pi.php
    [2] => post_output.php
    [3] => test.php
)
*/
// get all php files AND txt files
$files = glob('*.{php,txt}', GLOB_BRACE);

print_r($files);
/* output looks like:
Array
(
    [0] => phptest.php
    [1] => pi.php
    [2] => post_output.php
    [3] => test.php
    [4] => log.txt
    [5] => test.txt
)
*/
$files = glob('../images/a*.jpg');

print_r($files);
/* output looks like:
Array
(
    [0] => ../images/apple.jpg
    [1] => ../images/art.jpg
)
*/
$files = glob('../images/a*.jpg');

// applies the function to each array element
$files = array_map('realpath',$files);

print_r($files);
/* output looks like:
Array
(
    [0] => C:\wamp\www\images\apple.jpg
    [1] => C:\wamp\www\images\art.jpg
)
*/
echo "Initial: ".memory_get_usage()." bytes \n";
/* prints
Initial: 350408 bytes
*/

// let's use up some memory
for ($i = 0; $i < 100000; $i++) {
    $array []= md5($i);
}

// let's remove half of the array
for ($i = 0; $i < 100000; $i++) {
    unset($array[$i]);
}

echo "Final: ".memory_get_usage()." bytes \n";
/* prints
Final: 4544776 bytes
*/

echo "Peak: ".memory_get_peak_usage()." bytes \n";
/* prints
Peak: 10144800 bytes
*/
print_r(getrusage());
/* prints
Array
(
    [ru_majflt] => 75902
    [ru_maxrss] => 35912
    [ru_utime.tv_usec] => 718750
    [ru_utime.tv_sec] => 0
    [ru_stime.tv_usec] => 453125
    [ru_stime.tv_sec] => 0
)
*/
// sleep for 3 seconds (non-busy)
sleep(3);

$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);

/* prints
User time: 0.011552
System time: 0
*/


$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);

/* prints
User time: 1.424592
System time: 0.004204
*/
$start = microtime(true);
// keep calling microtime for about 3 seconds
while(microtime(true) - $start < 3) {

}

$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);

/* prints
User time: 1.088171
System time: 1.675315
*/
// this is relative to the loaded script's path
// it may cause problems when running scripts from different directories
require_once('config/database.php');

// this is always relative to this file's path
// no matter where it was included from
require_once(dirname(__FILE__) . '/config/database.php');

// some code
// ...
my_debug("some debug message", __LINE__);
/* prints
Line 4: some debug message
*/

// some more code
// ...
my_debug("another debug message", __LINE__);
/* prints
Line 11: another debug message
*/

function my_debug($msg, $line) {
    echo "Line $line: $msg\n";
}

// generate unique string
echo md5(time() . mt_rand(1,1000000));
// generate unique string
echo uniqid();
/* prints
4bd67c947233e
*/

// generate another unique string
echo uniqid();
/* prints
4bd67c9472340
*/
// with prefix
echo uniqid('foo_');
/* prints
foo_4bd67d6cd8b8f
*/

// with more entropy
echo uniqid('',true);
/* prints
4bd67d6cd8b926.12135106
*/

// both
echo uniqid('bar_',true);
/* prints
bar_4bd67da367b650.43684647
*/
// a complex array
$myvar = array(
    'hello',
    42,
    array(1,'two'),
    'apple'
);

// convert to a string
$string = serialize($myvar);

echo $string;
/* prints
a:4:{i:0;s:5:"hello";i:1;i:42;i:2;a:2:{i:0;i:1;i:1;s:3:"two";}i:3;s:5:"apple";}
*/

// you can reproduce the original variable
$newvar = unserialize($string);

print_r($newvar);
/* prints
Array
(
    [0] => hello
    [1] => 42
    [2] => Array
        (
            [0] => 1
            [1] => two
        )

    [3] => apple
)
*/
// a complex array
$myvar = array(
    'hello',
    42,
    array(1,'two'),
    'apple'
);

// convert to a string
$string = json_encode($myvar);

echo $string;
/* prints
["hello",42,[1,"two"],"apple"]
*/

// you can reproduce the original variable
$newvar = json_decode($string);

print_r($newvar);
/* prints
Array
(
    [0] => hello
    [1] => 42
    [2] => Array
        (
            [0] => 1
            [1] => two
        )

    [3] => apple
)
*/
$string =
"Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Nunc ut elit id mi ultricies
adipiscing. Nulla facilisi. Praesent pulvinar,
sapien vel feugiat vestibulum, nulla dui pretium orci,
non ultricies elit lacus quis ante. Lorem ipsum dolor
sit amet, consectetur adipiscing elit. Aliquam
pretium ullamcorper urna quis iaculis. Etiam ac massa
sed turpis tempor luctus. Curabitur sed nibh eu elit
mollis congue. Praesent ipsum diam, consectetur vitae
ornare a, aliquam a nunc. In id magna pellentesque
tellus posuere adipiscing. Sed non mi metus, at lacinia
augue. Sed magna nisi, ornare in mollis in, mollis
sed nunc. Etiam at justo in leo congue mollis.
Nullam in neque eget metus hendrerit scelerisque
eu non enim. Ut malesuada lacus eu nulla bibendum
id euismod urna sodales. ";

$compressed = gzcompress($string);

echo "Original size: ". strlen($string)."\n";
/* prints
Original size: 800
*/



echo "Compressed size: ". strlen($compressed)."\n";
/* prints
Compressed size: 418
*/

// getting it back
$original = gzuncompress($compressed);
// capture the start time
$start_time = microtime(true);

// do some stuff
// ...

// display how long the script took
echo "execution took: ".
        (microtime(true) - $start_time).
        " seconds.";
        $start_time = microtime(true);

        register_shutdown_function('my_shutdown');

        // do some stuff
        // ...


        function my_shutdown() {
            global $start_time;

            echo "execution took: ".
                    (microtime(true) - $start_time).
                    " seconds.";
        }
?>
