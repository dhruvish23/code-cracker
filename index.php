<!DOCTYPE html>
<html>
<head><title>Dhruvish Bhachech MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit and attempts to hash all four digit combinations
to determine the original four digit pin.</p>
<pre>
Debug Output:
<?php
$text = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $n1 = $txt[$i];   // The first of four numbers

        // Our inner loop Not the use of new variables
        // $j and $ch2 
        for($j=0; $j<strlen($txt); $j++ ) {
            $n2 = $txt[$j];  // Our second number
            
            for($k=0; $k<strlen($txt); $k++ ) {
            $n3 = $txt[$k]; // Our third number
                
                for($m=0; $m<strlen($txt); $m++ ) {
            $n4 = $txt[$m]; // Our fourth number

            // Concatenate the four numbers together to 
            // form the "possible" pre-hash text
            $try = $n1.$n2.$n3.$n4;

            // Run the hash and then check to see if we match
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $text = $try;
                break;   // Exit the inner loop
            }

            // Debug output until $show hits 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
                }
            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($text); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makepin.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/dhruvish23/code-cracker"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>

