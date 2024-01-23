
<?php 
function SigneInstalleur(){
    echo '<h4>Signature Eléctricien</h4>';
     echo '<div id="canvasDiv"></div>';
     echo '<br>';
     echo '<button type="button" class="btn btn-danger" id="reset-btn">Effacer</button>';
     echo '<button type="button" class="btn btn-success" id="btn-save">Sauvegarder</button>';
     echo '</div>';
     echo '<form id="signatureform" action="" style="display:none" method="post">';
     echo '<input type="hidden" id="signature" name="signature">';
     echo '<input type="hidden" name="signaturesubmit" value="1">';
     echo '</form>';
}

?>