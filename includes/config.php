<?php

	function connection(){
            $connectit = mysqli_connect('localhost', 'root', '', 'portal');
            return $connectit;
        }
