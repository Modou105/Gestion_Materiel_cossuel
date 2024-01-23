<table class="table table-hover">
                  <tbody>
                    <?php
                      $reqRegion=$connex->prepare("select* from regions order by NomRegion");
                      $reqRegion->execute();
                      while($result=$reqRegion->fetch()){
                    ?>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <?php echo '<font size="5"><strong>'.$result['NomRegion'].'</strong></font>' ?>
                        <table>
                          <tr>
                            <td><a href="regions.php?idreg=<?php echo $result['IdRegion'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Afficher</button></a></td>
                            <td><a href="departements.php?idreg=<?php echo $result['IdRegion'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Nouveau département</button></a></td>
                          </tr>
                        </table>
                            <tr class="expandable-body">
                              <td>
                                <div class="p-0">
                                  <table class="table table-hover">
                                    <tbody>
                                      <?php
                                        $reqDepartement=$connex->prepare("select departements.IdDepartement, departements.NomDepartement from departements, regions where departements.IdRegion=regions.IdRegion and regions.IdRegion='".$result['IdRegion']."' order by NomDepartement");
                                        $reqDepartement->execute();
                                        while($resultDep=$reqDepartement->fetch()){
                                      ?>
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                          <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            <?php echo '<font size="4"><strong><i>'.$resultDep['NomDepartement'].'</i></strong></font>' ?>
                                          <table>
                                            <tr>
                                              <td><a href="departements.php?iddep=<?php echo $resultDep['IdDepartement'] ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Afficher</button></a></td>
                                              <td><a href="localites.php?iddep=<?php echo $resultDep['IdDepartement'] ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Nouvelle Localité</button></a></td>
                                            </tr>
                                          </table>
                                          <tr class="expandable-body">
                                            <td>
                                              <div class="p-0">
                                                <table class="table table-hover">
                                                  <tbody>
                                                    <?php
                                                      $reqLocalite=$connex->prepare("select localites.IdLocalite, localites.NomLocalite from departements, localites where departements.IdDepartement=localites.IdDepartement and departements.IdDepartement='".$resultDep['IdDepartement']."' order by NomLocalite");
                                                      $reqLocalite->execute();
                                                      while($resultLoc=$reqLocalite->fetch()){
                                                    ?>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                      <td>
                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        <?php echo '<font size="4"><strong><i>'.$resultLoc['NomLocalite'].'</i></strong></font>' ?>
                                                          <table>
                                                            <tr>
                                                              <td><a href="localites.php?idloc=<?php echo $resultLoc['IdLocalite'] ?>"><button type="button" class="btn btn-block btn-secondary btn-xs">Afficher</button></a></td>
                                                              <td><a href="agences.php?idloc=<?php echo $resultLoc['IdLocalite']  ?>"><button type="button" class="btn btn-block btn-secondary btn-xs">Nouvelle Agence</button></a></td>
                                                            </tr>
                                                          </table>
                                                          <tr class="expandable-body">
                                                            <td>
                                                              <div class="p-0">
                                                                <table class="table table-hover">
                                                                  <tbody>

                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>Nom Agence</th>
                                                                      <th></th>
                                                                      <th></th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <?php
                                                                    $reqAgence=$connex->prepare("select agences.IdAgence, agences.NomAgence from agences, localites where localites.IdLocalite=agences.IdLocalite and localites.IdLocalite='".$resultLoc['IdLocalite']."' order by NomAgence");
                                                                    $reqAgence->execute();
                                                                    while($resultAg=$reqAgence->fetch()){
                                                                    ?>
                                                                      <tr>
                                                                        <td><?php echo $resultAg['NomAgence']  ?></td>
                                                                        <td><a href="agences.php?idagenc=<?php echo $resultAg['IdAgence']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Afficher</button></a></td>
                                                                        <td><a href=" "><button type="button" class="btn btn-block btn-outline-primary btn-xs">Informations Agence</button></a></td>
                                                                      </tr>
                                                                    <?php
                                                                      }
                                                                    ?>
                                                                  </tbody>
                                                                </table>
                                                              </td>
                                                            </tr>
                                                          </td>
                                                        </tr>
                                                        <?php
                                                          }
                                                        ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </td>
                                              </tr>
                                            </td>                     
                                          </tr>
                                          <?php
                                            }
                                          ?> 
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </td>
                            </tr>
                            <?php
                              }
                              $connex=NULL;
                            ?>
                          </tbody>
                        </table>