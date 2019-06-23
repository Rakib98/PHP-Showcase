<?php
/* This file makes it "impossible" to access this folder. When someone tries to access the includes folder, PHP automatically opens the index file by default. This header function inside this index file re-directs the user to the actual main page. */
header("Location:../index.php");