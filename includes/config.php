<?php

	function connection(){
            $connectit = mysqli_connect('localhost', 'root', '', 'portal') or die("Could not connect".  mysqli_errno());
            return $connectit;
        }
        
        function disconnect(){
            mysqli_close($connectit);
        }
