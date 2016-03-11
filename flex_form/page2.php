<?php 
print 'Here is page two, and my session variable: '; 
session_start(); 
print $_session['myvariable']; 
exit; 
?>