<?php

    if(!isset($_SESSION, $_SESSION['token']) || empty($_SESSION['token'])){






        redirect('./','error','Please login first.');
    }
  