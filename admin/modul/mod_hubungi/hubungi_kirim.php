<?php
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: admin@nanocomputercorner.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	