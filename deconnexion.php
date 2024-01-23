<?php
    require('Configurations/MaSession.php');
    $sess=new Session();
    $sess->DestructionInformations();
    header('location:index.php');
  ?>