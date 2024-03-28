<?php
if (file_exists("testfile.rtf")) echo "file exists.";
else echo "file doesn't exist.";

$fh = fopen("testfile.rtf", 'w') or die("impossible to open the file");

$text = <<< _END
Hi buddies, 
I write for the first time
in a PHP file!
_END;

fwrite($fh, $text) or die("Impossible to write in the file");
fclose($fh);
echo ("writing in the file 'testfile.rtf' succeed.");
